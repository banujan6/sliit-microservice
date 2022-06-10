<?php

namespace App\Http\Controllers;

use App\Modals\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login( Request $req ) {

        $req->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $username = $req->input('username');
        $password = $req->input('password');

        $account = User::where('username', $username)->first();

        if ( !$account ) {
            return response()->json(["error" => "Account not found"],403);
        }

        $isPasswordValid = Hash::check($password, $account->password);

        if ( !$isPasswordValid ) {
            return response()->json(["error" => "Invalid password"],403);
        }

        $token = $this->generateToken([
                'id' => $account->id,
                'name' => $account->name
            ]);

        return response()->json(['access_token' => $token]);
    }

    public function verify(Request $req) {

        $tokenHeader = $req->header('authorization');
        $token = trim(str_ireplace('Bearer', '', trim($tokenHeader)));

        $details = $this->validateToken($token);

        if ( $details === 'ERR_INVALID') {
            return response()->json(["error" => "Invalid token"],403);
        }

        if ( $details === 'ERR_EXPIRED') {
            return response()->json(["error" => "Token is expired"],403);
        }

        return response()->json($details,200);
    }

    protected function generateToken($data): string {

        $header = [
            'alg' => 'bcrypt'
        ];
        $encodedHeader = base64_encode(json_encode($header));

        $payload = [
            'expireDate' => now()->addDay(10)->toDateTimeString(),
            'user' => $data,
        ];
        $encodedPayload = base64_encode(json_encode($payload));

        return $encodedHeader.'.'.$encodedPayload.'.'.base64_encode(Hash::make($encodedHeader.$encodedPayload.env('APP_KEY')));
    }

    protected function validateToken($token) {

        $tokenBlocks = explode('.', $token);
        $tokenHeader = $tokenBlocks[0];
        $tokenPayload = $tokenBlocks[1];
        $tokenSignature = base64_decode($tokenBlocks[2]);

        $isValidToken = Hash::check($tokenHeader.$tokenPayload.env('APP_KEY'), $tokenSignature);

        if ( !$isValidToken ) {
            return 'ERR_INVALID';
        }

        $decodedPayload = json_decode(base64_decode($tokenPayload));
        $isExpired = Carbon::parse($decodedPayload->expireDate)->gt(now());

        if ( !$isExpired ) {
            return 'ERR_EXPIRED';
        }

        return $decodedPayload->user;
    }
}
