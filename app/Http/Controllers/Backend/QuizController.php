<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\Fungsi;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\Quiz\createJawabanSoal;
use App\Http\Requests\Quiz\createSoalRequest;
use App\Http\Requests\Quiz\createTopikQuizRequest;
use App\Models\Mst\JawabanSoal;
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
    protected $jawaban_soal;

    public function __construct(Kelas $kelas,
    							User $user, 
    							TingkatKesulitan $tingkat_kesulitan,
    							TopikSoal $topik_soal, 
    							Soal $soal, 
                                JawabanSoal $jawaban_soal
    							)
    {
    	$this->soal = $soal;
    	$this->tingkat_kesulitan = $tingkat_kesulitan;
    	view()->share('base_view', $this->base_view);
    	view()->share('backend_quiz_index', true);
    	$this->kelas = $kelas;
        $this->jawaban_soal = $jawaban_soal;
    	$this->user = $user;
    	$this->topik_soal = $topik_soal;
    }


    /**
     * menampilkan semua daftar topik
     * @return [type] [description]
     */
    public function index()
    {
    	$topik_quiz = $this->topik_soal->with('ref_kelas')->paginate(10);
    	return view($this->base_view.'index', compact('topik_quiz'));
    }

    /**
     * menambahkan topik
     * @param Fungsi $fungsi [description]
     */
    public function add(Fungsi $fungsi)
    {
    	$q_kelas = $this->kelas->where('mst_user_id', '=', \Auth::user()->id)->get();
    	$kelas = $fungsi->get_dropdown($q_kelas, 'kelas');
    	$q_tingkat_kesulitan = $this->tingkat_kesulitan->all();
    	$tingkat_kesulitan = $fungsi->get_dropdown($q_tingkat_kesulitan, 'tingkat kesulitan');
    	$vars = compact('kelas', 'tingkat_kesulitan');
    	return view($this->base_view.'popup.add', $vars);
    }

    /**
     * insert topik quiz
     * @param  createTopikQuizRequest $request [description]
     * @return [type]                          [description]
     */
    public function insert(createTopikQuizRequest $request)
    {
    	$insert = $this->topik_soal->create($request->except('_token'));
    	return $insert;
    }

    /**
     * edit topik quiz
     * @param  [type] $id     [description]
     * @param  Fungsi $fungsi [description]
     * @return [type]         [description]
     */
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

    /**
     * POST update topik quiz
     * @param  createTopikQuizRequest $request [description]
     * @return [type]                          [description]
     */
    public function update(createTopikQuizRequest $request)
    {
    	$update = $this->topik_soal
    		 		   ->where('id', '=', $request->id)
    		 		   ->update($request->except('_token'));
    	return $update;
    }

    /**
     * GET detail data topik
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function view_detail($id)
    {
    	$topik = $this->topik_soal->findOrFail($id);
    	return view($this->base_view.'popup.view_detail', compact('topik'));
    }


    /**
     * menampilkan daftar soal yg ada di dlm topik
     * @param  [type] $mst_topik_soal_id [description]
     * @return [type]                    [description]
     */
    public function manage_soal($mst_topik_soal_id)
    {
    	$topik = $this->topik_soal->findOrFail($mst_topik_soal_id);
    	$soal = $this->soal
                     ->where('mst_topik_soal_id', '=', $mst_topik_soal_id)
                     ->with('mst_jawaban_soal')
                     ->paginate(10);
    	$vars = compact('topik', 'soal');
    	return view($this->base_view.'manage_soal.index', $vars);
    }


    /**
     * GET menampilkan form add untuk tambah soal topik
     * @param  [type] $mst_topik_soal_id [description]
     * @return [type]                    [description]
     */
    public function manage_soal_add($mst_topik_soal_id){
        return view($this->base_view.'manage_soal.popup.add');
    }   


    /**
     * POST insert data soal 
     * @param  createSoalRequest $request [description]
     * @return [type]                     [description]
     */
    public function manage_soal_insert(createSoalRequest $request)
    {
        $insert = $this->soal->create($request->except('_token'));
        return $insert;
    }


    /**
     * form berisi penambahan jawaban soal
     * @param  [type] $mst_topik_soal_id [description]
     * @param  [type] $mst_soal_id       [description]
     * @return [type]                    [description]
     */
    public function manage_soal_add_jawaban($mst_topik_soal_id, $mst_soal_id, Fungsi $fungsi)
    {
        $soal = $this->soal->findOrFail($mst_soal_id);
        $vars = compact('soal', 'fungsi');
        return view($this->base_view.'manage_soal.popup.add_jawaban', $vars);
    }

    /**
     * insert jawaban untuk masing2 soal
     * @param  createJawabanSoal $request [description]
     * @return [type]                     [description]
     */
    public function manage_soal_insert_jawaban(createJawabanSoal $request)
    {
        \Session::flash('pesan_sukses', 'data telah berhasil ditambahkan');
        $insert_jawaban = $this->jawaban_soal->create($request->except('_token'));

        if($request->is_benar == 1){
            $all_js = $this->jawaban_soal->where('mst_soal_id', '=', $request->mst_soal_id)->get();
            foreach($all_js as $list){
                $list->is_benar = 0;
                $list->save();
            }
            $js = $this->jawaban_soal->findOrFail($insert_jawaban->id);
            $js->is_benar = 1;
            $js->save();
        }


        return $insert_jawaban;
    }


    /**
     * POST hapus salah satu jawaban soal
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function manage_soal_del_jawaban(Request $request)
    {
        \Session::flash('pesan_sukses', 'data telah terhapus');
        $js = $this->jawaban_soal->findOrFail($request->id);
        $js->delete();
        return 'ok';
    }


    /**
     * GET edit salah satu jawaban soal
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function manage_soal_edit_jawaban($mst_topik_soal_id, $mst_soal_id, $id, Request $request, Fungsi $fungsi)
    {
        $jawaban = $this->jawaban_soal->findOrFail($id);
        $soal = $this->soal->findOrFail($mst_soal_id);
        $vars = compact('soal', 'fungsi', 'jawaban');        
        return view($this->base_view.'manage_soal.popup.edit_jawaban', $vars);
    }




    /**
     * POST set untuk memilih jawaban yg benar pada soal
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function manage_soal_set_jawaban_benar(Request $request)
    {

        $js = $this->jawaban_soal->findOrFail($request->id);

        $all_js = $this->jawaban_soal->where('mst_soal_id', '=', $js->mst_soal_id)->get();
        foreach($all_js as $list){
            $list->is_benar = 0;
            $list->save();
        }

        $js->is_benar = 1;
        $js->save();
        return 'ok';
    }


}
