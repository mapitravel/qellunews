<?php
function curl_file_get_contents($url)
{
    $ch = curl_init();
    $timeout = 5; // set to zero for no timeout
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    $file_contents = curl_exec($ch);
    curl_close($ch);
    return $file_contents;
}
	$cambio=curl_file_get_contents('http://media.perunoticias.net/html/prices/tours/cambio.html');
	die($cambio);
?>