<?php
$_mplayer_opts = '-x 720 -y 576 -framedrop -cache 131072 -cache-min 5 -vo directfb:noinput -dr -lavdopts threads=4';
$_fbdev = '/dev/fb0';


$url = urldecode($_GET['url']);
$mode = $_GET['mode'];

function runcmd($cmd) {

    return shell_exec("$cmd > /dev/null 2>/dev/null &");

}

if ($url != '') {

    runcmd("killall mplayer; sleep 0.3; sudo cat screens/loading.fb > $_fbdev; sudo mplayer \"$url\" $_mplayer_opts");
    die('ok');

}

if (isset($mode)) {

    switch ($mode) {

        case 'stop': 
            runcmd("killall mplayer");
            break;
        
        case 'check':
            $cret = shell_exec('ps -ef|grep -c mplayer');
            if ($cret <= 2) {
                shell_exec("sudo cat screens/nosignal.fb > $_fbdev");
                die('0');
            } else
                die('1');
            break;

    }

}

?>
