<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add Student</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>
    <div class="w-full mx-auto my-12 p-14">
        <div>
            <ul>
                @if( $errors->any() )
                <ol>
              @foreach($errors->all() as $error)  
              <li>{{$error}}</li>   
              @endforeach 
                </ol>
                 
                @endif
            </ul>
        </div>
        <div class="border bg-sky-200 w-full">
            <h1>ADD NEW STUDENT</h1>
            <form enctype="multipart/form-data" action="{{URL('student/create')}}" method="post">
            @csrf
                <input type="text" name="name" value="{{ old('name')}}" placeholder="Enter Your Name " class="py-4 w-full  rounded-md focus:outline-0 focus:border-green-400">
                <input type="text" name="lastname" value="{{old ('lastname')}}" placeholder="Enter Your Lastname " class="py-4 w-full  rounded-md focus:outline-0 focus:border-green-400">
                <input type="number" name="score"  value="{{old ('score')}}" placeholder="Enter Your Score " class="py-4 w-full  rounded-md focus:outline-0 focus:border-green-400">
                <input type="number" name="age"    value="{{old ('age')}}" placeholder="How old are you? " class="py-4 w-full  rounded-md focus:outline-0 focus:border-green-400">
               <label for="">Gender:</label>
               Male <input type="radio"name="gender" value="m" {{old('gender')==="m"?"checked":"" }} />
               Female <input type="radio"name="gender" value="f" {{old('gender')==="f"?"checked":"" }} />
               <label for="image">Profile Picture</label>
               <input type="file" accept="image/*" name="image" id="image" value="{{old ('image')}}" class="py-4 w-full  rounded-md focus:outline-0 focus:border-green-400">
               <button type="submit" class="p-6 rounded bg-green-700 text-white">Add</button>
            </form> 
        </div>
    </div>
</body>
</html>
