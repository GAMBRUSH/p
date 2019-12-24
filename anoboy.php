<?php
$tred = "\033[1;31m";
$tgreen = "\033[1;32m";
$tyellow = "\033[1;33";
$tcyan = "\033[1;36";
$twhite = "\033[1;37m";
$netral = "\033[0m";

$red = "\033[41m";
$green = "\033[42m";
$yellow = "\033[43m";
$blue = "\033[44m";
$magenta = "\033[45m";
$cyan = "\033[46m";

$bg = array($red, $green, $yellow, $blue, $magenta, $cyan);
$bgrand = array_rand($bg);

$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "https://anoboy.video/anime-list/");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$scrape = curl_exec($ch);
curl_close($ch);

preg_match_all("/<a href=\"(.*?)\" rel=\"bookmark\" title=\"(.*?)\">/", $scrape, $content);
$isicontent = $content[2];

for ($i = 0; $i < count($isicontent); $i++){
	$bg = array($red, $green, $yellow, $blue, $magenta, $cyan);
	$bgrand = array_rand($bg);
	echo $bg[$bgrand] . $twhite . $i . ". " . $isicontent[$i] . $netral ." \n";
}
echo "\n \n \n";
echo $tgreen . "Anime Nomor : " . $netral;
$list = trim(fgets(STDIN));

system(clear);

$url = $content[1][$list];
$cl = curl_init();
	curl_setopt($cl, CURLOPT_URL, $url);
	curl_setopt($cl, CURLOPT_RETURNTRANSFER, true);
$mentah = curl_exec($cl);
curl_close($cl);

preg_match_all("/<li><a href=\"(.*?)\" title=\"(.*?)\">/", $mentah, $anime);

$judul = array_reverse($anime[2]);
$link = array_reverse($anime[1]);

for($x = 0; $x < count($judul); $x++){
	$bg = array($red, $green, $yellow, $blue, $magenta, $cyan);
	$bgrand = array_rand($bg);
	echo $bg[$bgrand] . $twhite . $x . ". " . $judul[$x] . $netral . " \n";
}

judul:

echo $tred . "Pilih Episode/BATCH : " . $netral;
$eps = trim(fgets(STDIN));
$donlot = $link[$eps];
$dlo = curl_init();
	curl_setopt($dlo, CURLOPT_URL, $donlot);
	curl_setopt($dlo, CURLOPT_RETURNTRANSFER, true);
$dlt = curl_exec($dlo);
curl_close($dlo);

preg_match_all("/<a href=\"(.*?)\" rel=\"noopener\" target=\"_blank\">240P<\/a>/", $dlt, $duapatpuluh);
preg_match_all("/240P<\/a> \| <a href=\"(.*?)\" rel=\"noopener\" target=\"_blank\">SD360P<\/a>/", $dlt, $tiganampuluh);
preg_match_all("/SD360P<\/a> \| <a href=\"(.*?)\" rel=\"noopener\" target=\"_blank\">480P<\/a>/", $dlt, $patlapanpuluh);

preg_match_all("/<div class=\"child\">
<a href=\"(.*?)\" rel=\"noopener\" target=\"_blank\">240P<\/a><\/div>/", $dlt, $btch1);
preg_match_all("/<div class=\"child\">
<a href=\"(.*?)\" rel=\"noopener\" target=\"_blank\">SD360P<\/a><\/div>/", $dlt, $btch2);
preg_match_all("/<div class=\"child\">
<a href=\"(.*?)\" rel=\"noopener\" target=\"_blank\">480P<\/a><\/div>/", $dlt, $btch3);

preg_match_all("/<div class=\"child\">
<a class=\"dll\" href=\"(.*?)\" rel=\"noopener\" target=\"_blank\">(.*?)<\/a><\/div>/", $dlt, $batc);

preg_match_all("/<a id=\"allvideo\" class=\"active\" href=\"#\" data-video=\"(.*?)\" rel=nofollow\">(.*?)<\/a>/", $dlt, $stream);


if(isset($patlapanpuluh[1][0])){
	$m4u = $duapatpuluh[1][0];
	$zippy = $duapatpuluh[1][1];
	$mirror = $duapatpuluh[1][2];
	$m4u1 = $tiganampuluh[1][0];
	$zippy1 = $tiganampuluh[1][1];
	$mirror1 = $tiganampuluh[1][2];
	$m4u2 = $patlapanpuluh[1][0];
	$zippy2 = $patlapanpuluh[1][1];
	$mirror2 = $patlapanpuluh[1][2];

	echo $tred . "240P\n\n" . $tgreen . $m4u . "\n" . $zippy . "\n" . $mirror . $netral . "\n\n";
	echo $tred . "360P\n\n" . $tgreen . $m4u1 . "\n" . $zippy1 . "\n" . $mirror1 . $netral . "\n\n";
	echo $tred . "480P\n\n" . $tgreen . $m4u2 . "\n" . $zippy2 . "\n" . $mirror2 . $netral . "\n\n";
}elseif(isset($btch1[1][0])){
	$drive = $btch1[1][0];
	$fcloud = $btch1[1][1];
	$kbagi = $btch1[1][2];
	$drive1 = $btch2[1][0];
	$fcloud1 = $btch2[1][1];
	$kbagi1 = $btch2[1][2];
	$drive2 = $btch3[1][0];
	$fcloud2 = $btch3[1][1];
	$kbagi2 = $btch3[1][2];
	echo $tred . "240P\n\n" . $tgreen . $drive . "\n" . $fcloud . "\n" . $kbagi . $netral . "\n\n";
	echo $tred . "360P\n\n" . $tgreen . $drive1 . "\n" . $fcloud1 . "\n" . $kbagi1 . $netral . "\n\n";
	echo $tred . "480P\n\n" . $tgreen . $drive2 . "\n" . $fcloud2 . "\n" . $kbagi2 . $netral . "\n\n";
}elseif(isset($batc[1][0])){
	echo $red . $twhite . "Batch 720p > 480p > 360p > 240p" . $netral . "\n\n";
	for ($i = 0; $i < count($batc[2]); $i++){
		$bg = array($red, $green, $yellow, $blue, $magenta, $cyan);
		$bgrand = array_rand($bg);
		if ($batc[2][$i] == ""){
			continue;
		}
		echo $bg[$bgrand] . $twhite . $batc[2][$i] . $netral . "\n" . $tgreen . $batc[1][$i] . $netral . "\n\n";
	}
}else {
	echo $red . $twhite . "Stream" . $netral . "\n\n";
	for($z = 0; $z < count($stream[1]); $z++){
	echo $cyan . $twhite . $stream[2][$z] . $netral . $tgreen . " => https://anoboy.video" . $stream[1][$z] . $netral . "\n\n";
	}
}
goto judul;
?>