function mplayer(mode, url) {
    var param; 
    switch (mode) {
        case 'play': 
            $.get('mplayer.php?url=' + url); 
            break;
        case 'stop':
            $.get('mplayer.php?mode=stop');
            break;
        case 'check':
            $.get("mplayer.php?mode=check",function(data){
                if(data == 1)
                    $('.mpSta').html('<font color="green">播放器正在加载/播放</font>');
                else
                    $('.mpSta').html('<font color="red">播放器已停止运行</font>');
            });
            break;
        case 'bili': 
            $.get('plugins/bilibili.php?av=' + $('#liveid').val()); 
            break;
        case 'zhanqi': 
            $.get('plugins/zhanqi.php?room=' + $('#liveid').val()); 
            break;
    }
}