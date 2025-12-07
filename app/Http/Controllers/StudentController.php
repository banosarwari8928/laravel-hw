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
    // public function DataWithEloquent(){
    //  $student = new Student(); 
    //  $student->name="Ahmad";
    //  $student->lastName="Nabizada";
    //  $student->score=75;
    //  $student->save();
    //  return "added successfully";
    // }
    // public function read(){
    //   // $read=Student::all();
    //   // $read=Student::select('name','score')->where('id','=',3) ->get();
    //   // $read=Student::select('name','score')->find(3);
    //   $read=Student::orderBy("name","asc")->all();
    //   return $read;
    // }
    // public function update(){
    //  $update= Student::Find(5);
    //  $update->name="Roqia";
    //  $update->lastName="Akbari";
    //  $update->update();
    //  return "updated";


    // }
    public function Data(){
        // $allS=Student::where("score",">",50)->where(function($query){
        //     $query->where("age","<",18)->orWhere("age",">",30);
        // })->get();
        // $allS=Student::where("score","<",30)->orWhere("age",">",50)->get();  
        // __________________________________where and orWhere___________________
        // $allS=Student::whereAny(["score","age"],">=",50)->get();
        // _________________________whereAny_______________________
        // $allS=Student::whereAll(["score","age"],">=",50)->get();
        // ___________________________whereAll____________________________
        // $allS=Student::where("name","LIKE","%m%")->get();
        // _____________________selecting names according to there letters just(small letter)_______________
        // $allS=Student::where("name","LIKE","%m%")->orWhere("name","LIKE","%M%")->get();
        // _________________selecting names according to there Capital lettern both capital and small(M,m)
        $allS=Student::where("name","LIKE","%m%")->orWhere("name","LIKE","%M%")->get();
        // _________________________selecting Name based on this condition (M) and (a) next to each other ___________________________





        // Query scope
    //     $allS= Student::female()->get();
        return $allS;

    // }
    // public function FQ(){
    //     //    $allS= Student::where("gender","m")->where("age",">=",20)->get();
    //     // return $allS;
    //       $allS= Student::female()->get();
    //     return $allS;
    // }
    //  public function SQ(){
    //     //    $allS= Student::where("gender","m")->where("age",">=",20)->get();
    //        $allS= Student::female()->get();

        
    //     return $allS;
    }



    public function Delete(){
        Student::findOrFail(4)->delete();
        return"student with id 4 deleted";
    }
    public function deleted(){
    //  $del=  Student::onlyTrashed()->get();
     $del=  Student::withTrashed()->get();
     return $del; 
    }
    public function restore(){
        $restore=Student::withTrashed()->FindOrFail(2)->restore();
        return $restore;
    }
    // ______________________________________________________________________________________________________________/
    public function viewreturn(Request $request){
       $St= Student::when($request->search,function($q)use($request){
        $q->whereAny( [
            "name",
            "LastName",
            "age",
            "score",
            "gender"
        ],'LIKE','%'.$request->search.'%');
       })->paginate(15);
      return  view('Student.home',compact('St'));
    }
    public function create(Request $request){
        $student=new Student();
        $student->name=$request->name;
        $student->LastName=$request->lastname;
        $student->score=$request->score;
        $student->age=$request->age;
        $student->gender=$request->gender;
        $student->save();
        return redirect("student");
    }

}
