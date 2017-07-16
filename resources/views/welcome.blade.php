@extends('layouts.frontend')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <article class="hentry post post-standard has-post-thumbnail sticky">

                        <div class="post-thumb">
                            <img src="{{ $first_post->featured }}" alt="seo">
                            <div class="overlay"></div>
                            <a href="{{ $first_post->featured }}" class="link-image js-zoom-image">
                                <i class="seoicon-zoom"></i>
                            </a>
                            <a href="#" class="link-post">
                                <i class="seoicon-link-bold"></i>
                            </a>
                        </div>

                        <div class="post__content">

                            <div class="post__content-info">

                                    <h2 class="post__title entry-title text-center">
                                        <a href="{{ route('single.post', ['slug' => $first_post->slug]) }}">{{ $first_post->title }}</a> 
                                    </h2>

                                    <div class="post-additional-info">

                                        <span class="post__date">

                                            <i class="seoicon-clock"></i>

                                            <time class="published" datetime="2016-04-17 12:00:00">
                                                {{ $first_post->created_at->diffForHumans() }}
                                            </time>

                                        </span>

                                        <span class="category">
                                            <i class="seoicon-tags"></i>
                                            <a href="{{ route('category.single', ['slug' => $first_post->category->slug]) }}">{{ $first_post->category->name }}</a>
                                        </span>

                                        

                                    </div>
                            </div>
                        </div>

                </article>
            </div>
            <div class="col-lg-2"></div>
        </div>

        <div class="row">
        @foreach($second_post as $post_second)
            <div class="col-lg-6">
                <article class="hentry post post-standard has-post-thumbnail sticky">

                        <div class="post-thumb">
                            <img src="{{ $post_second->featured }}" alt="{{ $post_second->title }}">
                            <div class="overlay"></div>
                            <a href="{{ $post_second->featured }}" class="link-image js-zoom-image">
                                <i class="seoicon-zoom"></i>
                            </a>
                            <a href="#" class="link-post">
                                <i class="seoicon-link-bold"></i>
                            </a>
                        </div>

                        <div class="post__content">

                            <div class="post__content-info">

                                    <h2 class="post__title entry-title text-center">
                                        <a href="{{ route('single.post', ['slug' => $post_second->slug]) }}">{{ str_limit($post_second->title, $limit = 60, $end = '...') }}</a>
                                    </h2>

                                    <div class="post-additional-info">

                                        <span class="post__date">

                                            <i class="seoicon-clock"></i>

                                            <time class="published" datetime="2016-04-17 12:00:00">
                                                {{ $post_second->created_at->toFormattedDateString() }}
                                            </time>

                                        </span>

                                        <span class="category">
                                            <i class="seoicon-tags"></i>
                                            <a href="{{ route('category.single', ['slug' => $post_second->category->slug]) }}">{{ $post_second->category->name }}</a>
                                        </span>

                                    </div>
                            </div>
                        </div>

                </article>
            </div>
        @endforeach
        </div>
    </div>


    <div class="container-fluid">
        <div class="row medium-padding120 bg-border-color">
            <div class="container">
                <div class="col-lg-12">
                <div class="offers">
                    <div class="row">
                        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                            <div class="heading">
                                <h4 class="h1 heading-title">{{ $first_category->name }}</h4>
                                <div class="heading-line">
                                    <span class="short-line"></span>
                                    <span class="long-line"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="case-item-wrap">
                        @foreach($first_category->posts()->orderBy('created_at', 'desc')->take(3)->get() as $first_category_post)
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="case-item">
                                    <div class="case-item__thumb">
                                        <img src="{{ $first_category_post->featured }}" alt="our case">
                                    </div>
                                    <h6 class="case-item__title"><a href="{{ route('single.post', ['slug' => $first_category_post->slug]) }}">{{ str_limit($first_category_post->title, $limit = 60, $end = '...') }}</a></h6>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>
                <div class="padded-50"></div>
                <div class="offers">
                    <div class="row">
                        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                            <div class="heading">
                                <h4 class="h1 heading-title">{{ $second_category->name }}</h4>
                                <div class="heading-line">
                                    <span class="short-line"></span>
                                    <span class="long-line"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="case-item-wrap">
                        @foreach($second_category->posts()->orderBy('created_at', 'desc')->take(3)->get() as $second_category_post)
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="case-item">
                                    <div class="case-item__thumb">
                                        <img src="{{ $second_category_post->featured }}" alt="our case">
                                    </div>
                                    <h6 class="case-item__title"><a href="{{ route('single.post', ['slug' => $second_category_post->slug]) }}">{{ str_limit($second_category_post->title, $limit = 60, $end = '...') }}</a></h6>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>
                <div class="padded-50"></div>
                <div class="offers">
                    <div class="row">
                        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                            <div class="heading">
                                <h4 class="h1 heading-title">{{ $third_category->name }}</h4>
                                <div class="heading-line">
                                    <span class="short-line"></span>
                                    <span class="long-line"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="case-item-wrap">
                        @foreach($third_category->posts()->orderBy('created_at', 'desc')->take(3)->get() as $third_category_post)
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="case-item">
                                    <div class="case-item__thumb">
                                        <img src="{{ $third_category_post->featured }}" alt="our case">
                                    </div>
                                    <h6 class="case-item__title"><a href="{{ route('single.post', ['slug' => $third_category_post->slug]) }}">{{ str_limit($third_category_post->title, $limit = 60, $end = '...') }}</a></h6>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>
                <div class="padded-50"></div>
            </div>
            </div>
        </div>
    </div>
                                
@stop

@section('header_spacer')
    <div class="header-spacer"></div>
@stop