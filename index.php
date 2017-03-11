<?php
$chFile = fopen("channel.txt", "r"); 
$chList=array(); 
$i=0; 

while(!feof($chFile)){ 
    $chList[$i]= fgets($chFile);
    $i++; 
} 
fclose($chFile);
?>

<!doctype html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8" />
    <title>RetiaTV</title>
    <link rel="shortcut icon" href="favicon.ico" />
    <link rel="icon" href="favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon-precomposed" href="apple-touch-icon-57x57.png">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    
    <link href="statics/style.css" type="text/css" rel="stylesheet"/>
    <script type="text/javascript" src="statics/jquery.js"></script>
    <script type="text/javascript" src="statics/mplayer.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        setInterval("mplayer('check')", 1000);
    });
    </script>
</head>
<body>
    <div class="livestream">
        <input id="liveid" type="text" placeholder="B站AV号(:P号) / 战旗房间号"/>
        <div class="btn-go" onclick="mplayer('bili')">哔哩</div>
        <div class="btn-go" onclick="mplayer('zhanqi')">战旗</div>
    </div>
    <div class="mpSta">Retia TV</div>
    <div class="chMain">
        <div class="channel" onclick="mplayer('stop')" style="color:red">停止播放</div>
        <?php foreach ( $chList as $ch ) { $ch = explode(",", $ch); ?>
            <div class="channel" onclick="mplayer('play', '<?php echo trim($ch[1]); ?>')"><?php echo $ch[0]; ?></div>
        <?php } ?>
    </div>
</body>
</html>
