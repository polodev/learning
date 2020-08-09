---
title: "How to Store Git Credential in Ubuntu Linux Using Libsecret"
date: 2020-08-08T20:45:41+06:00
keyword: "storing git credential"
description:
draft: false
author: shibu
hideToc: false
enableToc: true
enableTocContent: false
tocPosition: inner
tocLevels: ["h2", "h3", "h4"]
bit_tags:
- git
bit_series:
bit_categories:
-
image:
---

## Git credential storing using Libsecret

Installing libsecret

~~~bash
sudo apt install libsecret-1-0 libsecret-1-dev
~~~

Run `make` command for recompile 

~~~bash
cd /usr/share/doc/git/contrib/credential/libsecret
sudo make
~~~

Update git `credential.helper`

~~~bash
git config --global credential.helper /usr/share/doc/git/contrib/credential/libsecret/git-credential-libsecret
~~~


## Alternative - git cache credential helper

If you don't want to install anything you can use git credential helper. 

Git Cache is quite secure and it  keeps data only in memory.   

It’s fine for security, but every time you open new session, you need to type credentials again. Memory is purged after 15 minutes (900 seconds ) by default, but it can be changed with optional `timeout` parameter.

~~~bash
git config --global credential.helper 'cache --timeout=300'
~~~





