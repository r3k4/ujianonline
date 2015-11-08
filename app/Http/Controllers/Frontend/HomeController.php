<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

	private $base_view = 'konten.frontend.home.';

    public function __construct()
    {	
    	view()->share('base_view', $this->base_view);
    }


    public function index()
    {
    	return view($this->base_view.'index');
    }


}
