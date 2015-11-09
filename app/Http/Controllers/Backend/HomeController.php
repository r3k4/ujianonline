<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{


	private $base_view = 'konten.backend.home.';

	public function __construct()
	{
		view()->share('base_view', $this->base_view);
	}
   

	public function index()
	{
		$backend_home_index = true;
		$vars = compact('backend_home_index');
		return view($this->base_view.'index', $vars);
	}

}
