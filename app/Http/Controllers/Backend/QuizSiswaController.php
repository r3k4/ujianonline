<?php

/**
 * controller class untuk mengelola quiz yg ada pada level siswa
 */

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Mst\KelasUser;
use App\Models\Mst\TopikSoal;
use App\Models\Ref\Kelas;
use Illuminate\Http\Request;

class QuizSiswaController extends Controller
{
    private $base_view = 'konten.backend.quiz_siswa.';
    protected $kelas_user;
    protected $kelas;
    protected $topik_soal;

    public function __construct( KelasUser $kelas_user,  
    							 Kelas $kelas,  
    							 TopikSoal $topik_soal
    							)
    {
    	$this->topik_soal 	= $topik_soal;
    	$this->kelas 		= $kelas;
    	$this->kelas_user	= $kelas_user;
    	view()->share('backend_quiz_siswa_home', true);
    	view()->share('base_view', $this->base_view);
    }

    /**
     * daftar quiz yg harus siswa kerjakan
     * @return [type] [description]
     */
    public function index()
    {
    	$kelas_user = $this->kelas_user
    					   ->with('ref_kelas')
    					   ->where('mst_user_id', '=', \Auth::user()->id)
    					   ->paginate(10);
    	$vars = compact('kelas_user');
    	return view($this->base_view.'index', $vars);
    }



    public function quiz($ref_kelas_id)
    {
    	$kelas = $this->kelas->findOrFail($ref_kelas_id);
    	$topik_soal = $this->topik_soal
    				  ->where('ref_kelas_id', '=', $ref_kelas_id)
    				  ->paginate(10);
    	$vars = compact('topik_soal', 'kelas');
    	return view($this->base_view.'quiz.index', $vars);
    }


}
