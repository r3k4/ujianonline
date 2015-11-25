<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Mst\KelasUser;
use App\Models\Ref\Kelas;
use Illuminate\Http\Request;

class GuruSiswaController extends Controller
{

	private $base_view = 'konten.backend.guru_siswa.';
	protected $kelas;
	protected $kelas_user;


    public function __construct(Kelas $kelas, KelasUser $kelas_user)
     {
     	$this->kelas_user = $kelas_user;
     	$this->kelas = $kelas;
     	view()->share('backend_guru_siswa_home', true);
     	view()->share('base_view', $this->base_view);
     }


    public function index()
     {
     	$kelas_user = $this->kelas_user
     					->where('mst_user_id', '=', \Auth::user()->id)
     					->with('ref_kelas')
     					->paginate(15);
     	$vars = compact('kelas_user');
     	return view($this->base_view.'index', $vars);
     }

     public function daftar_siswa($ref_kelas_id)
     {
     	$kelas_user =	$this->kelas_user
     						 ->where('ref_kelas_id', '=', $ref_kelas_id)
     						 ->with('mst_user')
     						 ->get(); 
     	return view($this->base_view.'popup.daftar_siswa', compact('kelas_user'));
     }




}
