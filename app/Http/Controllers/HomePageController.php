<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\template;

class HomePageController extends Controller
{
    public function getListHome() {
    	$home = template::select('id', 'category_id')->get()->toArray();
    	return view('page.page.home', ['datahome' => $home]);
    }
}
