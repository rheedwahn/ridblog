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
            
            <div class="row">
                <div class="case-item-wrap">
                @if($posts->count() === 0)
                    <h1 class="text-center">No result for this keyword</h1>
                @else
                    @foreach($posts as $post)
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="case-item">
                                <div class="case-item__thumb">
                                    <img src="{{ $post->featured }}" alt="our case">
                                </div>
                                <h6 class="case-item__title"><a href="{{ route('single.post', ['slug' => $post->slug]) }}">{{ str_limit($post->title, $limit = 40, $end = '...') }}</a></h6>
                            </div>
                        </div>
                    @endforeach
                @endif
                </div>
            </div>

            <!-- End Post Details -->
            <br>
            <br>
            <br>
            <!-- Sidebar-->

            <!-- End Sidebar-->

        </main>
    </div>
</div>
@stop