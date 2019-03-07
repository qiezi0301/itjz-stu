<?php
/**
 * Created by PhpStorm.
 * User: zhangjialiang
 * Date: 2019-02-02
 * Time: 20:08
 */

namespace App\Mailer;


use App\User;
use Auth;

class UserMailer extends Mailer {
    public function followNotifyEmail($email) {
        $data = [
            'url' => env('APP_URL'),
            'name' => Auth::guard('api')->user()->name
        ];
        $this->sendTo('zhihu_app_new_user_follow', $email, $data);
    }

    public function passwordReset($email,$token) {
        $data = [
            'url' => url(config('app.url') . route('password.reset', $token, false)),
        ];
        $this->sendTo('zhihu_app_password_reset', $email, $data);
    }

    public function welcome(User $user) {
        $data = [
            'url' => route('email.verify',['token' => $user->confirmation_token]),
            'name' => $user->name
        ];
        $this->sendTo('test_template_active', $user->email, $data);
    }

}