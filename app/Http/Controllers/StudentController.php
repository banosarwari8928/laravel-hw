<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
use App\Http\Requests\FormAddRequest;

class StudentController extends Controller
{
   
 
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
    public function create(FormAddRequest $request){
        $imagepath=null;
        if($request->hasFile('image')){
            $imagepath=$request->file('image')->store('photos','public');
        };
        $student=new Student();
        $student->name=$request->name;
        $student->LastName=$request->lastname;
        $student->score=$request->score;
        $student->age=$request->age;
        $student->gender=$request->gender;
        $student->image=$imagepath;
        $student->save();
        return redirect("student");
    }
    public function update($id){
         $student= Student::FindOrFail($id);
         return view('Student.update', compact('student'));
    
    
        }
        public function edit(Request $request,$id){
            $student=Student::findOrFail($id);
            $student->name=$request->name;
            $student->LastName=$request->lastname;
            $student->score=$request->score;
            $student->age=$request->age;
            $student->gender=$request->gender;
            $student->update();
            return redirect ("student");
                }
                public function destroy(Request $request, $id){
                    Student::findOrFail($id)->delete();
                    return redirect("student");
                }
}
