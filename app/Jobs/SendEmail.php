<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user;
    public $subject;
    public $content;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user,$subject,$content)
    {
        $this->user=$user;
        $this->subject=$subject;
        $this->content=$content;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        mail::send('email.loginsuccess',['username'=>$this->user->name,'content'=>$this->content],function($message){
            $message->to($this->user->email);
            $message->subject($this->subject);
        });
    }
}
