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
        <div class="border bg-sky-200 w-full">
            <h1>ADD NEW STUDENT</h1>
            <form action="{{URL('student/create')}}" method="post">
            @csrf
                <input type="text" name="name" placeholder="Enter Your Name " class="py-4 w-full border rounded-md focus:outline-0 focus:border-green-400">
                <input type="text" name="lastname" placeholder="Enter Your Lastname " class="py-4 w-full border rounded-md focus:outline-0 focus:border-green-400">
                <input type="number" name="score" placeholder="Enter Your Score " class="py-4 w-full border rounded-md focus:outline-0 focus:border-green-400">
                <input type="number" name="age"placeholder="How old are you? " class="py-4 w-full border rounded-md focus:outline-0 focus:border-green-400">
               <label for="">Gender:</label>
               Male <input type="radio"name="gender" value="m" />
               Female <input type="radio"name="gender" value="f" />
               <button type="submit" class="py-4 bg-green-300">Add</button>
            </form>
        </div>
    </div>
    
</body>
</html>
