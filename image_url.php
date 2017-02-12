<?php

$arg_symbol = '{symbol}';
$arg_period = '{period}';
$arg_date = '{date}';
$url_test = 'https://graph.yuantathai.com/InvestorWebCharts/Modules/Standard.aspx?Provider=DDC&symbolnsources={symbol}*BKK&Size=980*882&End={date}&Start=&period={period}&interval=1&Type=3&&username=KKS&password=KKS1234&pwdencode=false&Scale=0&EMA=10;50&MA=&OVER=;;OverlayV!;;&IND=MACD(12,26,9);RSI(14);;;&&COMP=&ShowBar=100&max=800&Skin=InvestorLight&Layout=2Line;Default;Price;HisDate&Width=1&TimeStamp=17;17;1486808228.251';


$symbol = $_GET['symbol'];
$perior = $_GET['perior'];
$date = date('Ymd');
$remoteImage = str_replace($arg_symbol,$symbol,$this->url_test);
$remoteImage = str_replace($arg_period,$perior,$remoteImage);
$remoteImage = str_replace($arg_date,$date,$remoteImage);
$imginfo = getimagesize($remoteImage);
header("Content-type: {$imginfo['mime']}");
readfile($remoteImage);

?>