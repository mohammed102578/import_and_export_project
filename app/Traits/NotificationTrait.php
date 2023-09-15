<?php
namespace App\Traits;
use App\Models\DeviceToken;
use Carbon\Carbon;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use LaravelFCM\Facades\FCM;

Trait NotificationTrait
{

    public static function SEND_SINGLE_NOTIFICATION($user_id, $notification_title, $notification_body, $notification_data, $time_to_live)
    {
        if (!DeviceToken::where('user_id', $user_id)->first()) {
            return 0;
        }
        $token = DeviceToken::where('user_id', $user_id)->first();
//dd($token);
        $fcm_token = $token->fcm_token;
        $device_type = $token->device_type;
        $optionBuilder = new OptionsBuilder();
        $optionBuilder->setTimeToLive($time_to_live);
        $notificationBuilder = new PayloadNotificationBuilder($notification_title);
        $notificationBuilder->setBody($notification_body)->setSound('default');
        $dataBuilder = new PayloadDataBuilder();
        $dataBuilder->addData($notification_data);
        $option = $optionBuilder->build();

           $notification = $notificationBuilder->build();
        if ($device_type == 'android') {
            $notification = null;
        } else {
            $notification = $notificationBuilder->build();
        }

        $data = $dataBuilder->build();
        $downstreamResponse = FCM::sendTo($fcm_token, $option, $notification, $data);
//        dd($downstreamResponse);
        return $downstreamResponse;
    }

    function sendMultiNotification($notificationTitle, $notificationBody, $devicesTokens) {

        $optionBuilder = new OptionsBuilder();
        $optionBuilder->setTimeToLive(60*20);

        $notificationBuilder = new PayloadNotificationBuilder($notificationTitle);
        $notificationBuilder->setBody($notificationBody)
            ->setSound('default');

        $dataBuilder = new PayloadDataBuilder();
        $dataBuilder->addData(['a_data' => 'my_data']);

        $option = $optionBuilder->build();
        $notification = $notificationBuilder->build();
        $data = $dataBuilder->build();

// You must change it to get your tokens
        $tokens = $devicesTokens;

        $downstreamResponse = FCM::sendTo($tokens, $option, $notification, $data);
//        dd($downstreamResponse);
        $downstreamResponse->numberSuccess();
        $downstreamResponse->numberFailure();
        $downstreamResponse->numberModification();

//return Array - you must remove all this tokens in your database
        $downstreamResponse->tokensToDelete();

//return Array (key : oldToken, value : new token - you must change the token in your database )
        $downstreamResponse->tokensToModify();

//return Array - you should try to resend the message to the tokens in the array
        $downstreamResponse->tokensToRetry();

// return Array (key:token, value:errror) - in production you should remove from your database the tokens present in this array
        $downstreamResponse->tokensWithError();

        return ['success' => $downstreamResponse->numberSuccess(), 'fail' => $downstreamResponse->numberFailure()];
    }



    function saveNotification($userId,$type , $value_ar,$value_en,$title_ar,$title_en,$icon, $order_id = 0 ) {

        $notification = \App\Models\Notification::create(
            [
                'user_id'        => $userId,
                'type'           => $type,
                'value_ar'        => $value_ar,
                'value_en'        => $value_en,
                'title_ar'        => $title_ar,
                'title_en'        => $title_en,
                'icon'        => $icon,
                'order_id'    => $order_id,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ]);
        return $notification;
    }
}


