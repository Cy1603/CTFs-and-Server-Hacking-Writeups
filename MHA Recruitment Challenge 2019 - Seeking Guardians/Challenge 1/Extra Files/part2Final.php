<?php
echo" <h1>May the 4th be with you</h1>";
@extract($_REQUEST); #extract $a and $b. probably eval and b64decode
setcookie("saved", "Recruitment", time()+60);

#if (!isset($a) || !isset($b)) die(base64_decode("VHJ5IGhhcmRlciEgaHR0cHM6Ly93d3cueW91dHViZS5jb20vd2F0Y2g/dj1kUXc0dzlXZ1hjUQ==")); #youtube
$c['____'] = "JGdQQSA9IGNyZWF0ZV9md"; 
$c['___+'] = "W5jdGlvbignJGEnLCAnJGFyciA9IGdldF9kZWZpbmVkX2Z1";
$c['__+_'] = "bmN0aW9ucygpOyBmb3IoJGkgPSAwOyAkaSA8IHNpem";
$c['__++'] = "VvZigkYXJyWyJpbnRlcm5hbCJdKTsgJGkrKykgaWY";
$c['_+__'] = "obWQ1KCRhcnJbImludGVybmFsIl1bJGldKSA9PT";
$c['_+_+'] = "0gJGEpIHJldHVybiAkYXJyWyJpbnRlcm5hbCJdWyRpXTsnKTs=";
$d = implode("", $c);
$gPA = function($a){
	$arr = get_defined_functions();
	for($i = 0; $i < sizeof($arr["internal"]); $i++) 
		if(md5($arr["internal"][$i]) === $a) return $arr["internal"][$i];
};
#$a($b($d));
$pBN = $gPA("954eb83bca864c64ee1e669dfab01c95"); #basename
$gDV = $gPA("af6e6606777c897fe2c3eef3cc44b1f5"); #get_defined_vars
$v;
$gAK = $gPA("7c472da859c7b277514869e13f4b6daf"); #array_keys
$ks = $gAK(get_defined_vars()); #array of ==> _GET _POST _COOKIE _FILES _SERVER _SESSION gPA pBN gDV gAK

$gM = $gPA("1bc29b36f623ba82aaf6724fd3b16718"); #md5
for ($i = 0;$i <sizeof($ks);$i++){switch ($gM($ks[$i])){
case "27904fbf922f403df7dcfb5076c07112":$v[0]=$ks[$i]; #_SERVER
break;
case "bc914a241ab831e2f2781d61f6647efc":$v[1]=$ks[$i]; #_SESSION
break;
case "8d9ac2cb39a86a82eec1ef4a2558ba9d":$v[2]=$ks[$i]; #_REQUEST
break;
case "7f65565d569b2548c895a1ea9d00058e":$v[3]=$ks[$i]; #_GET
break;
case "43d124f57db1f617eb8baf462de368c2":$v[4]=$ks[$i]; #_COOKIE
break;
case "65f3bb07dc75e870582ba05a56e92ed2":$v[5]=$ks[$i]; #_POST
break;
} #v is array
}$gSRT=$gPA("6129983c8355e86411651ca832d5184b"); #str_rot13
$gBD=$gPA("84cbd86cb89af7c37f6b33840c0e44d6"); #base64_decode
$gBE=$gPA("c7c283c90d714a73510053d2f1a32432"); #base64_encode
$gE=$gPA("2eed1fe0db36d674643b5f84d2adf46e"); #empty string
/*Congrats for getting through the first layer.Carry on and find the flag.*/
eval($gSRT($gBD($gSRT("p2uupTq2LzRtMKN0XPE4pzksMzqyYPEkozqhK2MaMFy7WUuloQ1hMJIhoPtcBlEkozqhCJ5yMJ5fXPx7p2WyXPE2CGN7WUL8MzqyrKWuXPE4pzksMzqyXGfxqvfeXKfxrUWfJ109LzIkXPE4pzksMzqyrlE2sFx7sKAvMFtxqw0jBlE2CTMaMKylLFtxpJ5aoy9zM2HcBlE2XlfcrlEkozqhJ109LzIkXPEkozqhK2MaMKfxqa0cB30xMzqhM3V9ozIyozjbXGgmLzHbWUL9ZQfxqwjlAGL7WULeXlxxMzqhM3WoWUMqCFE2BlE5pzR9pTWbLJpbWUuloPx7WUMupKWeZG0xqzSkpzflCGN7p2WyXPEjLzuuM3WyCGN7WUOvnTSapzH8ZwH2BlEjLzuuM3WyXlfcrlE2LKSlnmV9XPE4pzkoWUMupKWeZI0eWTMaozqlJlEjLzuuM3WyKFfxqzSkpzflXFHlAGL7WTq6Lm0xMzqhM3WoWUOvnTSapzIqBlEzM25apyfxpTWbLJqlMI09WTMaozqlJlE2LKSlnmWqBlEzM25apyfxqzSkpzflKG0xM3cwBlE2LKSlnmR9XPE2LKSlnmReZFxyWUylLGg9WUylLG1jLzuuMltxpJ5aovx7WTf9WTj9ZQgmLzHbWUOvnTSapzH9ZQfxpTWbLJqlMGjxrKWuBlEjLzuuM3WyXlfcrlEeCFtxnlfkXFHlAGL7WTj9XPEzM25apyfxn10eWTjcWGV1AwfxM3cwCFEzM25apyfxn107WTMaozqlJlEeKG0xMzqhM3WoWTkqBlEzM25apyfxoS09WTq6LmfxpJ5aoyfxpTWbLJqlMI1rCFEzM25apyfbWTMaozqlJlEeKFfxMzqhM3WoWTkqXFHlAGMqB30xpJ5aoy9zM2H9VvV7p2WyXPE2CGN7WUL8WUylLGfxqvfeXKfxpJ5aoy9zM2HhCKO1MFtxpJ5aoyfxqy0cB31ypzqbMJRxpJ5aoy9zM2H7sD=="))));

