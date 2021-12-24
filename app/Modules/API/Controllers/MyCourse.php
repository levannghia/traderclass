<?php

namespace App\Modules\API\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\Types\This;
use Symfony\Component\VarDumper\Cloner\Data;

class MyCourse extends Controller{
    public function getMyCourse(Request $request){
        
        $validator = Validator::make($request->all(), [
            'email' => 'required|email'
        ],[
            'email.required' => '* Vui lòng nhập email',
            'email.email' => 'Truong nay phai la email'
        ]);
        if($validator->fails()){
            return response()->json([
                'code' => 500,
                'status' => false,
                'msg' => $validator->errors()->toArray(),
            ]);
        }
        $email = $request->email;
        $user = DB::table('users')->where('email',$email);
        if ($user->exists()) {
            $myCourse = DB::table('user_course')->select('course.id','course.status','course.created_at','course.updated_at','course.name','course.photo','course.id_video')
            ->rightJoin('course','course.id','=','user_course.course_id')->where('user_course.user_id',$user->first()->id)->get();
            return response()->json([
                'code' => 200,
                'status' => true,
                'msg' => 'get my class succsseccfully',
                'data' => $myCourse,
            ]);
        }
        return response()->json([
            'code' => 404,
            'status' => false,
            'msg' => 'vui long kiem tra lai email',
        ]);
    }

    public function deleteCourse(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'id_course' => 'required|numeric',
        ],[
            'email.required' => '* Vui lòng nhập email',
            'email.email' => 'Truong nay phai la email',
            'id_course.required' => 'vui long nhap id khoa hoc',
            'id_course.numeric' => 'id khoa hoc phai la so',
        ]);
        if($validator->fails()){
            return response()->json([
                'code' => 500,
                'status' => false,
                'msg' => $validator->errors()->toArray(),
            ]);
        }
        $email = $request->email;
        $user = DB::table('users')->where('email',$email);
        $id_course = $request->id_course;
        
        if($user->exists()){
            $delete_course = DB::table('user_course')->where('user_id',$user->first()->id)->where('course_id', $id_course);
            if($delete_course->delete()){
                return response()->json([
                    'code' => 200,
                    'status' => true,
                    'msg' => 'delete my course successfully',
                ]);
            }else{
                return response()->json([
                    'code' => 404,
                    'status' => false,
                    'msg' => 'delete my course failed',
                ]);
            }
        }
        return response()->json([
            'code' => 404,
            'status' => false,
            'msg' => 'vui long kiem tra lai email',
        ]);
        
    }
}