<?php

namespace App\Http\Controllers\Backoffice;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Routing\Redirector;
use App\model\Image;
use App\model\Travel;
use App\model\Category;
use App\model\User;
use Illuminate\Http\Request;
use Hash;
use File;
use Response;

class TravelController extends BaseController
{
use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	
	function viewtravel( Request $request ){
		$travel = Travel::orderBy('id', 'desc')->get();
  		$data['travel'] = $travel;
  		$data['menu'] = 1;

	    return view('viewtravels',$data );
	}

  	function addtravel( Request $request ){
  		$category = Category::all();

  		$data['category'] = $category;
  		$data['menu'] = 1;

  		return view('addtravel' , $data );
  	}
	function savetravel( Request $request ){
	    $name = $request->input('name');
	    $detail = $request->input('detail');
	    $daystart = $request->input('daystart');
	    $dayend = $request->input('dayend');
	    $category = $request->input('category');
	    $kidsage = $request->input('kidsage');
	    $address = $request->input('address');
	    $location = $request->input('location');
	    $phone = $request->input('phone');
	    $link = $request->input('link');
	    $other = $request->input('other');
	    $price = $request->input('price');

	    $travel = new Travel();

	    $travel->name =  $name;
	    $travel->detail =  $detail;
	    $travel->daystart =  $daystart;
	    $travel->dayend =  $dayend;
	    $travel->category =  $category;
	    $travel->kidsage =  $kidsage;
	    $travel->address =  $address;
	    $travel->location =  $location;
	    $travel->phone =  $phone;
	    $travel->link =  $link;
	    $travel->other =  $other;
	    $travel->price =  $price;

	    $travel->save();

		$images = $request->input('images');
		$imageArr = explode(',', $images ); 

		foreach ( $imageArr as $key => $value){
			$img = Image::where('name' , $value )->first();
			if( $img ){
				$img->travel = $travel->id;
				$img->save();
			}
		}
		
		$this->deleteUnusedImage();

		return redirect()->to('/backoffice/travel/');
	    //return view('status' , array('message'=>'Add Success') );

	   	// $category = Category::all();
  		// $data['category'] = $category;
  		// return view('addtravel' , $data );
	}
	function edittravel(Request $request , $id){
  		$category = Category::all();
  		$travel = Travel::where('id' ,  $id )->first();

  		$data['category'] = $category;
  		$data['travel'] = $travel;
  		$data['menu'] = 1;

  		return view('edittravel' , $data );
  	}
	function updatetravel(Request $request , $id){

		$name = $request->input('name');
	    $detail = $request->input('detail');
	    $daystart = $request->input('daystart');
	    $dayend = $request->input('dayend');
	    $category = $request->input('category');
	    $kidsage = $request->input('kidsage');
	    $address = $request->input('address');
	    $location = $request->input('location');
	    $phone = $request->input('phone');
	    $link = $request->input('link');
	    $other = $request->input('other');
	    $price = $request->input('price');

	    $travel = Travel::where('id' ,  $id )->first();

	    $travel->name =  $name;
	    $travel->detail =  $detail;
	    $travel->daystart =  $daystart;
	    $travel->dayend =  $dayend;
	    $travel->category =  $category;
	    $travel->kidsage =  $kidsage;
	    $travel->address =  $address;
	    $travel->location =  $location;
	    $travel->phone =  $phone;
	    $travel->link =  $link;
	    $travel->other =  $other;
	    $travel->price =  $price;

		$travel->save();


		$images = $request->input('images');
		$imageArr = explode(',', $images ); 
		foreach ( $imageArr as $key => $value){
			$img = Image::where('name' , $value )->first();
			$img->travel = $travel->id;
			$img->save();
		}

		$this->deleteUnusedImage();

		return redirect()->to('/backoffice/travel/');

		//$data['menu'] = 2;

		//return view('status' , array('message'=>'Add Success') );
		
		//$message = "แก้ไขสำเร็จ";
		//return "<script type='text/javascript'>alert('$message');</script>";
		//return "Edit แล้ว";
	}

	function deletetravel(Request $request , $id){
		Travel::where('id' ,  $id )->delete();
		
		return redirect()->to('/backoffice/travel/');
		//return "Delete แล้ว";
	}



	function viewcategory( Request $request ){
		$category = Category::all();
  		$data['category'] = $category;
  		$data['menu'] = 2;
  		
	    return view('addcategory',$data );
	}

	function addcategory( Request $request ){
		$name = $request->input('name');

		$category = new Category();
	    $category->name =  $name;
	    $category->save();

	    return redirect()->to('/backoffice/category/add/');
  		//return view('status' , array('message'=>'Add Category Success') );

	    //return view('addcategory');
	}

	function editcategory(Request $request , $id){
  		$category = Category::where('id' ,  $id )->first();
  		$data['category'] = $category;
  		$data['menu'] = 2;

  		return view('editcategory' , $data );
  	}

  	function updatecategory(Request $request , $id){
		$name = $request->input('name');
	    $travel = Category::where('id' ,  $id )->first();
	    $travel->name =  $name;

		$travel->save();

		return redirect()->to('/backoffice/category/add/');
		//return view('status' , array('message'=>'Add Success') );

	}

	function deletecategory(Request $request , $id){
		Category::where('id' ,  $id )->delete();

		return redirect()->to('/backoffice/category/add/');
		//return "Delete แล้ว";
	}


	function uploadimage(){
		
		$file = Input::file('file');
		$directory = public_path().'/uploads/';	

		$extension = File::extension( $file->getClientOriginalName()  );
		$filename = uniqid().'.'.$extension;

		$file->move( $directory , $filename );

		$image = new Image();
		$image->travel = -1;
		$image->name = $filename;
		$image->save();


        return $filename;
	}

	function deleteUnusedImage(){
		$images = Image::where('travel' , -1 )->get();
		foreach ( $images as $key => $image){
			 $filename = public_path().'/uploads/'.$image->name;
			 File::delete($filename);
			 $image->delete();
		}
	}


	function viewusers( Request $request ){
		$users = User::all();
  		$data['users'] = $users;
  		$data['menu'] = 5;

	    return view('viewusers',$data );
	}
	function deleteusers(Request $request , $id){
		User::where('id' ,  $id )->delete();

		return redirect()->to('/backoffice/users/');
		//return "Delete แล้ว";
	}


}
