 <?php
// 获取B站API
if (strpos($_GET['av'], ":") > -1)
{
    $av = explode(":", $_GET['av']);
    $page = $av[1];
    $av = $av[0];
}
else
{
    $av = isset($_GET['av']) ? $_GET['av'] : '';
    $page = isset($_GET['p']) ? $_GET['p'] : '1';
}

$handle = file_get_contents("http://www.bilibilijj.com/Api/AvToCid/".$av."");
$content = json_decode($handle, true);
$fanju = $content["list"];

if ($content["msg"] !== "OK"){echo "错误的AV号！";exit;};
 //print_r($fanju); die();
$key = array_search($page, array_column($fanju, 'P'));

header('HTTP/1.1 302 Moved Permanently');//发出301头部 
header('Location: http://my.tv/mplayer.php?url='.$fanju[$key]["Mp4Url"]);
?>
