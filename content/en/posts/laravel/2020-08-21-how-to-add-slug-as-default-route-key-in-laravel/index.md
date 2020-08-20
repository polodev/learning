---
title: "How to Add Slug as Default Route Key in Laravel"
date: 2020-08-21T01:31:47+06:00
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
- laravel
- slug
series:
series_weight: 0
categories:
- laravel
image:
---

Earlier one of  my laravel project used `id`  as route key name. I have found, `slug` is more readable/memorable.
So instead of using `id` I started to use `slug` as route key name.        

### laravel-sluggable       

While create a post, we can generate a slug by our own. To do this we can use `Str::slug` method and append some unique value to make it unique. 
But using laravel-sluggable, we can generate slug automatically

First we will install laravel-sluggable using composer      
  
~~~bash
composer require spatie/laravel-sluggable
~~~

Let, Our model name is `Post` and `Posts` table has `title` and `slug` column. In this case, we need to
`HasSlug` trait and define `getSlugOptions`. 

~~~php
<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Post extends Model
{
    protected $guarded = [];
    use HasSlug;
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }
}

~~~

Inside `getSlugOptions` method definition, we are generating slug. It will generate  `slug` from `title` column.
 we must import `HasSlug` and `SlugOptions` at top of the file.     

### `getRouteKey` & `getRouteKeyName`

To make  `slug` as route key name we need add `getRouteKey` and `getRouteKeyName` definitions in our `Post` model

~~~php
<?php
class Post extends Model
{
	public function getRouteKey()
	{
	    return $this->slug;
	}
	public function getRouteKeyName()
	{
	    return 'slug';
	}
}
~~~

### Calling route 

We are passing a `$post` object directly as name route parameter, when using route method for url generation. Its automatically add slug as route key name     

~~~blade
<a href="{{ route('post.show', $post) }}">
	{{ $post->title }}
</a>
~~~

`route('post.show', $post)` output will be like following `http://domain.test/post/demo-post-slug`. Here `getRouteKeyName` play the role to change to `slug` instead `id`


### Full Model code

~~~php
<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;

class Post extends Model
{
    protected $guarded = [];
    use HasSlug;
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }
    public function getRouteKey()
	{
	    return $this->slug;
	}
	public function getRouteKeyName()
	{
	    return 'slug';
	}
}
~~~












