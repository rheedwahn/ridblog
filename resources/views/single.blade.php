@extends('layouts.frontend')

@section('content')
<div class="stunning-header stunning-header-bg-lightviolet">
    <div class="stunning-header-content">
        <h1 class="stunning-header-title">{{ $title }}</h1>
    </div>
</div>
<div class="container">
    <div class="row medium-padding120">
        <main class="main">
            <div class="col-lg-10 col-lg-offset-1">
                <article class="hentry post post-standard-details">

                    <div class="post-thumb">
                        <img src="{{ $posts->featured }}" alt="seo">
                    </div>

                    <div class="post__content">


                        <div class="post-additional-info">

                            <div class="post__author author vcard">
                                Posted by

                                <div class="post__author-name fn">
                                    <a href="#" class="post__author-link">{{ $posts->user->name }}</a>
                                </div>

                            </div>

                            <span class="post__date">

                                <i class="seoicon-clock"></i>

                                <time class="published" datetime="2016-03-20 12:00:00">
                                    {{ $posts->created_at->toFormattedDateString() }}
                                </time>

                            </span>

                            <span class="category">
                                <i class="seoicon-tags"></i>
	                                <a href="{{ route('category.single', ['slug' => $posts->category->slug]) }}">{{ $posts->category->name }}</a>
                            </span>

                        </div>

                        <div class="post__content-info">

                            {!! $posts->content !!}

                            <div class="widget w-tags">
                                <div class="tags-wrap">
                                	@foreach($posts->tags as $tag)
                                    <a href="#" class="w-tags-item">{{ $tag->tag }}</a>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="socials">
                        <div class="addthis_inline_share_toolbox text-center"></div>
                    </div>

                </article>

                <div class="blog-details-author">

                    <div class="blog-details-author-thumb">
                        <img src="{{ asset($posts->user->profile->avater) }}" width="100px" height="100px" class="img-rounded" alt="{{ $posts->user->name }}">
                    </div>

                    <div class="blog-details-author-content">
                        <div class="author-info">
                            <h5 class="author-name">{{ $posts->user->name }}</h5>
                            <p class="author-info">SEO Specialist</p>
                        </div>
                        <p class="text">{{ $posts->user->profile->about }}
                        </p>
                        <div class="socials">

                            <a href="{{ $posts->user->profile->facebook }}" class="social__item">
                                <img src="{{ asset('app/svg/circle-facebook.svg') }}" alt="facebook">
                            </a>

                            <a href="{{ $posts->user->profile->youtube }}" class="social__item">
                                <img src="{{ asset('app/svg/youtube.svg') }}" alt="youtube">
                            </a>

                        </div>
                    </div>
                </div>

                <div class="pagination-arrow">

                    @if($next)

	                    <a href="{{ route('single.post', ['slug' => $next->slug]) }}" class="btn-next-wrap">
	                        <div class="btn-content">
	                            <div class="btn-content-title">Next Post</div>
	                            <p class="btn-content-subtitle">{{ str_limit($next->title, $limit = 40, $end = '...') }}</p>
	                        </div>
	                        <svg class="btn-next">
	                            <use xlink:href="#arrow-right"></use>
	                        </svg>
	                    </a>

                    @endif

                    @if($previous)

                    	<a href="{{ route('single.post', ['slug' => $previous->slug]) }}" class="btn-prev-wrap">
                        <svg class="btn-prev">
                            <use xlink:href="#arrow-left"></use>
                        </svg>
                        <div class="btn-content">
                            <div class="btn-content-title">Previous Post</div>
                            <p class="btn-content-subtitle">{{ str_limit($previous->title, $limit = 40, $end = '...') }}</p>
                        </div>
                    	</a>

                    @endif

                </div>

                <div class="comments">

                    <div class="heading text-center">
                        <h4 class="h1 heading-title">Comments</h4>
                        <div class="heading-line">
                            <span class="short-line"></span>
                            <span class="long-line"></span>
                        </div>
                    </div>

                    @include('includes.disqus')
                </div>

                <div class="row">

                </div>


            </div>

            <!-- End Post Details -->

            <!-- Sidebar-->
            <p></br></p>
            <div class="col-lg-12">
                <aside aria-label="sidebar" class="sidebar sidebar-right">
                    <div  class="widget w-tags">
                        <div class="heading text-center">
                        <p></br></p>
                        <p></br></p>
                            <h4 class="heading-title">ALL BLOG TAGS</h4>
                            <div class="heading-line">
                                <span class="short-line"></span>
                                <span class="long-line"></span>
                            </div>
                        </div>

                        <div class="tags-wrap">
                        	@foreach($tag_all as $tags_all)
                            <a href="{{ route('tag.single', ['slug' => $tags_all->slug]) }}" class="w-tags-item">{{ $tags_all->tag }}</a>
                            @endforeach
                        </div>
                    </div>
                </aside>
            </div>

            <!-- End Sidebar-->

        </main>
    </div>
</div>
@stop