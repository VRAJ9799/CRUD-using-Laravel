<?php

namespace App\Http\Controllers;
use App\Registration;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $Users = Registration::all();
        return view('/index',['Users'=>$Users]);

    }
    public function create(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('create');
        } elseif ($request->isMethod('post')) {
            $rules = [
                'fname' => ['required', 'regex:/^[a-zA-Z]{1,15}$/'],
                'lname' => ['required', 'regex:/^[a-zA-Z]{1,15}$/'],
                'address' => ['required', 'max:50'],
                'cmpname' => ['required', 'max:30'],
                'password' => ['required', 'regex:/^((?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%]).{6,20})$/'],
                'confirmpassword' => ['required', 'regex:/^((?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%]).{6,20})$/', 'same:password'],
            ];
            $msgs = [
                'regex' => 'Name should contain only letters',
            ];
            $this->validate($request, $rules, $msgs);
            $data = [
                'FirstName' => $request->input('fname'),
                'LastName' => $request->input('lname'),
                'Gender' => $request->input('gender'),
                'Address' => $request->input('address'),
                'Company' => $request->input('cmpname'),
                'Hobbies' => implode(' ', $request->input('hobbies')),
                'Password' => $request->input('password'),
            ];
            $User = new Registration();
            $User::create($data);
            return redirect('/index');
        }
    }
    public function edit(Request $request,$id){
        if($request->isMethod('get')){
            $UserDetails = Registration::find($id);
            return view('edit',['UserDetails'=>$UserDetails]);
        }
        else if ($request->isMethod('post')){
            $rules =[
                'fname'=>['required','regex:/^[a-zA-Z]{1,15}$/'],
                'lname'=>['required','regex:/^[a-zA-Z]{1,15}$/'],
                'address'=>['required','max:50'],
                'cmpname'=>['required','max:30'],
                'password'=>['required','regex:/^((?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%]).{6,20})$/'],
                'confirmpassword'=>['required','regex:/^((?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%]).{6,20})$/','same:password'],
            ];
            $msgs = [
                'regex'=>'Name should contain only letters',
            ];
            $this->validate($request,$rules,$msgs);
            $User = Registration::find($id);
            $User->FirstName =$request->input('fname');
            $User->LastName=$request->input('lname');
            $User->Gender = $request->input('gender');
            $User->Address = $request->input('address');
            $User->Company = $request->input('cmpname');
            $User->Hobbies = implode(' ',$request->input('hobbies'));
            $User->Password = $request->input('Password');
            $User->save();
            return redirect('/index');
        }
    }
    public function deleteUser($id){
        Registration::find($id)->delete();
        return redirect('/index');
    }
}
