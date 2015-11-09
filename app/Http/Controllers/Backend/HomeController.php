<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\Fungsi;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{


	private $base_view = 'konten.backend.home.';

	public function __construct()
	{
		view()->share('base_view', $this->base_view);
	}
   

	public function index(Fungsi $fungsi)
	{
		$backend_home_index = true;
		$vars = compact('backend_home_index', 'fungsi');
		return view($this->base_view.'index', $vars);
	}

}
