<?php
	$url ="http://example.com";  /* Website URL */
	$cl = curl_init();
	curl_setopt($cl,CURLOPT_URL, $url);
	curl_setopt($cl,CURLOPT_REFERER, "https://google.com"); 
	curl_setopt($cl,CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.113 Safari/537.36");
	curl_setopt($cl,CURLOPT_FOLLOWLOCATION,1);
	curl_setopt($cl,CURLOPT_RETURNTRANSFER, true);
	curl_setopt($cl,CURLOPT_HEADER, 0);
	curl_setopt($cl,CURLOPT_TIMEOUT, 10);
	$result = curl_exec($cl);
	$httpcode = curl_getinfo($cl, CURLINFO_HTTP_CODE);
	
if($httpcode == "200") { /* OK 200 The request was fulfilled. */
		preg_match('@<title>(.*?)</title>@si',$result,$title); /* values in array */
		preg_match_all('@class="(.*?)"@si',$result,$cssclass);
		preg_match_all("/input(.*?)name=\"([^\"]+)/i",$result,$inputname);
		preg_match_all("/href=\"([^\"]+)/i",$result,$link);
	}else{
	echo "Eror";}

//Show values
$cssclass = array_filter($cssclass); /*Filter for if*/
$inputname = array_filter($inputname);
$link = array_filter($link);
	
	if(!empty($title)){echo "Title: ".$title[1]."<br>";}else{echo "Title not found <br>";}
	if(!empty($cssclass)){$i =1;
	foreach ($cssclass[0] as $cssclass) {
		echo "Css Class Number: ".$i." : ".$cssclass."<br>";
		$i++;
		}
	}else{echo "Css Class not found <br>";}
	if(!empty($inputname)){$ii =1;
	foreach ($inputname[0] as $inputname) {
		echo "İnput Number: ".$ii." : ".$inputname."<br>";
		$ii++;
		}
	}else{echo "İnput name not found <br>";}
	if(!empty($link)){$iii =1;
	foreach ($link[0] as $link) {
		echo "Link Number: ".$iii." : ".$link."<br>";
		$iii++;
		}
	}else{echo "Link not found <br>";}


?>
