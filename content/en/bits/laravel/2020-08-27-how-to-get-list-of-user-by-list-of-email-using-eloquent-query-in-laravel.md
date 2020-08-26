---
title: "How to Get List of User by List of Email Using Eloquent Query in Laravel"
date: 2020-08-27T03:24:56+06:00
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
bit_tags:
bit_categories:
image:
---
user Laravel eloquent, we can select all users from arrays of emails.

I made a cart application. Where I required to get list of users from list of emails(order emails).    

Using `whereIn` eloquent method we can easily fetch array of users from database.    

~~~php
User::whereIn('email', ['polodev10@gmail.com', 'company@gmail.com', 'milky@gmail.com'])
->get();
~~~


In my case, I required to fetch, array of user ids. Using `pluck` method I was able to do that
~~~php
User::whereIn('email', ['polodev10@gmail.com', 'company@gmail.com', 'milky@gmail.com'])
->pluck('id')->all();
~~~
