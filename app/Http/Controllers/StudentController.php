<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    //
    public function addStudent(){
        DB::table("students")->insert([
                 [
                "name"=>"Taqi",
            ]
            ,
                [
                "name"=>"Nabi",
                ],
                    [
                "name"=>"Karim",
                    ],
                        [
                "name"=>"Sara",
            ]

        ]);
        return"Four students added";
    }
    public function Data(){
    //   $allS= DB:: table("students")->latest();
    //   $allS= DB:: table("students")->limit(4)->get();
      $allS= DB:: table("students")->first();
        // $allS= DB:: table("students")->get();
    
      return $allS;
    }
    public function where(){
        //  $Sara= DB::table("students")->where("name","Sara")->get();
         $all= DB::table("students")->where("name","Ali")->orWhere("name","Taqi")->get();
      return $all;  
    }
    public function id(){
         $id= DB::table("students")->where("id",">",3)->get();
        //  $id= DB::table("students")->where("id","<",3)->get();
        //  $id= DB::table("students")->where("id",">=",3)->get();
      return $id;  
    }
      public function max(){
         $max= DB::table("students")->max("id");
         return $max;
    }
    public function min(){
         $min= DB::table("students")->min("id");
         return $min;
    }
    public function avg(){
         $avg= DB::table("students")->avg("id");
         return $avg;
    }
    public function count(){
         $count= DB::table("students")->count("id");
         return $count;
    }
    public function order(){
     $order= DB:: table("students")->orderBy("score","desc")->get();
     return $order;
    }
    public function  update(){
      DB::table("students")->where("LastName" , "=" ,"Faild")->update([
        "LastName"=>"unknown",
      ]);
      return "updated successfully";
    }
    // public function  update(){
    //   DB::table("students")->where("score" , "<" ,10)->update([
    //     "name"=>" ناکام",
    //   ]);
    //   return "updated successfully";
    // }
    public function  delete(){
      DB::table("students")->where("score" , "<" ,30)->delete();
      return "deleted";
    }
    

}
