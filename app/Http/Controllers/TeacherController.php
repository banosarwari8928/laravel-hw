<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facdes\DB;

class TeacherController extends Controller
{
    //
    public function addTeacher(){
        DB::table("teachers")->insert(
            [
                "name"=>"Ahmad",
                "lastName"=>"Qasimi",
                "class"=>"Php",
            ]
        );
        return"One student added";
    }
}
