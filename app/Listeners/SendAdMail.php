<?php

namespace App\Listeners;

use App\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Jobs\SendEmail;

class SendAdMail implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        $this->user=$event->user;
        Mail::send('email.loginsuccess',['username'=>$this->user->name,'content'=>'嘿嘿嘿'],function($message){
            $message->to($this->user->email);
            $message->subject('登陆成功');
        });
        // $this->dispatch(new SendEmail($this->user,'Ning','欢迎登陆本网站，里面有很多资源等你哦;注意身体'));
    }
}
