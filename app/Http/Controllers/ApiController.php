<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

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

        // print_r($data);die;

        return response()->json([
            'status' => 'success',
            'statusCode' => $statusCode,
            'data' => $data,
        ]);
    }
}
