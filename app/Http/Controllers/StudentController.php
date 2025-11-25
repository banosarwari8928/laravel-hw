<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Student;

class StudentController extends Controller
{
    //
    public function a(){
     // public function addStudent(){
    //     DB::table("students")->insert([
    //              [
    //             "name"=>"Taqi",
    //         ]
    //         ,
    //             [
    //             "name"=>"Nabi",
    //             ],
    //                 [
    //             "name"=>"Karim",
    //                 ],
    //                     [
    //             "name"=>"Sara",
    //         ]

    //     ]);
    //     return"Four students added";
    // }
    // public function Data(){
    // //   $allS= DB:: table("students")->latest();
    // //   $allS= DB:: table("students")->limit(4)->get();
    //   $allS= DB:: table("students")->first();
    //     // $allS= DB:: table("students")->get();
    
    //   return $allS;
    // }
    // public function where(){
    //     //  $Sara= DB::table("students")->where("name","Sara")->get();
    //      $all= DB::table("students")->where("name","Ali")->orWhere("name","Taqi")->get();
    //   return $all;  
    // }
    // public function id(){
    //      $id= DB::table("students")->where("id",">",3)->get();
    //     //  $id= DB::table("students")->where("id","<",3)->get();
    //     //  $id= DB::table("students")->where("id",">=",3)->get();
    //   return $id;  
    // }
    //   public function max(){
    //      $max= DB::table("students")->max("id");
    //      return $max;
    // }
    // public function min(){
    //      $min= DB::table("students")->min("id");
    //      return $min;
    // }
    // public function avg(){
    //      $avg= DB::table("students")->avg("id");
    //      return $avg;
    // }
// ________________________________________________________________________________________________________________

    // public function count(){
    //      $count= DB::table("students")->count("id");
    //      return $count;
    // }
    // public function order(){
    //  $order= DB:: table("students")->orderBy("score","desc")->get();
    //  return $order;
    // }
    // public function  update(){
    //   DB::table("students")->where("id" , "=" ,"3")->update([
    //     "name"=>"Ali",
    //     "lastName"=>"Alizada",
    //   ]);
    //   return "updated successfully";
// ________________________________________________________________________________________________________________
    
    // public function  update(){
    //   DB::table("students")->where("score" , "<" ,10)->update([
    //     "name"=>" ناکام",
    //   ]);
    //   return "updated successfully";
    // }
    // public function  delete(){
    //   DB::table("students")->where("score" , "<" ,30)->delete();
    //   return "deleted";
    }
// ________________________________________________________________________________________________________________


    // adding data with Eloquent ORM
    public function DataWithEloquent(){
     $student = new Student(); 
     $student->name="Ahmad";
     $student->lastName="Nabizada";
     $student->score=75;
     $student->save();
     return "added successfully";
    }
    public function read(){
      // $read=Student::all();
      // $read=Student::select('name','score')->where('id','=',3) ->get();
      // $read=Student::select('name','score')->find(3);
      $read=Student::orderBy("name","asc")->all();
      return $read;
    }
    public function update(){
     $update= Student::Find(5);
     $update->name="Roqia";
     $update->lastName="Akbari";
     $update->update();
     return "updated";


    }

}
