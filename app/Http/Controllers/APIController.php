<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


use App\model\Image;
use App\model\Travel;
use App\model\Category;
use Illuminate\Http\Request;
use Hash;
use File;
use Response;
use URL;

class APIController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	function getAllTravel(){
		$travel = Travel::with('categoryItem')->with('images')->get();

		foreach($travel as $t){

			if( count($t->images) > 0 ){
				//$t['photo'] = URL::to('/uploads/'.$t->images[0]->name );

				$image = array();
				for($i=0; $i<count($t->images) ; $i++){
					$image[$i] = URL::to('/uploads/'.$t->images[$i]->name );
				}
				$t['all_photo'] = $image;

			}else{
				//$t['photo'] = URL::to('/images/default.png');
				$t['images'] = array( URL::to('/images/default.png') );

				$t['all_photo'] = [URL::to('/images/default.png')];
			}

		}
		

		return $travel;
	}
	function getTravelById($id){
		$travel = Travel::with('categoryItem')->where('id' , $id )->get();

		return $travel;
	}
	function getTravelByCategoryId( $category ){
		$travel = Travel::with('categoryItem')->where('category' , $category )->get();

		return $travel;
	}
	function getTravelByKidsageId( $kidsage ){
		$travel = Travel::with('categoryItem')->where('kidsage' , $kidsage )->get();

		return $travel;
	}

    
}
