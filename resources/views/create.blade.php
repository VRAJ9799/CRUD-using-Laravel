@extends('layout')
@section('title')
    Create
@endsection

@section('content')
    <style>
        .form-control{
            margin: auto;
        }
        .error{
            color: red;
            margin-left: 10px;
        }
    </style>
    <h1>User Form</h1>
    <div class="form">
        <form method="post" action="{{ url('/create') }}" id="Userform">
            @csrf

            <div class="form-control">
                <label for="fname">First Name</label>
                <input type="text" name="fname"/>@error('fname')<span>{{$message}}</span>@enderror
            </div>

            <br>
            <div class="form-control">
                <label for="lname">Last Name</label>
                <input type="text" name="lname"/>@error('lname')<span>{{$message}}</span>@enderror
            </div>
            <br>
            <div class="form-control">
                <label for="gender">Gender</label>
                <input type="radio" name="gender" value="male" id="male"><label for="male">Male</label></input>
                <input type="radio" name="gender" value="female" id="female"><label for="female">Female</label></input>
                <label for="gender" class="error"></label>
            </div><br>
            <div class="form-control">
                <label for="cmpname">Company Name</label>
                <input type="text" name="cmpname"/>@error('cmpname')<span>{{$message}}</span>@enderror
            </div><br>
            <div class="form-control">
                <label for="address">Address</label>
                <textarea name="address" cols="12" rows="3"></textarea>@error('address')<span>{{$message}}</span>@enderror
            </div><br>
            <div class="form-control">
                <label for="hobbies">Hobbies</label>
                <input type="checkbox" name="hobbies[]" value="Coding" id="hobby[]"><label>Coding</label></input>
                <input type="checkbox" name="hobbies[]" value="Travelling" id="hobby[]"><label>Travelling</label></input>
                <input type="checkbox" name="hobbies[]" value="Music" id="hobby[]"><label>Music</label></input>
                <label for="hobbies[]" class="error"></label>
            </div><br>
            <div class="form-control">
                <label for="password">Password</label>
                <input type="password" name="password" id="password"/>@error('password')<span>{{$message}}</span>@enderror
                <label for="password" class="error"></label>
            </div><br>
            <div class="form-control">
                <label for="confirmpassword">Confirm Password</label>
                <input type="password" name="confirmpassword"/>@error('confirmpassword')<span>{{$message}}</span>@enderror
                <label for="confirmpassword" class="error"></label>
            </div><br>
            <button type="submit" id="submitbtn">Submit</button>
        </form>
    </div>
    <script>
        $.validator.addMethod("Name",function (value){
            return /[a-zA-Z]{3,15}/.test(value);
        },"Name should contain only alphabet")
        $.validator.addMethod("PasswordMatch",function (value){
            return /((?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%]).{6,20})/.test(value);
        },"Include 1 UpperCase ,1 LowerCase,1 Special Character,1 Digit");
        $().ready(function (){
            $('#Userform').validate({
                rules:{
                    'fname':{required:true,Name:true},
                    'lname':{required:true,Name:true},
                     'gender':{required:true},
                    'address':{required:true},
                    'cmpname':{required:true},
                    'hobbies[]':{required:true},
                    'password':{required: true,PasswordMatch:true},
                    'confirmpassword':{required:true,PasswordMatch: true,equalTo:'#password'}
                },
                messages:{
                    'fname':{
                        required:'Enter FirstName'
                    },
                    'lname':{
                        required:'Enter LastName',
                    },
                    'gender':{
                        required:'choose gender'
                    },
                    'address':{
                        required:'Enter Address',
                    },
                    'cmpname':{
                        required:'Enter Company Name',
                    },
                    'password':{
                        required:'Enter Password'
                    },
                    'confirmpassword':{
                        required:'Enter Confirm Password',
                        equalTo:'Password not matching'
                    }
                }
            });
        })
    </script>
@endsection
