public function index()
    {
        // $SERVER_KEY="AAAAjvHFXlI:APA91bEga2SlgVwIdZGx84lk15iGumd7k1rPjT6N8AQCJyv_MQBpj_uTdEE43yykRbWqlIbinSRQQStUKnNmT6MUB8KVF4sMUPjYh7mjQq664GILUPtVQqwR92JQgSyc6WoZ4K8kI_bb";

        $registrationIds = array('123');
        // prep the bundle
        $msg = array
        (
            'message' 	=> 'here is a message. message',
            'title'		=> 'This is a title. title',
            'subtitle'	=> 'This is a subtitle. subtitle',
            'vibrate'	=> 1,
            'sound'		=> 1,
            'largeIcon'	=> 'large_icon',
            'smallIcon'	=> 'small_icon'
        );

        $fields = array
        (
            'to ' => $registrationIds //for single user  
                
            // 'registration_ids' => $registrationIds, //  for  multiple users
            // 'data'	=> $msg
        );
            
        $headers = array
        (
            'Authorization: key=APA91bEga2SlgVwIdZGx84lk15iGumd7k1rPjT6N8AQCJyv_MQBpj_uTdEE43yykRbWqlIbinSRQQStUKnNmT6MUB8KVF4sMUPjYh7mjQq664GILUPtVQqwR92JQgSyc6WoZ4K8kI_bb',
            'Content-type: application/json'
        ); 
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
        $result = curl_exec($ch );
        if ($result === FALSE) 
        {
            die('FCM Send Error: ' . curl_error($ch));
        }
        curl_close( $ch );
        return $result;
    }
