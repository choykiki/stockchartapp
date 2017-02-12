<?php

$urlApi = 'http://103.13.231.224/comic/public/chatbot';

            $myvars = 'text=' . $text . '&replyToken=' . $replyToken;

                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $myvars);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			echo $reponse = curl_exec($ch);
			curl_close($ch);

?>