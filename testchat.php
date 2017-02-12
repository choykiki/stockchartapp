<?php

$urlApi = 'http://www.khroton.com/comic/public/chatbot';

            $myvars = 'text=' . $text . '&replyToken=' . $replyToken;

                    $ch = curl_init( $urlApi );
                    curl_setopt( $ch, CURLOPT_POST, 1);
                    curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
                    curl_setopt( $ch, CURLOPT_POSTFIELDS, $myvars);
                    curl_setopt( $ch, CURLOPT_HEADER, 0);
                    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
                    $reponse = curl_exec($ch);
                    echo $reponse;

?>