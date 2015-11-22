<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Mst\KelasUser;
use App\Models\Ref\Kelas;
use Illuminate\Http\Request;

class KelasSiswaController extends Controller
{

    private $base_view = 'konten.backend.siswakelas.';
    protected $kelas_user;
    protected $kelas;


    public function __construct(KelasUser $kelas_user, Kelas $kelas)
    {
        $this->kelas_user = $kelas_user;
        $this->kelas = $kelas;
        view()->share('backend_siswakelas_index', true);
        view()->share('base_view', $this->base_view);
    }


    public function index()
    {
        $kelas_user = $this->kelas_user
            ->where('mst_user_id', '=', \Auth::user()->id)
            ->with('ref_kelas')
            ->paginate(10);
        $vars = compact('kelas_user');
        return view($this->base_view.'index', $vars);
    }


    public function stop_kelas(Request $request)
    {
        $ku = $this->kelas_user->findOrFail($request->id);
        $ku->delete();
        return 'ok';
    }


    public function ikut_kelas()
    {
        return view($this->base_view.'popup.ikut_kelas');
    }

    public function do_ikut_kelas(Request $request)
    {
        $ref_kelas_id = \Hashids::decode($request->kode_kelas);
        if(count($ref_kelas_id)<=0){
            return null;
        }else{
            $ref_kelas_id = $ref_kelas_id[0];
            $check_ref_kelas = $this->kelas->findOrFail($ref_kelas_id);
            if(count($check_ref_kelas)>0){
                if($check_ref_kelas->is_open == 1){
                    $check_user_kelas = $this->kelas_user->where('mst_user_id', '=', \Auth::user()->id)->first();
                    if(count($check_user_kelas)<=0){
                        $data = ['ref_kelas_id' => $ref_kelas_id, 'mst_user_id' => \Auth::user()->id];
                        $insert = $this->kelas_user->create($data);
                        return $insert;
                    }
                }else{
                     return 0; //kelas sudah ditutup
                }
            }else{
               return 00; //kode kelas tidak ditemukan
            }
        }
    }




 
}
