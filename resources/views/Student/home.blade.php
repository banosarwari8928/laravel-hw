<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        .search{
            margin:20px auto;
            align-items:center;
            justify-content:center;
            border:2px red solid;
            padding:10px 40px;
        }
        input{
            padding:5px 3px ;
        }
        .btn{
            padding:8px;
            background:red;
            color:white; 
            border:0 ;
            
        }
    th{
            padding:12px ;
            border:1px black dotted;
            margin:5px auto;
            background-color:skyblue;
        }
        .paginate{
            display:flex;
            gap:5px;
            padding:8px;
            background:skyblue;
        }
        td{
            border:2px black solid;
            border: ; 
            text-align:center;
            padding:4px 12px;
        }
        td>a{
            text-decoration:none;
            color:green;
            padding:4px 12px;
        }
    </style>
</head>
<body>
    <div >
        <form action={{ URl('students') }} method="GET"  >
            <input type="text" class="search" name="search" id="search">
            <button type="submit" class="btn">Search</button>
        </form>
        <table>
            <tr>
                <th>Image</th>
                <th>Id</th>
                <th>Name</th>
                <th>Last-Name</th>
                <th>Score</th>
                <th>Gender</th>
                <th>Age</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            @foreach ($St as $student )
            <tr>
                <td>
                    @if($student->image)
                    <img class="h-18 w-18 rounded-full" src="{{asset('storage/'.$student->image)}}" >
                    @endif
                </td>
                <td>{{$student->id}}</td>
                <td>{{$student->name}}</td>
                <td>{{$student->LastName}}</td>
                <td>{{$student->score}}</td>
                <td>{{$student->gender}}</td>
                <td>{{$student->age}}</td>                
                <td><a href="{{ URL('student/updated').'/'.$student->id}}" class="font-bold">Update  </a></td>                
                <td> <form action="{{URL('student/delete'.'/'.$student->id)}}" method="post" onsubmit="return confirm("Are you sure deleting this data")">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 font-bold">Delete</button>
                </form> </td>
            </tr>
            @endforeach
        </table>
        <div class="paginate">
            {{$St->appends(request()->query())->links()}}
        </div>
    </div>
</body>
</html>
