---
title: "How to Add Block Cursor in Vim Specially in Gitbash / Cygwin Vim Editor"
date: 2020-08-29T03:45:45+06:00
description:
draft: false
author: shibu
hideToc: false
enableToc: false
enableTocContent: false
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

## .vimrc
In windows gitbash vim / Cygwin vim / linux subsystem terminal, switching between line cursor and block cursor not happened automatically.     

I feel uncomfortable when writing inside vim. since, I can't distinguish between `command` mode and `normal` mode.   

To get a block cursor in Vim in the Cygwin terminal write following code in `.vimrc` file     

~~~bash
let &t_ti.="\e[1 q"
let &t_SI.="\e[5 q"
let &t_EI.="\e[1 q"
let &t_te.="\e[0 q"
~~~



