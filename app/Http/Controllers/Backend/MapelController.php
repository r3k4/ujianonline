<?php

/**
 * controller class untuk mengelola daftar mata pelajawan yg diajarkan oleh guru
 */

namespace App\Http\Controllers\Backend;

use App\Helpers\Fungsi;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\Mapel\insertMapel;
use App\Models\Ref\Mapel;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    private $fungsi;
    private $mapel;
	private $base_view = 'konten.backend.mapel.';

    public function __construct(Fungsi $fungsi, Mapel $mapel)
    {
        $this->fungsi = $fungsi;
        $this->mapel = $mapel;
    	view()->share('base_view', $this->base_view);
    }


    /**
     * GET lihat daftar mata pelajaran
     * @return [type] [description]
     */
    public function index()
    {
        $this->authorize('canShow', \Auth::user()); //acl
        $backend_mapel_index = true;    
        $mapel = $this->mapel->paginate(10);
        $vars = compact('backend_mapel_index', 'mapel');	
    	return view($this->base_view.'index', $vars);
    }

    /**
     * GET menampilkan form add mata pelajaran
     */
    public function add()
    {
        return view($this->base_view.'popup.add');
    }

    /**
     * POST insert data mata pelajaran
     * @param  insertMapel $request [description]
     * @return [type]               [description]
     */
    public function insert(insertMapel $request)
    {
        $this->mapel->create($request->except('_token'));
        return 'ok';
    }

    /**
     * POST action untuk menghapus salah satu mata pelajaran
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function delete(Request $request)
    {
        $m = $this->mapel->findOrFail($request->id);
        if(count($m)>0){
            $m->delete();
        }
        return 'ok';
    }

    /**
     * GET edit data mata pelajaran
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function edit($id)
    {
        $mapel = $this->mapel->findOrFail($id);
        $vars = compact('mapel');
        return view($this->base_view.'popup.edit', $vars);
    }


    /**
     * POST action untuk update data mata pelajaran
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function update(Request $request)
    {
        $this->mapel
             ->where('id', '=', $request->id)
             ->update($request->except('_token'));
        return 'ok';
    }



}
