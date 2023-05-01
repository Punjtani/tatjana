<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Twilio\Rest\Client;
use Exception;
class UserOtp extends Model
{
    use HasFactory;
    protected $guarded = [''];
    public function sendSMS($receiverNumber1)
    {
        $message = "Login OTP is ".$this->otp;
        try {
  
            // $account_sid = "AC0e9de838f1a9c0fdea308d4f2a16f92a";
            // $auth_token = "025cd6ec820c2efb5012b99a2e5f050a";
            // $twilio_number = "+14694253422";

            $account_sid = "ACaa378097a0fb8f699012094d36342619";
            $auth_token = "8b997704f43355f1fcdab77fae862629";
            $twilio_number = "+15075688610";

            $client = new Client($account_sid, $auth_token);
            $client->messages->create($receiverNumber1, [
                'from' => $twilio_number, 
                'body' => $message
            ]);
                         
    
        } catch (Exception $e) {
            return info("Error: ". $e->getMessage());
        }
    }
}
