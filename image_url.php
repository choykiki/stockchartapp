<?php
$remoteImage = "https://graph.yuantathai.com/InvestorWebCharts/Modules/Standard.aspx?Provider=DDC&symbolnsources=ROJNA*BKK&Size=980*882&End=20170212&Start=&period=Daily&interval=1&Cycle=DAY1&Type=3&&username=KKS&password=KKS1234&pwdencode=false&Scale=0&EMA=10;50&MA=&OVER=;;OverlayV!;;&IND=MACD(12,26,9);RSI(14);;;&&COMP=&ShowBar=100&max=800&Skin=KKSLight&Layout=2Line;Default;Price;HisDate&Width=1&TimeStamp=17;17;1486808228.251";
        $imginfo = getimagesize($remoteImage);
        header("Content-type: {$imginfo['mime']}");
        readfile($remoteImage);

        ?>