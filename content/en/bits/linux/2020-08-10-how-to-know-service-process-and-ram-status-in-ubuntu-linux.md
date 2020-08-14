---
title: "How to Know Service Process and Ram Status in Ubuntu Linux"
date: 2020-08-10T01:13:33+06:00
description:
draft: false
author: shibu
hideToc: false
enableToc: true
enableTocContent: false
enableSeries: true
enableSeriesContent: false
series:
- test
tocPosition: inner
tocLevels: ["h2", "h3", "h4"]
bit_tags:
- linux
- ubuntu
- terminal-command
bit_series:
bit_categories:
- linux
image:
---


## to know about ram 

To display the total amount of ram in ubuntu   
~~~bash
free
~~~

default size show in kilobyte unit

To display the total amount of ram in ubuntu in megabyte `mb` unit
~~~bash
free -m
~~~

To display the total amount of ram in ubuntu in human friendly unit
~~~bash
free -h
~~~

To display RAM type and speed, use the command:

~~~bash
sudo lshw -c memory
~~~


## to know about services

To know about background processed services    

~~~bash
service --status-all 
~~~

To stop a running service, enter the command:      

~~~bash
sudo service <name> stop
~~~




