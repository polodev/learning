---
title: "How to Add Progress Bar in Basic Form Submission to Get Rid of Form Resubmission"
date: 2020-09-05T02:52:26+06:00
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
- javascript 
bit_tags:
- html
- javascript
bit_categories:
- javascript 
image:
---

Few days ago, I created a form for submitting user information.
It required to upload lot of images. which actually takes time.    
Since, it wasn't a ajax form, I was unable to  add any indication that "form is submitting"

Follwing method progess element adding solve 2 problems

*  Help to rid of form Resubmission     
* Giving indication to user about form submission

So, after tinkering little time, I found a solution. which is below    

## html part 
just giving a id to the form 
~~~html
<form
  action="action.php"
  method="post"
  id="contact-form-with-attachment"
  enctype="multipart/form-data" >
  <!-- formcontent -->
</form>
~~~

## js part    

Make a function which will add a progress bar after the form upon calling 

~~~js
function addProgressInPostForm (FormSelector) {
  $(FormSelector).each(function (index, element) {
     var progress = $("<div><progress></progress></div>");
     progress.css({
      "text-align": "center",
      "margin-top": "10px",
     });
     var submitting = false;
    $(element).on('submit', function(ev) {
        if (submitting) {
            ev.preventDefault();
        } else {
          submitting = true;
          $(element).append(progress);
        }
    })
  });
}
~~~

I have added basic css for make it text-align center
Calling `addProgressInPostForm` function and passing form id
~~~js
addProgressInPostForm('#contact-form-with-attachment')
~~~

If you want to select all forms which has post submission method 

~~~php
addProgressInPostForm('form[method="post"]')
~~~



