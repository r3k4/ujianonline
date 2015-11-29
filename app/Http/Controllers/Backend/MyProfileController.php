<?php

/**
 * controller class untuk mengelola profile user yg sedang login
 */

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\MyProfile\UpdateProfile;
use App\Models\Mst\DataUser;
use App\Models\Mst\User;
use Illuminate\Http\Request;

class MyProfileController extends Controller
{
    private $base_view = 'konten.backend.myprofile.';
    private $data_user;

    public function __construct(DataUser $data_user)
    {
        $this->data_user = $data_user;
    	view()->share('base_view', $this->base_view);
    }

    /**
     * menampilkan data pribadi user
     * @return [type] [description]
     */
    public function index()
    {
    	$backend_myprofile_home = true;
        $jenis_kelamin = DataUser::$jenis_kelamin;
    	$vars = compact('backend_myprofile_home', 'jenis_kelamin');
    	return view($this->base_view.'index', $vars);
    }

    /**
     * POST update data profile user
     * @param  UpdateProfile $request [description]
     * @return [type]                 [description]
     */
    public function update_profile(UpdateProfile $request)
    {
        //update tabel mst_user
        $u = User::findOrFail(\Auth::user()->id);
        $u->nama = $request->nama;
        $u->save();

        //update tabel mst_data_user
        $du = $this->data_user->find(\Auth::user()->data_user->id);
        $du->tempat_lahir = $request->tempat_lahir;
        $du->tgl_lahir = $request->tgl_lahir;
        $du->jenis_kelamin = $request->jenis_kelamin;
        $du->save();
        return 'ok';
    }
}
