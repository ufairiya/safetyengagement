<?php

function send_android_notification($android_device_token,$message) {
	
	 // prepare the bundle
        
$fields = array('to' =>$android_device_token,'data'=> $message);
//~ var_dump($fields);
//~ exit;
$headers = array(
'Authorization: key=AAAAACpcFY8:APA91bGj3Yz1BwzKeyuFYUAKgoHbjXMzT3cEGO-CyCknMvcmI_jytm8TO_bs3IyYq3_whf9RG_Zx4fxjD6R7H7Tw6I2S9oXQSGbBvsaOrxDDLskSIOu5bMTMfd3zrSQbqUDrqSIQMHOR', // FIREBASE_API_KEY_FOR_ANDROID_NOTIFICATION
'Content-Type: application/json'
);
// Open connection
$ch = curl_init();
// Set the url, number of POST vars, POST data
curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
curl_setopt( $ch,CURLOPT_POST, true );
curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
// Disabling SSL Certificate support temporarly
curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
// Execute post
$result = curl_exec($ch );
if($result === false){
die('Curl failed:' .curl_errno($ch));
}
// Close connection
curl_close( $ch );
return $result;
}
