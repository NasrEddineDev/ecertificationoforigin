<?php

namespace App\Functions;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Mail\MailSender;
use Illuminate\Support\Facades\Mail;

trait Functions
{

    protected function SendEmailTo($to_name, $to_email, $code)
    {
        $data = array('name'=>$to_name, 
                      'body' => 'This a verification mail, your code is: '.$code);
        Mail::send('emails.mail', $data, 
        function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)->subject('Verefication code');
            $message->from('certificateoforigin.caci@gmail.com','CACI E-Certification');
        });
    }

    protected function SendEmailToUser($user)
    {
        $full_name = $user->username;
        $to_email = $user->email;
        $data = array('id'=>$user->id,
                      'hash'=>sha1($user->email),
                      'name'=>$full_name,
                      'body' => 'Thank you so much for allowing us to help you with your recent account opening. We are committed to providing our customers with the highest level of service and the most innovative E-Certification services possible.

                      We are very glad you chose us as your financial institution and hope you will take advantage of our wide variety of savings, investment and loan products, all designed to meet your specific needs.');
        Mail::send('emails.mail', $data, 
        function($message) use ($full_name, $to_email) {
            $message->to($to_email, $full_name)->subject('New CACI E-Certification Account');
            $message->from('certificateoforigin.caci@gmail.com','CACI E-Certification');
        });
    }


    protected function SendEmailMessageTo($name, $email, $message)
    {
        $data = array('name'=>$name, 
                      'body' => $message);
        Mail::send('emails.leave-message', $data, 
        function($message) use ($name, $email) {
            $message->to('certification.caci@gmail.com', $name)->subject('New Message');
            $message->from($email,'CACI E-Certification');
        });
    }
}
