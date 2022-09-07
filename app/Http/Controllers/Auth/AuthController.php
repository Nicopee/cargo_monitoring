<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{


    public function loginAgent(Request $request)
    {
        return $this->login($request, "AGENT");
    }

    public function loginSender(Request $request)
    {
        return $this->login($request);
    }

    public function profile(Request $request)
    {
        $user_profile = $request->user();
        return response()->json($user_profile);
    }

    private function login(Request $request, string $userType = 'SENDER')
    {
        $loginCreds = Validator::make($request->all(), [
            'username' => "required|string|min:3|max:250",
            "password" => "required|string|min:3|max:250"
        ]);

        if (!$loginCreds->fails()) {
            $form_params = [
                'grant_type' => 'password',
                'client_id' => env($userType . "_USER_ID"),
                'client_secret' => env($userType . "_USER_SECRET"),
                'username' => $request->username,
                'password' => $request->password,
            ];

            try {
                $http = new Client(['base_uri' => env('APP_URL')]);
                $response = $http->post("oauth/token", [
                    'form_params' => $form_params,
                ]);
                $login_response = json_decode((string) $response->getBody());
                return response()->json($login_response);
            } catch (GuzzleException $ex) {
                return response()->json($ex->getMessage(), 401);
                // return response()->json(['message' => 'Incorrect email/password.'], 401);
            } catch (Exception $ex) {
                return response()->json(['message' => "Server Error"], 500);
            }
        } else {
            return $loginCreds->errors();
        }
    }
}
