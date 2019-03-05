<?php
/**
 * Created by PhpStorm.
 * User: zhangjialiang
 * Date: 2019-03-02
 * Time: 13:38
 */

namespace App\Http\Proxy;


use GuzzleHttp\Client;

class TokenProxy {
    protected $http;

    /**
     * TokenProxy constructor.
     * @param $http
     */
    public function __construct(Client $http) {
        $this->http = $http;
    }

    public function login($email, $password) {
        if (auth()->attempt(['email' => $email, 'password' => $password, 'is_active' => 1])) {
            return $this->proxy('password', [
                'username' => $email,
                'password' => $password,
                'scope' => ''
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => '您的邮箱尚未验证'
        ],421);

    }

    public function refresh() {
        //获取cookie中的refreshToken的值
        $refreshTonken = request()->cookie('refreshToken');
        return $this->proxy('refresh_token', [
            'refresh_token' => $refreshTonken
        ]);
    }

    public function logout() {
        $user = auth()->guard('api')->user();
        if (is_null($user)) {
            app('cookie')->queue(app('cookie')->forget('refreshToken'));
            return response()->json([
                'message' => 'Logout',
            ], 204)->cookie('refreshToken', '', 0, null);
        }

        $accessToken = $user->token();

        app('db')->table('oauth_refresh_tokens')
            ->where('access_token_id', $accessToken->id)
            ->update([
                'revoked' => true,
            ]);

        app('cookie')->queue(app('cookie')->forget('refreshToken'));
        $accessToken->revoke();

        return response()->json([
            'message' => 'Logout',
        ], 204)->cookie('refreshToken', '', 0, null);
    }

    /**
     * @param $grantType
     * @param array $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function proxy($grantType, array $data = []) {
        $data = array_merge($data, [
            'client_id'     => env('PASSPORT_CLIENT_ID'),
            'client_secret' => env('PASSPORT_CLIENT_SECRET'),
            'grant_type'    => $grantType,
        ]);
        $response = $this->http->post(env('APP_URL') . '/oauth/token', [
            'form_params' => $data
        ]);
        $token = json_decode((string) $response->getBody(), true);

        return response()->json([
            'token' => $token['access_token'],
            'auth_id' => md5($token['refresh_token']),
            'expires_in' => $token['expires_in']
        ])->cookie('refreshToken', $token['refresh_token'],14400,null,null,false,true);
    }
}