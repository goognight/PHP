<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>PE</title>
</head>
<body>
<?php
function baidu($url){
	$url="http://www.baidu.com/s?wd=site:".$url;
	//正则表达式匹配
    $ru="/<p><b>找到相关结果数约(.*)\s*个<\/b><\/p>/";
    $curl=curl_init();
    curl_setopt($curl,CURLOPT_URL,$url);
    curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
    $rs=curl_exec($curl);
	curl_close($curl);
	$arr=array();
	preg_match_all($ru,$rs,$arr);
    $str=$arr[1][0]; //获取到的收录数量
	$str=str_replace(",","",$str);
	if($str){
	return $str;
	}else{
	return 0;
	}
}
function sogou($url){
	$url="http://www.sogou.com/web?query=site:".$url;
	//正则表达式匹配
    $ru="/<p class=\"mun-tips\">搜狗已为您找到约(.*)\s*条相关结果<\/p>/";
    $curl=curl_init();
    curl_setopt($curl,CURLOPT_URL,$url);
    curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
    $rs=curl_exec($curl);
	curl_close($curl);
	$arr=array();
	preg_match_all($ru,$rs,$arr);
    $str=$arr[1][0]; //获取到的收录数量
	$str=str_replace(",","",$str);
	if($str){
	return $str;
	}else{
	return 0;
	}
}
function so($url){
	$url="https://www.so.com/s?q=site:".$url;
	//正则表达式匹配
    $ru="/<p class=\"ws-total\">找到相关结果约(.*)\s*个<\/p>/";
    $curl=curl_init();
    curl_setopt($curl,CURLOPT_URL,$url);
    curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
    $rs=curl_exec($curl);
	curl_close($curl);
	$arr=array();
	preg_match_all($ru,$rs,$arr);
    $str=$arr[1][0]; //获取到的收录数量
	$str=str_replace(",","",$str);
	return $str;
	if($str){
	return $str;
	}else{
	return 0;
	}
}
echo sogou('www.phome.net').'<br />';
echo baidu('liangyusheng.wikiyuedu.com').'<br />';
echo so('www.phome.net').'<br />';
?>
</body>
</html>
