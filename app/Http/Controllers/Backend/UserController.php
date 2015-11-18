<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\Fungsi;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\User\updateUser;
use App\Models\Mst\DataUser;
use App\Models\Mst\User;
use App\Models\Ref\UserLevel;
use Illuminate\Http\Request;

class UserController extends Controller
{

    private $base_view = 'konten.backend.user.';
    protected $fungsi;

    public function __construct(Fungsi $fungsi)
    {
        $this->fungsi = $fungsi;
    	view()->share('base_view', $this->base_view);
    }


    public function index(Request $request, User $mst_user)
    {
        $this->authorize('canShow', \Auth::user()); //acl
    	$backend_user_index = true;
    	$users = $mst_user->getAllUser($request, $limit=10);
    	$vars = compact('backend_user_index', 'users');
	   	return view($this->base_view.'index', $vars);
    }

    public function aktivasi(Request $request)
    {
        $u = User::findOrFail($request->id);
        $u->aktif = 1;
        $u->save();
        return $u;
    }

   public function deaktivasi(Request $request)
    {
        $u = User::findOrFail($request->id);
        $u->aktif = 0;
        $u->save();
        return $u;
    }


    public function edit($id, User $mst_user)
    {
        $this->authorize('canEdit', \Auth::user());
        $level = $this->fungsi->get_dropdown(UserLevel::all(), 'level');        
        $user = $mst_user->findOrFail($id);
        $jenis_kelamin = DataUser::$jenis_kelamin;
        $vars = compact('user', 'level', 'jenis_kelamin');
        return view($this->base_view.'popup.edit', $vars);
    }

    public function update(updateUser $request, User $mst_user, DataUser $mst_data_user)
    {
        $u = $mst_user->findOrFail($request->mst_user_id);
        $u->email = $request->email;
        $u->nama  = $request->nama;
        $u->ref_user_level_id = $request->ref_user_level_id;
        $u->save();

        $du = $mst_data_user->where('mst_user_id', '=', $request->mst_user_id)->first();
        $du->jenis_kelamin = $request->jenis_kelamin;
        $du->tempat_lahir = $request->tempat_lahir;
        $du->tgl_lahir = $request->tgl_lahir;
        $du->save();

        return 'ok';
    }



}
