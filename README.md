# TV-Pi
A Pure-Linux based TV live client solution for Linux development boards. (such as OrangePi, RaspberryPi etc.)

# Requirements
* Linux Based Board or Box
* **MPlayer2** Used for playing/decovding TV livestream
* **Web Server** You can use NGINX or Apache with PHP support

# Attentions
Please make sure PHP and Web server run as Root user, or the Web server user have sudo permissions. If you think it be insecure, you can try to give web server user apart of permissions by using ```visudo```.

**ATTENTION** The superuser permission for **MPlayer** is required! because it should write data to **FrameBuffer**. If you don't giving superuser permission for ```cat``` command, just no prompt on screen when you start play a livestream or playing cause some errors.

# Quick Start
1. Install required packages in Linux system.
```bash
sudo apt-get update
sudo apt-get install -y mplayer
sudo apt-get install -y nginx php5-fpm   #NGINX web server
```
1. Make your web server working and change user permissions.
1. Clone files into web server root directory.
```bash
cd /var/www
git clone https://github.com/dfc643/TV-Pi tv
```
1. Bind DNS name ```my.tv``` to your Linux board.
1. Enjoy it.

# License
* BILIBILI API: https://github.com/konatatenshi/bilibilihtml5player Apache-2.0
* TV-Pi: https://github.com/dfc643/TV-Pi GPLv3