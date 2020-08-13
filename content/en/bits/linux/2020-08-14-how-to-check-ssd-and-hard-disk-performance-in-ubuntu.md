---
title: "How to Check SSD and Hard disk Performance in Ubuntu Linux"
date: 2020-08-14T03:59:23+06:00
description:
draft: false
author: shibu
hideToc: false
enableToc: true
enableTocContent: false
tocPosition: inner
tocLevels: ["h2", "h3", "h4"]
bit_tags:
- ssd
- linux
bit_series:
bit_categories:
- linux
image:
---


## `hdparam` command in teminal

using `hdparm` command we can check ssd or har disk perfomance 

~~~bash
sudo hdparm -Tt /dev/sda
~~~

following output I am getting in terminal
~~~
dev/sda:
 Timing cached reads:   13614 MB in  1.99 seconds = 6837.31 MB/sec
 Timing buffered disk reads: 874 MB in  3.02 seconds = 289.78 MB/sec
~~~

## `dd` command for write speed

To know about write speed we can run a loop to copy and delete file 

~~~bash
dd if=/dev/zero of=/tmp/output bs=10k count=15k; rm -f /tmp/output
~~~

following output I am getting in terminal
~~~
15360+0 records in
15360+0 records out
157286400 bytes (157 MB, 150 MiB) copied, 0.144222 s, 1.1 GB/s
~~~
