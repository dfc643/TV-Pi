 <?php
$room = isset($_GET['room']) ? $_GET['room'] : '';

$handle = file_get_contents("http://www.zhanqi.tv/$room");
preg_match_all("/\"videoId\":\"(.*)\",\"chatStatus\"/", $handle, $matched);
// print_r($matched); die();
$vid = $matched[1][0];
$liveurl = "http://wshdl.load.cdn.zhanqi.tv/zqlive/$vid.flv";

header('HTTP/1.1 302 Moved Permanently');//发出301头部 
header("Location: http://my.tv/mplayer.php?url=$liveurl");
?>