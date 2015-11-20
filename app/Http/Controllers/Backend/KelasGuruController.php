<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\Fungsi;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\Kelas\createKelasRequest;
use App\Models\Ref\Kelas;
use App\Models\Ref\Mapel;
use Illuminate\Http\Request;

class KelasGuruController extends Controller
{
    
    private $base_view = 'konten.backend.kelas.';
    protected $fungsi;
    protected $kelas;

	public function __construct(Fungsi $fungsi, Kelas $kelas)
	{
		$this->kelas = $kelas;
		$this->fungsi = $fungsi;
		view()->share('backend_kelas_index', true);
		view()->share('base_view', $this->base_view);
	}


	public function index()
	{
		$kelas = $this->kelas
				->where('mst_user_id', '=', \Auth::user()->id)
				->with('mst_kelas_user', 'ref_mapel')
				->paginate(10);
		$vars = compact('kelas');
		return view($this->base_view.'index', $vars);
	}


	public function add()
	{
		$q_mapel = Mapel::all();
		$mapel = $this->fungsi->get_dropdown($q_mapel, 'mata pelanajan');
		$vars = compact('mapel');
		return view($this->base_view.'popup.add', $vars);
	}

	public function insert(createKelasRequest $request)
	{
		$insert_kelas = $this->kelas->create($request->except('_token'));
		return $insert_kelas;
	}


	public function aktivasi(Request $request)
	{
		$k = $this->kelas->findOrFail($request->id);
		if($k->is_open == 1){
			$k->is_open = 0;
			$k->save();
		}else{
			$k->is_open = 1;
			$k->save();			
		}
		return $k;
	}


}
