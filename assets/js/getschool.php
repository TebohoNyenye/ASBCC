<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");
	header('Content-Type: application/json;charset=utf-8');
    
  
      $url = "https://kf.kobotoolbox.org/assets/aR7Gp3iZ2mVwpCkk2S6hdn/submissions.json";

      $curl = curl_init($url);
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

      $headers = array(
         "Authorization: Bearer 00356ef249a28bba53ce7d0992787fd1e12373ff",
      );
      curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
      //for debug only!
      curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
      curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

      $resp = curl_exec($curl);
       echo $resp;
       
      

   


  
?>