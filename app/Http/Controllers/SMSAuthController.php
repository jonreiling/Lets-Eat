<?php

namespace App\Http\Controllers;

use App\SmsLogin;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\User;
use Twilio;
use GuzzleHttp\Client;

class SMSAuthController extends Controller
{


    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }
    
    public function getToken() {


      $token = rand( 100000 , 999999 );
      $passback_token = str_random(20);
      $phone = Input::get('phone');

      //Delete any existing requests.
      SmsLogin::where('phone', $phone)->delete();

      $smsLogin = SmsLogin::create([
          'token' => $token,
          'passback_token' => $passback_token,
          'phone' => $phone
        ]);

      Twilio::message($phone, 'Your authorization code is ' . $token );

      return $passback_token;


    }

    public function validateToken() {

      $token = Input::get('token');
      $phone = Input::get('phone');
      $passback_token = Input::get('passback_token');

      $obj = SmsLogin::where('token', $token)
                ->where('phone', $phone)
                ->where('passback_token', $passback_token)
                ->where('created_at', '>', Carbon::parse('-2 minutes'))
                ->first();

      if ( $obj == null ) {
        return "NOPE";
      }
        //Delete it.
      $obj->delete();


      // Find of create a user with said phone number.
      $user = User::firstOrCreate(['phone' => $phone]);

      // Generate a random password.
      $pass = str_random(20);

      $user->sms_password = $pass;
      $user->save();

      $http = new Client;

      $response = $http->post('http://dev.lets-eat.co/oauth/token', [
          'form_params' => [
              'grant_type' => 'password',
              'client_id' => '2',
              'client_secret' => 'TJ00pCuMdCFg78sOvUGb0xwO69eDGoGG6QeXS164',
              'username' => $phone,
              'password' => $pass,
              'scope' => '',
          ],
      ]);

      //Reset the user sms password.
      $user->sms_password = "";
      $user->save();

      return json_decode((string) $response->getBody(), true);  

      
    }
}
