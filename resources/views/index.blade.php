@extends('layout')
@section('title')
    Index
@endsection

@section('content')
    <style>
        td{
            max-width: 120px;
            padding: 10px;
        }
        a{
            padding: 10px;
        }
        table{
            border:1px solid black;
            width: 700px;
            margin-left: 50px;
        }
        tr{
            border: 1px solid black;
        }


    </style>
    <h1>Welcome</h1>
        <table >
            <tr>
                <th>id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Gender</th>
                <th>Company</th>
                <th>Address</th>
                <th>Hobbies</th>
            </tr>
            @if($Users)
            @foreach($Users as $User)
            <tr>
                <td>{{$User['id']}}</td>
                <td>{{$User['FirstName']}}</td>
                <td>{{$User['LastName']}}</td>
                <td>{{$User['Gender']}}</td>
                <td>{{$User['Company']}}</td>
                <td>{{$User['Address']}}</td>
                <td>@foreach(explode(' ',$User->Hobbies) as $hobby)
                    {{$hobby}}
                    @endforeach
                </td>
                <td>
                    <a href="/edit/{{$User->id}}">Edit</a>
                    <br><br>
                    <a href="/delete/{{$User->id}}">Delete</a>
                </td>
            </tr>
            @endforeach
            @endif
        </table>
    <a href="/create">Add</a>

@endsection

