<?php

namespace App\Http\Controllers\Backoffice;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class BackofficeController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function login(){

    	$data['name'] = 'admin1';
    	$data['word'] = 'hello';

    	return view('backoffice' , $data );
    }

    function addTravelLocation(){

    }


}
