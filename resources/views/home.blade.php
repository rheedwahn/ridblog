@extends('layouts.app')

@section('content')

<div class="row">

	<div class="col-lg-4">
		<div class="panel panel-info">
			<div class="panel-heading text-center">
				PUBLISHED POSTS
			</div>
			<div class="panel-body text-center">
				<h1>{{ $post_count }}</h1>
			</div>
		</div>
	</div>
	

	<div class="col-lg-4">
		<div class="panel panel-danger">
			<div class="panel-heading text-center">
				THRASHED POSTS
			</div>
			<div class="panel-body text-center">
				<h1>{{ $trashed_count }}</h1>
			</div>
		</div>
	</div>

	<div class="col-lg-4">
		<div class="panel panel-info">
			<div class="panel-heading text-center">
				TOTAL NUMBER OF CATEGORIES
			</div>
			<div class="panel-body text-center">
				<h1>{{ $category_count }}</h1>
			</div>
		</div>
	</div>

	<div class="col-lg-4">
		<div class="panel panel-info">
			<div class="panel-heading text-center">
				TOTAL NUMBER OF TAGS
			</div>
			<div class="panel-body text-center">
				<h1>{{ $tag_count }}</h1>
			</div>
		</div>
	</div>
@if(Auth::user()->admin === TRUE)
	<div class="col-lg-4">
		<div class="panel panel-success">
			<div class="panel-heading text-center">
				TOTAL NUMBER OF PUBLISHERS
			</div>
			<div class="panel-body text-center">
				<h1>{{ $user_count }}</h1>
			</div>
		</div>
	</div>

	<div class="col-lg-4">
		<div class="panel panel-success">
			<div class="panel-heading text-center">
				TOTAL NUMBER OF ADMINS
			</div>
			<div class="panel-body text-center">
				<h1>{{ $admin_count }}</h1>
			</div>
		</div>
	</div>

@endif

</div>

@endsection
