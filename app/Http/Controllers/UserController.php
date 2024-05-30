<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use App\Models\Verifytoken;
use Illuminate\Http\Request;
use App\Http\Requests\UserStore;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('front.users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStore $request)
    {
        $input = $request->validated();
        $input['password'] = bcrypt($input['password']);
        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => bcrypt($input['password'])
        ]);

        $validToken = rand(10, 100. . '2022');
        $get_token = new Verifytoken();
        $get_token->token = $validToken;
        $get_token->email = $input['email'];
        $get_token->save();

        $get_user_email = $input['email'];
        $get_user_name = $input['name'];
        Mail::to($input['email'])->send(new WelcomeMail($get_user_email, $validToken, $get_user_name));

        return Redirect::route('verify-account');

        // if ($input['role_id'] == 1){
        //     return Redirect::route('login')->with('success', 'User created successfully');
        // } else {
        //     return Redirect::route('user.index')->with('success', 'User created successfully');
        // }

    }

    public function verify_account()
    {
        return view('users.otp_verification');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        User::destroy($id);
        return Redirect::route('user.index')->with('success', 'User deleted successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserStore $request, $id)
    {
        $input = $request->validated();
        $input['password'] = bcrypt($input['password']);
        User::where('id', $id)->update($input);
        return Redirect::route('user.index')->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    function registration()
    {
        return view('front.registration');
    }
}
