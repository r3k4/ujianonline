<?php
/**
 * controller class untuk mengelola data 
 * guru dan siswa di level siswa
 */
namespace App\Http\Controllers\Backend;

use App\Helpers\Fungsi;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Mst\KelasUser;
use App\Models\Mst\User;
use App\Models\Ref\Kelas;
use Illuminate\Http\Request;

class GuruSiswaController extends Controller
{

	private $base_view = 'konten.backend.guru_siswa.';
	protected $kelas;
	protected $kelas_user;
	protected $user;

    public function __construct(Kelas $kelas, KelasUser $kelas_user, User $user)
     {
     	$this->user = $user;
     	$this->kelas_user = $kelas_user;
     	$this->kelas = $kelas;
     	view()->share('backend_guru_siswa_home', true);
     	view()->share('base_view', $this->base_view);
     }

     /**
      * GET daftar kelas yg diikuti oleh siswa yang bersangkutan
      * @return [type] [description]
      */
    public function index()
     {

     	$kelas_user = $this->kelas_user
     					->where('mst_user_id', '=', \Auth::user()->id)
     					->with('ref_kelas')
     					->paginate(15);
     	$vars = compact('kelas_user');
     	return view($this->base_view.'index', $vars);
     }


     /**
      * daftar siswa yg mengikuti kelas ini
      * @param  [type] $ref_kelas_id [int]
      * @return [type]               [view]
      */
     public function daftar_siswa($ref_kelas_id)
     {
     	$kelas_user =	$this->kelas_user
     						 ->where('ref_kelas_id', '=', $ref_kelas_id)
     						 ->with('mst_user')
     						 ->get(); 
     	return view($this->base_view.'popup.daftar_siswa', compact('kelas_user'));
     }

     /**
      * GET list detail biodata siswa yg mengikuti kelas ini
      * @param  [type] $ref_kelas_id [description]
      * @param  [type] $mst_user_id  [description]
      * @param  Fungsi $fungsi       [description]
      * @return [type]               [description]
      */
     public function biodata_siswa($ref_kelas_id, $mst_user_id, Fungsi $fungsi)
     {
     	$user = $this->user->findOrFail($mst_user_id);
     	return view($this->base_view.'popup.biodata_siswa', compact('user', 'fungsi'));
     }




}
