<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class KelasSiswaController extends Controller
{

    private $base_view = 'konten.backend.siswakelas.';


    public function __construct()
    {
        view()->share('backend_siswakelas_index', true);
        view()->share('base_view', $this->base_view);
    }


    public function index()
    {
        return view($this->base_view.'index');
    }

 
}
