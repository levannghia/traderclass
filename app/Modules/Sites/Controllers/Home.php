<?php

namespace App\Modules\Sites\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

//use App\Modules\Sites\Models\Users_Model;


class Home extends Controller
{

    public function __construct()
    {
    }

    public function index()
    {
        return view("Sites::home.index");
    }

}
