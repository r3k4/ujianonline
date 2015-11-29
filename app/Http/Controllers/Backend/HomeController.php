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
   
	/**
	 * menampilkan data halaman utama atau dashboard
	 * @param  Fungsi $fungsi [description]
	 * @return [type]         [description]
	 */
	public function index(Fungsi $fungsi)
	{
		$jml_siswa_kelas_saya = \Auth::user()->kelas_user;
		$backend_home_index = true;
		$vars = compact('backend_home_index', 'fungsi', 'jml_siswa_kelas_saya');
		return view($this->base_view.'index', $vars);
	}

}
