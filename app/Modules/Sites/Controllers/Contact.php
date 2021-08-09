<?php

namespace App\Modules\Sites\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Modules\Sites\Models\Contact_Model;

class Contact extends Controller
{
    public function index()
    {
        $contact = Contact_Model::orderBy('id', 'asc')->get();
        $row = json_decode(json_encode([
            "title" => "Contact",
        ]));

        return view('Sites::contact.index', compact('contact','row'));
    }
}