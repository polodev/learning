---
title: "Software Installation and Config After Ubuntu Setup for Web Developer (laravel)"
date: 2020-08-16T11:57:24+06:00
description:
draft: false
author: shibu
hideToc: false
enableToc: true
enableTocContent: true
hideSeries: false
enableSeries: true
enableSeriesContent: true
tocPosition: inner
tocLevels: ["h2", "h3", "h4"]
tags:
- linux
- software-installation
series:
series_weight: 0
categories:
- linux
image:
---


## first command after ubuntu installation

~~~bash
sudo apt upgrade
sudo apt update
~~~

## Install essential software in single command

~~~bash
sudo apt install vim git zsh net-tools rlwrap tree ranger xclip exfat-utils exfat-fuse ruby ruby-dev chromium-browser curl
~~~


## set up vim git editor 
~~~bash
git config --global core.editor "vim"
~~~

## installing sublime 

Go to following [link](https://www.sublimetext.com/docs/3/linux_repositories.html) to install sublime text
~~~
https://www.sublimetext.com/docs/3/linux_repositories.html
~~~

## Install oh-my-zsh

We already download `zsh` shell before. Now we need a framework for zsh. 
Installing `oh-my-zsh` framework from [github link](https://github.com/ohmyzsh/ohmyzsh)     

~~~
https://github.com/ohmyzsh/ohmyzsh
~~~


## Change our default shell to zsh 

Its require restart / logout in ubuntu to take effect   

~~~bash
chsh -s $(which zsh)
~~~

## how to install power line font for using agnoster theme

first create a `.fonts` folder in home directory   

~~~bash      
 mkdir ~/.fonts
~~~   

Install powerline font    

~~~bash 
wget https://github.com/powerline/powerline/raw/develop/font/PowerlineSymbols.otf
wget https://github.com/powerline/powerline/raw/develop/font/10-powerline-symbols.conf
mv PowerlineSymbols.otf ~/.fonts/
mkdir -p ~/.config/fontconfig/conf.d 
~~~

Clean fonts cache     

~~~bash
fc-cache -vf ~/.fonts/
~~~

Move config file

~~~bash
mv 10-powerline-symbols.conf ~/.config/fontconfig/conf.d/
~~~

## How to install linux terminal theme (using terminal profile)     

For visual tweeking in terminal we can use lot of color scheme and terminal theme from following link     
[https://github.com/Mayccoll/Gogh]( https://github.com/Mayccoll/Gogh )


## Install php alongside essential extension for laravel

Add `ondrej/php` repo    
~~~bash
sudo add-apt-repository ppa:ondrej/php
~~~

update for repo
~~~bash
sudo apt update
~~~

Install php with all essential extension    
~~~bash
sudo apt install php7.4 php7.4-xml php7.4-gd php7.4-opcache php7.4-mbstring php7.4-zip php7.4-bcmath php7.4-mysql php7.4-curl php7.4-dom php7.4-sqlite3
~~~


## Remove apache due to auto install

In case of laravel valet, we might to remove apache 

~~~bash
sudo apt purge apache2 apache2-utils apache2-bin apache2.2-common
~~~

## Installing mysql and configure

Mysql server can be installed by following command
~~~bash
sudo apt install mysql-server
~~~

### Removing MySql completely
In case of removing or reinstalling ubuntu, stop the server and completely remove mysql using following command   

~~~bash
sudo apt remove --purge mysql*
sudo apt purge mysql*
sudo apt autoremove
sudo apt autoclean
sudo apt remove dbconfig-mysql
~~~
### Configuring MySql

#### Login to mysql 

To see which plugin used for specific user we need to login to our mysql from command line

~~~bash
sudo mysql -uroot
~~~

#### Plugin used for `user` in mysql
Once we login to mysql, we can view current used plugin for user, using following code

~~~bash
use mysql;
SELECT user,plugin,host FROM mysql.user;
~~~

#### Alter user for replacing `auth_socket` plugin by `mysql_native_password` 

we can change user plugin using following code       

~~~bash
ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY '';
~~~

here I kept password empty string 


## Installing Composer

Composer is the defacto package manager for php 

Download composer from [composer website](https://getcomposer.org/download/) using bash

That will download the `composer.phar` file

Move `composer.phar` file to `user/bin/composer`, So that we can use composer globally   

~~~bash
sudo mv composer.phar /usr/bin/composer
~~~

Adding composer bin folder to the path for composer global use (.zshrc / .bashrc)      

~~~bash
$HOME/.config/composer/vendor/bin/:
//or
export PATH=$HOME/.config/composer/vendor/bin/:$PATH
~~~

## Installing valet for linux

We can download valet in linux. 

First we need to installed required software for that 

~~~bash
sudo apt install network-manager libnss3-tools jq xsel
~~~

### Installing valet  and config

Add valet using composer
~~~bash
composer global require cpriego/valet-linux
~~~

Install valet by following command.    
             
~~~      
valet install
~~~

For parking a folder to valet 
             
~~~      
valet park
~~~

## Installing Node using nvm

To download node js using node js go to [https://github.com/creationix/nvm](https://github.com/creationix/nvm)     

~~~bash
wget -qO- https://raw.githubusercontent.com/nvm-sh/nvm/v0.35.3/install.sh | bash
~~~
Running either of the above commands downloads a script and runs it. The script clones the nvm repository to `~/.nvm`, and attempts to add the source lines from the snippet below to the correct profile file (`~/.bash_profile`, `~/.zshrc`, `~/.profile`, or `~/.bashrc`).

~~~bash
export NVM_DIR="$([ -z "${XDG_CONFIG_HOME-}" ] && printf %s "${HOME}/.nvm" || printf %s "${XDG_CONFIG_HOME}/nvm")"
[ -s "$NVM_DIR/nvm.sh" ] && \. "$NVM_DIR/nvm.sh" # This loads nvm

~~~

To list available remote versions of node (via nvm)
~~~bash
nvm ls-remote
~~~

To list available versions of node installed 

~~~bash
nvm ls 
# or
nvm list
~~~

To install a node version 

~~~bash
nvm install 14 
~~~

To use a node version

~~~
nvm use 8
~~~














