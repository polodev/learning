---
title: "How to Convert Digit to Words in Php Laravel Using Php Built in NumberFormatter Class"
date: 2020-08-29T03:27:07+06:00
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
series:
series_weight: 0
categories:
- php
bit_tags:
- php
bit_categories:
- php
image:
---

## `NumberFormatter` 

We can convert number to string using php built in class `NumberFormatter` .
~~~php 
<?php
$digit = new NumberFormatter("en", NumberFormatter::SPELLOUT);
echo $digit->format(264);
// output will be "two thousand"
~~~

## Troubleshooting:

You need to enable `php_intl` extension, when using `NumberFormatter`  class.       
You can enable this from `php.ini` setting file. 

In my case, I am using ubuntu server. I required to install `php7.3-intl`  extension using `apt` 
~~~bash
sudo apt install php7.3-intl
~~~

I am using `php7.3` version. Hence, I have install `php7.3-intl`.          
Let you are using `php7.4`, in this case your extension will be `php7.4-intl`       

Once you've install extension, you need to enable extension from your `php.ini` setting file     

~~~
extension=intl
~~~

I am using apache server. So my php.ini file location was 
~~~bash
/etc/php/7.3/apache2/php.ini
~~~

Once, you have changed in php.ini file, You need to restart your apache2 server

~~~bash
sudo service apache2 restart
~~~












In my case, I am using ubuntu server. I required to install `sudo apt install php7.2-intl` 









