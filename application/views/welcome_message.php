<title>smhdk scraper</title>
<link href="http://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet" type="text/css">
<font face=Ubuntu>
<style>
  body { 
  background: black; 
}

.memek {
  margin: auto;
  background-color: #f7f3f3;
  width: 50%;
  
  padding: 10px;
  -moz-border-radius: 5px;
	-webkit-border-radius: 30px;
}

</style>
<div class="memek">
<?php

if(isset($_GET['page'])){

    function sedx($text)
    {
        $sed = $text;
        $sed = str_replace('Update Anime', '<p hidden>', $sed);
        $sed = str_replace('<a href="', '<a href="http://localhost/smhdk/get.php?anti=', $sed);
        $sed = str_replace('<b>Posted', '<font color=gray><b>Posted', $sed);
        return $sed;
    }

$babi = "/page/" . $_GET['page'] . "/";
$bangsat = 'https://www.samehadaku.tv';
$kontol = $bangsat . $babi; 
$curl = curl_init($kontol); 
curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE); 
$target = curl_exec($curl); 
if(curl_errno($curl))
{
	echo 'error: ' . curl_error($curl);
	exit;
}
curl_close($curl);

$tag = '/<div class="dev">(.*?)<div class="pagination">/s';
if ( preg_match($tag, $target, $udah) )
	
    echo sedx($udah[0]);
else 
    print "error";    
}

if(isset($_GET['home'])){
function wordFilter($text)
{
    $sed = $text;
    $sed = str_replace('Update Anime', '<p hidden>', $sed);
    $sed = str_replace('<a href="', '<a href="http://localhost/smhdk/application/controllers/get.php?anti=', $sed);
    $sed = str_replace('<b>Posted', '<font color=gray><b>Posted', $sed);
    return $sed;
}
$curl = curl_init('https://www.samehadaku.tv/'); 
curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE); 
$page = curl_exec($curl); 
if(curl_errno($curl)) 
{
	echo 'Scraper error: ' . curl_error($curl);
	exit;
}
curl_close($curl);

$regex = '/<div class="dev">(.*?)<div class="pagination">/s';
if ( preg_match($regex, $page, $list) )
	
    echo wordFilter($list[0]); 
else 
    print "Not found"; 

}


?>
</div></div></div></div>
</font><font color=green><b>
<?php
$bc = basename(__FILE__);
echo "SITE: ".$_SERVER['SERVER_NAME']."<br>";
echo "FILE: ".$bc."<br>";
echo "params argument: <br><br>";
echo "
/$bc?home [mainpage]<br>
/$bc?page={1..99) [otherpages]";