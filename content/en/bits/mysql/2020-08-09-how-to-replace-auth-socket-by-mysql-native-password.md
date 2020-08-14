---
title: "How to Replace Auth Socket by Mysql Native Password"
date: 2020-08-09T11:43:43+06:00
description:
keyword: "mysql auth socket, mysql native password"
draft: false
author: shibu
hideToc: false
enableToc: true
enableTocContent: false
enableSeries: true
enableSeriesContent: false
tocPosition: inner
tocLevels: ["h2", "h3", "h4"]
bit_tags:
- mysql
bit_series:
bit_categories:
- mysql
image:
---

Initially, default mysql settings, comes with "auth_socket" plugin for root user.

In my case I was unable to login to phpmyadmin from web browser using root user 


### Login to mysql 

To see which plugin used for specific user we need to login to our mysql from command line

~~~bash
sudo mysql -uroot
~~~

### Plugin used for `user` in mysql
Once we login to mysql, we can view current used plugin for user, using following code

~~~bash
use mysql;
SELECT user,plugin,host FROM mysql.user;
~~~

### Alter user for replacing `auth_socket` plugin by `mysql_native_password` 

we can change user plugin using following code       

~~~bash
ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY '';
~~~

here I kept password empty string 


thanks









