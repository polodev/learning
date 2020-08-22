---
title: "How to Disable Submit Button Once It Has Been Clicked"
date: 2020-08-23T04:51:54+06:00
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
- html
bit_tags:
bit_categories:
- html
image:
---

Whenever form submitted with media, It will take time to process. Since it require time to upload then process the form.
In this case, If user click this button again, form submit again. Eventually we are having duplicate, sometimes 3/4 form submission happen simultaneously. 
Which is not expected. 

To get rid such circumstance, we will disable submit button, once user click this button. We can achieve such behavior, using `onclick` attribute.

~~~html
onclick="this.form.submit(); this.disabled=true; this.value='Sending, please wait...';"
~~~

some people, prefer put `this.form.submit();` statement at the end of the attribute value. Which raise issues sometimes. Anyway I preferred to keep it in the beginning. 

here is my full submit button code

~~~html
<button type="submit" onclick="this.form.submit();this.disabled=true;this.value='Sending, please wait...';" class="btn btn-info">Enroll Now</button>
~~~
