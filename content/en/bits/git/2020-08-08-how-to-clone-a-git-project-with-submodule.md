---
title: "How to Clone a Git Project With Submodule"
date: 2020-08-08T20:44:11+06:00
keyword: "git submodule clone"
description:
draft: false
author: shibu
hideToc: false
enableToc: true
enableTocContent: true
enableSeries: true
enableSeriesContent: false
tocPosition: inner
tocLevels: ["h2", "h3", "h4"]
tags:
series:
categories:
bit_tags: 
- git
- submodule
bit_categories:
- git
image:
---

## Git clone and update submodule later

clone the repository    

~~~bash
git clone <git repository>
~~~

You have to do two things to update submodule


~~~bash
git submodule init 
git submodule update
~~~

## Git cloning including submodules

In git 2.13 version and later, --recurse-submodules can be used instead of --recursive:

~~~bash
git clone --recurse-submodules -j8 git://github.com/username/repository.git
~~~

heres, `-j8` is an optional performance optimization that became available in version 2.8, and fetches up to 8 submodules at a time in parallel. for more details `man git-clone`

With version 1.9 of Git up until version 2.12 (-j flag only available in version 2.8+):

~~~bash
git clone --recursive -j8 git://github.com/username/repository.git
~~~

With version 1.6.5 of Git and later, you can use:

~~~bash
git clone --recursive git://github.com/username/repository.git
~~~











