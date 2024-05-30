<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Redirect;

class ApiController extends Controller
{
    public function postData(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        $client = new Client();
        $response = $client->request('POST', 'https://billspayeadmin.in/BillsPayeApis/v1/login', [
            'headers' => [
                'Authorization' => 'b8416f2680eb194d61b33f9909f94b9d',
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'username' => $username,
                'password' => $password
            ],
        ]);

        $statusCode = $response->getStatusCode();
        $data = json_decode($response->getBody()->getContents(), true);

        if ($data['status'] == 1) {
            $user = $data['userDetails'];
            session(
                [
                    'user_name' => $user['user_name'],
                    'user_id' => $user['user_id'],
                    'mobileno' => $user['mobileno'],
                    'email' => $user['email'],
                    // 'role_name' => $user['role_name'],
                    'msg' => $data['message']
                ]
            );

            return Redirect::route('dashboard');
        } else {

            session(
                [
                    'msg' => $data['message']
                ]
            );

            return Redirect::route('login');
        }
    }

    public function category_list()
    {
        $client = new Client();
        $response = $client->request('GET', 'https://billspayeadmin.in/BillsPayeApis/v1/categories', [
            'headers' => [
                'Authorization' => 'b8416f2680eb194d61b33f9909f94b9d',
                'Content-Type' => 'application/json',
            ]
        ]);

        $statusCode = $response->getStatusCode();
        $data = json_decode($response->getBody()->getContents(), true);

        return view('front.category')->with('categories', $data);
    }
}
