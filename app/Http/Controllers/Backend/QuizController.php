<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\Fungsi;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\Quiz\createTopikQuizRequest;
use App\Models\Mst\Soal;
use App\Models\Mst\TopikSoal;
use App\Models\Mst\User;
use App\Models\Ref\Kelas;
use App\Models\Ref\TingkatKesulitan;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    private $base_view = 'konten.backend.quiz.';
    protected $kelas;
    protected $user;
    protected $tingkat_kesulitan;
    protected $topik_soal;
    protected $soal;

    public function __construct(Kelas $kelas,
    							User $user, 
    							TingkatKesulitan $tingkat_kesulitan,
    							TopikSoal $topik_soal, 
    							Soal $soal
    							)
    {
    	$this->soal = $soal;
    	$this->tingkat_kesulitan = $tingkat_kesulitan;
    	view()->share('base_view', $this->base_view);
    	view()->share('backend_quiz_index', true);
    	$this->kelas = $kelas;
    	$this->user = $user;
    	$this->topik_soal = $topik_soal;
    }


    public function index()
    {
    	$topik_quiz = $this->topik_soal->with('ref_kelas')->paginate(10);
    	return view($this->base_view.'index', compact('topik_quiz'));
    }


    public function add(Fungsi $fungsi)
    {
    	$q_kelas = $this->kelas->where('mst_user_id', '=', \Auth::user()->id)->get();
    	$kelas = $fungsi->get_dropdown($q_kelas, 'kelas');
    	$q_tingkat_kesulitan = $this->tingkat_kesulitan->all();
    	$tingkat_kesulitan = $fungsi->get_dropdown($q_tingkat_kesulitan, 'tingkat kesulitan');
    	$vars = compact('kelas', 'tingkat_kesulitan');
    	return view($this->base_view.'popup.add', $vars);
    }


    public function insert(createTopikQuizRequest $request)
    {
    	$insert = $this->topik_soal->create($request->except('_token'));
    	return $insert;
    }

    public function edit($id, Fungsi $fungsi)
    {
    	$q_kelas = $this->kelas->where('mst_user_id', '=', \Auth::user()->id)->get();
    	$kelas = $fungsi->get_dropdown($q_kelas, 'kelas');
    	$q_tingkat_kesulitan = $this->tingkat_kesulitan->all();
    	$tingkat_kesulitan = $fungsi->get_dropdown($q_tingkat_kesulitan, 'tingkat kesulitan');
    	$topik = $this->topik_soal->findOrFail($id);
    	$vars = compact('kelas', 'tingkat_kesulitan', 'topik');
    	return view($this->base_view.'popup.edit', $vars);    	
    }


    public function update(createTopikQuizRequest $request)
    {
    	$update = $this->topik_soal
    		 		   ->where('id', '=', $request->id)
    		 		   ->update($request->except('_token'));
    	return $update;
    }


    public function view_detail($id)
    {
    	$topik = $this->topik_soal->findOrFail($id);
    	return view($this->base_view.'popup.view_detail', compact('topik'));
    }


    public function manage_soal($mst_topik_soal_id)
    {
    	$topik = $this->topik_soal->findOrFail($mst_topik_soal_id);
    	$soal = $this->soal->where('mst_topik_soal_id', '=', $mst_topik_soal_id)->paginate(10);
    	$vars = compact('topik', 'soal');
    	return view($this->base_view.'manage_soal.index', $vars);
    }



}
