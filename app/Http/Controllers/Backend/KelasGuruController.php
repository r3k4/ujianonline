<?php
/**
 * controller class yg digunakan untuk mengelola 
 * data kelas di level guru
 */
namespace App\Http\Controllers\Backend;

use App\Helpers\Fungsi;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\Kelas\createKelasRequest;
use App\Http\Requests\Kelas\updateKelasRequest;
use App\Models\Mst\KelasUser;
use App\Models\Ref\Kelas;
use App\Models\Ref\Mapel;
use Illuminate\Http\Request;

class KelasGuruController extends Controller
{
    
    private $base_view = 'konten.backend.kelas.';
    protected $fungsi;
    protected $kelas;
    protected $kelas_user;

	public function __construct(Fungsi $fungsi, 
								Kelas $kelas, 
								KelasUser $kelas_user
								)
	{
		$this->kelas = $kelas;
		$this->fungsi = $fungsi;
		$this->kelas_user = $kelas_user;
		view()->share('backend_kelas_index', true);
		view()->share('base_view', $this->base_view);
	}

	/**
	 * halaman awal list kelas
	 * @return [type] [description]
	 */
	public function index()
	{
		$kelas = $this->kelas
				->where('mst_user_id', '=', \Auth::user()->id)
				->with('mst_kelas_user', 'ref_mapel')
				->paginate(10);
		$vars = compact('kelas');
		return view($this->base_view.'index', $vars);
	}

	/**
	 * GET form untuk menambah kelas
	 */
	public function add()
	{
		$q_mapel = Mapel::all();
		$mapel = $this->fungsi->get_dropdown($q_mapel, 'mata pelajaran');
		$vars = compact('mapel');
		return view($this->base_view.'popup.add', $vars);
	}

	/**
	 * POST action untuk menambah kelas
	 * @param  createKelasRequest $request [description]
	 * @return [type]                      [description]
	 */
	public function insert(createKelasRequest $request)
	{
		$insert_kelas = $this->kelas->create($request->except('_token'));
		$k = $this->kelas->findOrFail($insert_kelas->id);
		$k->kode_kelas = \Hashids::encode($insert_kelas->id.''.date('YmdHis'));
		$k->save();
		return $k;
	}

	/**
	 * POST action untuk membuka status kelas agar siswa bs join atau sebaliknya
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
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

	/**
	 * POST action untuk me-regenerate kode_kelas
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
	public function regenerate_kode_kelas(Request $request)
	{
		$k = $this->kelas->findOrFail($request->id);
		$k->kode_kelas = \Hashids::encode($request->id.''.date('YmdHis'));
		$k->save();
		return $k;
	}

	/**
	 * POST action untuk menghapus kelas
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
	public function delete(Request $request){
		$k = $this->kelas->findOrFail($request->id);
		$k->delete();
		return 'ok';
	}

	/**
	 * GET halaman untuk melihat detail kelas
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function view_detail_kelas($id)
	{
		$kelas = $this->kelas->findOrFail($id);
		$vars = compact('kelas');
		return view($this->base_view.'popup.view_detail_kelas', $vars);
	}

	/**
	 * GET halaman untuk edit data kelas
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function edit($id)
	{
		$q_mapel = Mapel::all();
		$mapel = $this->fungsi->get_dropdown($q_mapel, 'mata pelajaran');		
		$kelas = $this->kelas->findOrFail($id);
		$vars = compact('kelas', 'mapel');
		return view($this->base_view.'popup.edit', $vars);
	}

	/**
	 * POST update data kelas
	 * @param  updateKelasRequest $request [object]
	 * @return [type]                      [json]
	 */
	public function update(updateKelasRequest $request)
	{
		$kelas = $this->kelas
			 		  ->where('id', '=', $request->id)
			 	      ->update($request->except('_token'));
		return $kelas;
	}

	/**
	 * GET daftar siswa, untuk melihat list siswa
	 * @param  [type] $id [ref_kelas_id]
	 * @return [type]      
	 */
	public function siswa_kelas($id)
	{
		$kelas = $this->kelas->findOrFail($id);
		$vars = compact('kelas');		
		return view($this->base_view.'siswa_kelas.index', $vars);
	}

	/**
	 * POST submit persetujuan bergabung dalam kelas
	 * @return [type] [description]
	 */
	public function do_join_kelas(Request $request)
	{
		$ku = $this->kelas_user->findOrFail($request->id);
		$ku->is_aktif = 1;
		$ku->save();
		return 'ok';
	}

	/**
	 * POST hapus siswa dari kelas yg ada
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
	public function hapus_siswa_kelas(Request $request)
	{
		$ku = $this->kelas_user->findOrFail($request->id);
		$ku->delete();
		return 'ok';
	}


}
