<?php
$access_token = 'R7TGOxYe/8F5zt9sUFCnxcS/9GWoEWVuWJ/LamaejZnU7YgI4oK57XALFznSJ5u6vxb6i8h+7MY9Lrcbi8VZ3ycbQI1wHPNTiuYj2uFlOfHeJeYGfBPunxkiqx2Hd+Dsfo2xB6p5hv8sDqkuxAZ9xAdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];

			// Build message to reply back
			// $messages = [
			// 	'type' => 'text',
			// 	'text' => $text
			// ];

			// Make a POST Request to Messaging API to reply to sender
			$urlApi = 'http://103.13.231.224/comic/public/chatbot';

            $myvars = 'text=' . $text . '&replyToken=' . $replyToken;

                    $ch = curl_init( $urlApi );
                    curl_setopt( $ch, CURLOPT_POST, 1);
                    curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
                    curl_setopt( $ch, CURLOPT_POSTFIELDS, $myvars);
                    curl_setopt( $ch, CURLOPT_HEADER, 0);
                    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
                    $reponse = curl_exec($ch);


			// $messages = [
			// 	'type' => 'image',
			// 	'originalContentUrl' => 'https://graph.yuantathai.com/InvestorWebCharts/Modules/Standard.aspx?Provider=DDC&symbolnsources=ROJNA*BKK&Size=980*882&End=20170212&Start=&period=Daily&interval=1&Cycle=DAY1&Type=3&&username=KKS&password=KKS1234&pwdencode=false&Scale=0&EMA=10;50&MA=&OVER=;;OverlayV!;;&IND=MACD(12,26,9);RSI(14);;;&&COMP=&ShowBar=100&max=800&Skin=KKSLight&Layout=2Line;Default;Price;HisDate&Width=1&TimeStamp=17;17;1486808228.251',
			// 	'previewImageUrl' => 'https://graph.yuantathai.com/InvestorWebCharts/Modules/Standard.aspx?Provider=DDC&symbolnsources=ROJNA*BKK&Size=980*882&End=20170212&Start=&period=Daily&interval=1&Cycle=DAY1&Type=3&&username=KKS&password=KKS1234&pwdencode=false&Scale=0&EMA=10;50&MA=&OVER=;;OverlayV!;;&IND=MACD(12,26,9);RSI(14);;;&&COMP=&ShowBar=100&max=800&Skin=KKSLight&Layout=2Line;Default;Price;HisDate&Width=1&TimeStamp=17;17;1486808228.251',
			// ];

			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$reponse],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
		}
	}
}
echo "OK";