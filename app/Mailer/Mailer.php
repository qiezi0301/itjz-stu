<?php
/**
 * Created by PhpStorm.
 * User: zhangjialiang
 * Date: 2019-02-02
 * Time: 20:05
 */

namespace App\Mailer;

use Mail;
use Naux\Mail\SendCloudTemplate;

class Mailer {
    public function sendTo($template, $email, array $data) {
        $content = new SendCloudTemplate($template, $data);

        Mail::raw($content, function ($message) use ($email){
            $message->from('188316065@qq.com', 'itjz');
            $message->to($email);
        });
    }
}