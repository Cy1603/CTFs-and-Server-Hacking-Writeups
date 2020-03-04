<?php
// Generate p, g, a;
$p = bin2hex(openssl_random_pseudo_bytes(16));
$pDec = bchexdec($p);
$g = bin2hex(openssl_random_pseudo_bytes(16));
$gDec = bchexdec($g);
$a = bin2hex(openssl_random_pseudo_bytes(16));
$aDec = bchexdec($a);

// Calculate A ( A = g^a mod p)
$ADec = bcpowmod($gDec,$aDec,$pDec);
$A = bcdechex($ADec);

// Send p,g,A (DO NOT SEND a) (tts our private key)
$send = array();
$send['p'] = $p;
$send['g'] = $g;
$send['A'] = $A;
$send = json_encode($send)."\n";
$resp = sendToCNC($send);

// Retrieve B
$resp = json_decode(trim($resp), true);
$B = bchexdec($resp['B']);
$id = $resp['id'];

// Calculate shared secret s
$s = bcdechex(bcpowmod($B, $aDec, $pDec));
$secret = bchexbin($s);

// send encrypted message
$msg = 'some very secret message here'; // decrypt the actual sent msg to get the flag
$enc = xorString($secret, $msg);
$send = array();
$send['msg'] = base64_encode($enc);
$send['id'] = $id;
$send = json_encode($send)."\n";
$resp = sendToCNC($send);

function bchexdec($hex){
    $dec = 0;
    $len = strlen($hex);
    for ($i = 1; $i <= $len; $i++) {
        $dec = bcadd($dec, bcmul(strval(hexdec($hex[$i - 1])), bcpow('16', strval($len - $i))));
    }
    return $dec;
}

function bcdechex($dec) {
    $hex = '';
    do {    
        $last = bcmod($dec, 16);
        $hex = dechex($last).$hex;
        $dec = bcdiv(bcsub($dec, $last), 16);
    } while($dec>0);
    return $hex;
}

function bchexbin($s){
	$out = '';
	if (strlen($s) % 2 !== 0) $s = '0'.$s;
	for ($i=0; $i<strlen($s); $i+=2){
		$tmp = chr(hexdec(substr($s,$i,2)));
		$out .= $tmp;
	}
	return $out;
}

function xorString($m1, $m2){
	$len = max(strlen($m1), strlen($m2));
	$out = '';
	for ($i=0; $i<$len; $i++){
		$t1 = ord($m1[$i % strlen($m1)]);
		$t2 = ord($m2[$i % strlen($m2)]);
		$out .= chr($t1 ^ $t2);
	}
	return $out;
}

function sendToCNC($msg){
	$url = "192.168.223.133/cnc/server.php";
	echo "Sending $msg \n";
	$ch = curl_init();
	CURL_SETOPT($ch, CURLOPT_URL, $url);
	CURL_SETOPT($ch, CURLOPT_RETURNTRANSFER, true);
	CURL_SETOPT($ch, CURLOPT_POST, true);
	CURL_SETOPT($ch, CURLOPT_POSTFIELDS, $msg);
	CURL_SETOPT($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
	$resp = curl_exec($ch);
	curl_close($ch);
	return $resp;
}
?>