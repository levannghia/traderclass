<?php

namespace App\Modules\Sites\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Modules\Sites\Models\CourseCtagory_Model;
use Illuminate\Support\Facades\DB;


class Home extends Controller
{
    function postSearchAjax(Request $request)
    {
        if ($request->get('query')) {
            $query = $request->get('query');
            $data = DB::table('course')->join('teachers', 'course.teacher_id', '=', 'teachers.id')
                ->where('name', 'LIKE', "%{$query}%")->orWhere('fullname', 'LIKE', "%{$query}%")
                ->get();
            $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
            foreach ($data as $row) {
                $output .= '
                <li><a href="data/' . $row->id . '">' . $row->name . '</a></li>
                
                <p style="color:red; text-align:center">' . $row->fullname . '</p>
                ';
            }
            $output .= '</ul>';
            echo $output;
        }
    }
}
