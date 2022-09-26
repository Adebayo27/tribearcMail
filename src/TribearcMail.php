<?php
namespace Adebayo27\Tribearcmail;
use Illuminate\Support\Facades\Http;

class TribearcMail {
    public function justDoIt($subject, $content, $mails) {
        $response = Http::post('https://newsletter.tribearc.com/api/campaigns/send_now.php', 
        [
            'api_key' => env('TRIBEARC_MAIL_API_KEY'),
            'from_name' => env('TRIBEARC_MAIL_FROM_NAME'),
            'from_email' => env('TRIBEARC_MAIL_FROM_EMAIL'),
            'reply_to' => env('TRIBEARC_MAIL_REPLY_TO'),
            'subject' => $subject,
            'html_text' => $content,
            'track_opens' => '1',
            'track_clicks' => '1',
            'send_campaign' => '1',
            'json' => '1',
            'emails' => $mails,
            'business_address' => env('TRIBEARC_MAIL_BUSINESS_ADDRESS'),
            'business_name' => env('TRIBEARC_MAIL_BUSINESS_NAME')
        ]
        
    );

        return 'Hello';
    }

    static function tribearcSendMail($subject, $content, $mails){
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://newsletter.tribearc.com/api/campaigns/send_now.php');
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); //
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false); //
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST'); //
        curl_setopt($curl, CURLOPT_POSTFIELDS, array(
            'api_key' => env('TRIBEARC_MAIL_API_KEY'),
            'from_name' => env('TRIBEARC_MAIL_FROM_NAME'),
            'from_email' => env('TRIBEARC_MAIL_FROM_EMAIL'),
            'reply_to' => env('TRIBEARC_MAIL_REPLY_TO'),
            'subject' => $subject,
            'html_text' => $content,
            'track_opens' => '1',
            'track_clicks' => '1',
            'send_campaign' => '1',
            'json' => '1',
            'emails' => $mails,
            'business_address' => env('TRIBEARC_MAIL_BUSINESS_ADDRESS'),
            'business_name' => env('TRIBEARC_MAIL_BUSINESS_NAME')
        ));
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Api-Token:' . env('TRIBEARC_MAIL_API_KEY')));

        $response = curl_exec($curl);
        $res = $response;
        curl_close($curl);
        if($res == 'Message sent!'){
            return $res;
        }else{
            return 'An error occurred';
        }
        
        
    }

    static function tribearcSendBulkMail($subject, $content, $mails){
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://newsletter.tribearc.com/api/campaigns/send-email.php');
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); //
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false); //
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST'); //
        curl_setopt($curl, CURLOPT_POSTFIELDS, array(
            'api_key' => env('TRIBEARC_MAIL_API_KEY'),
            'from_name' => env('TRIBEARC_MAIL_FROM_NAME'),
            'from_email' => env('TRIBEARC_MAIL_FROM_EMAIL'),
            'reply_to' => env('TRIBEARC_MAIL_REPLY_TO'),
            'subject' => $subject,
            'html_text' => $content,
            'track_opens' => '1',
            'track_clicks' => '1',
            'send_campaign' => '1',
            'json' => '1',
            'emails' => $mails,
            'business_address' => env('TRIBEARC_MAIL_BUSINESS_ADDRESS'),
            'business_name' => env('TRIBEARC_MAIL_BUSINESS_NAME'),
        ));
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Api-Token: '. env('TRIBEARC_MAIL_API_KEY')));

        $response = curl_exec($curl);
        $res = $response;
        curl_close($curl);
        if($res == 'Message sent!'){
            return $res;
        }else{
            return 'An error occurred';
        }
    }
}