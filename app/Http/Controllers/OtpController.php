<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStore;
use App\Mail\OtpMail;
use App\Models\Otp;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class OtpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

        $id = $user->id;

        // $user = User::find($request->user_id);

        $otp = rand(100000, 999999);
        $expiresAt = Carbon::now()->addMinutes(10);

        Otp::create([
            'user_id' => $id,
            'otp' => $otp,
            'expires_at' => $expiresAt,
        ]);

        Mail::to($input['email'])->send(new OtpMail($otp));

        return Redirect::route('verifyOtp')->with(['message' => 'OTP sent to your email', 'user_id' => $id]);

        // return response()->json(['message' => 'OTP sent to your email']);
    }

    public function verify_otp()
    {
        return view('users.otp_verification');
    }

    public function verify_otp_post(Request $request)
    {
        $otp = Otp::where('otp', $request->otp)
                    ->where('user_id', $request->user_id)
                    ->where('expires_at', '>', Carbon::now())
                    ->first();

        if ($otp) {
            return response()->json(['message' => 'OTP verified successfully']);
        } else {
            return response()->json(['message' => 'Invalid or expired OTP'], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
}