/*function rc4($key_str,$data_str){$key=array();$data=array();for($i=0;$i<strlen($key_str);$i++){$key[]= ord($key_str{$i});}for($i=0;$i <strlen($data_str);$i++){$data[]=ord($data_str{$i});}$state=array();for($i=0;$i<256;$i++)$state[$i]= $i;$len=count($key);$index1= $index2=0;for($counter= 0;$counter <256;$counter++){$index2=($key[$index1]+$state[$counter]+$index2)%256;$tmp=$state[$counter];$state[$counter]=$state[$index2];$state[$index2]=$tmp;$index1=($index1+1)%$len;}$len=count($data);$x=$y=0;for($counter=0;$counter<$len;$counter++){$x= ($x+1)%256;$y=($state[$x]+$y)%256;$tmp= $state[$x];$state[$x]=$state[$y];$state[$y]= $tmp;$data[$counter]^=$state[($state[$x]+$state[$y])%256];}$data_str="" ;for($i=0;$i <$len;$i++){$data_str.=chr($data[$i]);}return$data_str;}
*/

$pp="";


$ss=${$v[4]}; #$v[4] == _COOKIE

if (isset($ss["saved"]))
	$pp=$ss["saved"];
else die($gBD("VHJ5IGhhcmRlciEgaHR0cHM6Ly93d3cueW91dHViZS5jb20vd2F0Y2g/dj1kUXc0dzlXZ1hjUQ==")); #youtube
if (strrev(substr(md5($pp),0,31))==="6733ba4851cfbef15491d81dd34ed1e"){
	$pp=$gBD($gSRT($pp));
	eval($gBD("ZWNobyBiYXNlNjRfZGVjb2RlKHJjNChzdHJyZXYoJHBwKSwgYmFzZTY0X2RlY29kZSgiRXZRWDZ0WnpuTjkrcTFkK1ltSEp0aW56MXpxY2hMUG5HelZVaStKZkl0TmJyQkRWIikpKTs="));
	#echo base64_decode(rc4(strrev($pp), base64_decode("EvQX6tZznN9+q1d+YmHJtinz1zqchLPnGzVUi+JfItNbrBDV")));

}

?>
