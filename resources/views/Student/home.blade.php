<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        div.search{
            margin:12px auto ;
            border:2px black;
        }
        input{
            padding:5px 3px ;
        }
    th{
            padding:12px ;
            margin:7px auto;
            background-color:skyblue;
        }
        .paginate{
            display:flex;
            gap:5px;
        }
    </style>
</head>
<body>
    <div class="serach">
        <form action={{ URl('students') }} method="GET"  >
            <input type="text" name="search" id="search">
            <button type="submit">Search</button>
        </form>
        <table>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Last-Name</th>
                <th>Score</th>
                <th>Gender</th>
                <th>Age</th>
            </tr>
            @foreach ($St as $student )
            <tr>
                <td>{{$student->id}}</td>
                <td>{{$student->name}}</td>
                <td>{{$student->LastName}}</td>
                <td>{{$student->score}}</td>
                <td>{{$student->gender}}</td>
                <td>{{$student->age}}</td>                
                <td><a href="{{URL('student/update/').'/'.$student->id}}">Update  </a></td>                

            </tr>
            @endforeach
        </table>
        <div class="paginate">
            {{$St->appends(request()->query())->links()}}
        </div>
    </div>
</body>
</html>
