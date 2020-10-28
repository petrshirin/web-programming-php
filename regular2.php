<?php
function expansion($expansion_w) {
	$word = $expansion_w;
	$reg = '/^[A-Za-z0-9А-Яа-яёЁ]+\.[a-z]+$/';
	if (preg_match($reg, $word, $matches))
	{
		return $matches[0];
	}
	else
		return null;
	
}

function match($match_w) {
		$word = $match_w;
		$archive = '/(zip|7z|ace|arj|cab|cbr|deb|exe|gz|jar|gzip|one|pak|pkg|ppt|rar|rpm|sh|sib|sis|sisx|spl|tar|tar-gz|tgz|xar|zipx)$/';
		$music = '/(aac|ac3|aif|aiff|amr|aob|ape|asf|aud|awb|bwg|cdr|flac|gpx|ics|iff|m|m3u|m3u8|m4a|m4b|m4p|m4r|mid|midi|mod|mp3|mpp|msc|msv|mts|nkc|ogg|ps|ra|ram|sdf|sib|sln|spl|srt|temp|vb|wav|wave|wm|wma|wpd|xsb|xwb)$/';
		$video = '/(3g2|3gp|3gp2|3gpp2|3gpp|asf|asx|avi|dat|drv|f4v|flv|gtp|h264|m4v|mkv|mod|moov|mov|mp4|mpeg|mpg|mts|rm|rmvb|spl|srt|stl|swf|ts|vcd|vid|vob|webm|wm|wmv|yuv)$/';
		$img = '/(asf|cdw|cr2|cs|cur|dmp|drv|icns|max|mds|mng|msv|odt|ogg|pct|pict|png|pps|prf|spl|tex|ttf|xps|jpg|bmp)$/';
		if (preg_match($archive, $word, $matches)) {
			return $matches[0];
		}
		else if (preg_match($music, $word, $matches)) {
			return $matches[1];
		}
		else if (preg_match($video, $word, $matches)) {
			return $matches[1];
		}
		else if (preg_match($img, $word, $matches)) {
			return $matches[1];
		}
		else
			return null;

}

function title($title_w) {
	$string = $title_w;
	$title = '/<title.*?>(.*)<\/title>/';
	if (preg_match($title, $string, $matches)) {
		echo $matches[1];
	}
	else
		echo null;
}

function ahref($ahref_w){
	$string = $ahref_w;
	$ahref = '/<a(.+)>(.+)<\/a>/';
	$href = '/href=(?:\"|\')+(.+?)(?:\"|\')+/';
	$result = [];
	if (preg_match($ahref, $string, $matches)) {
		$str = '';
		for ($i = 0; $i < count($matches[1]); $i++) { 
			$str .= $matches[1][$i];
			$str .= "<br>";
		}
		if (preg_match_all($href, $str, $matches1)) { 
			for($i=0;$i<count($matches1[1]);$i++) { 
				array_push($result, $matches1[1][$i]); 
			}
		} 
	}
		return $result;
}

function imgfind($img_w){
	$string = $img_w;
	$img = '/<img(.+)>/';
	$result = [];
	if(preg_match_all($img, $string, $mas1)) {
		$str = '';
		for ($i=0; $i < count($mas1[1]); $i++)
		{ 
			$str .= $mas1[1][$i];
		}
		if (preg_match_all("#src=(?:\"|')+(.+?)(?:\"|')+#", $str, $mas))
		{ 
			for($i=0;$i<count($mas[1]);$i++){ 
				array_push($result, $mas[1][$i]); 
			}
		} 
	}  
	return $result

}

function strong($text_w, $strong_w){
	$text = $text_w;
	$strong = $strong_w;
	$str = "<strong>$strong</strong>";
	if (preg_match("/$strong/", $text)) {
		return preg_replace("/$strong/", $str, $text);
	}
	else
		echo null;

}

function replacesmile($smile_w){
	$text = $smile_w;
	$img = $text;
	$sm1 = "/\:\)/";
	$sm2 = "/\:\(/";
	$sm3 = "/\;\)/";
	$img = preg_replace($sm1, "<img src = 'https://img.icons8.com/color/48/000000/lol.png' alt = ':)'>", $img);
	$img = preg_replace($sm2, "<img src = 'https://img.icons8.com/color/48/000000/sad.png' alt = ':('>", $img);
	$img = preg_replace($sm3, "<img src = 'https://img.icons8.com/color/48/000000/wink.png' alt = ';)'>", $img);
	if ($img === $text)
	{
		return null;
	}
	echo return $img;		

}

function space($space_w){
	
	$text = $space_w;
	$space = "/\s+/";
	$text = preg_replace($space," ", $text);
	echo $text;

}