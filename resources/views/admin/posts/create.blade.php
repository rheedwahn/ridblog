@extends('layouts.app')

@section('content')

	<!-- displaying errors -->
@include('admin.partials.error')

	<div class="panel panel-default">
		<div class="panel-heading">
			<p>Create a New Post</p>
		</div>
		<div class="panel-body">
			<form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="title">Title</label>
					<input type="text" name="title" placeholder="Title of the post" class="form-control"></input>
				</div>
				<div class="form-group">
					<label for="title">Select a Category:</label>
					<select class="form-control" name="category_id">
						<option value="">Select a Catergory</option>
						@foreach($categories as $category)
							<option value="{{ $category->id }}">{{ $category->name }}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label for="tags">Pick the Tags:</label>
					@foreach($tag as $tags)
						<div class="checkbox">
						  <label><input type="checkbox" name="tag[]" value="{{ $tags->id }}">{{ $tags->tag }}</label>
						</div>
					@endforeach
				</div>
				<div class="form-group">
					<label for="featured">Feature Image</label>
					<input type="file" name="featured" class="form-control"></input>
				</div>
				<div class="form-group">
					<label for="content">Content</label>
					<textarea class="form-control" name="content" cols="5" rows="5" id="content"></textarea>
				</div>
				<div class="form-group">
					<button class="btn btn-success">Submit</button>
				</div>
			</form>
		</div>
	</div>

@stop

@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('summernote/summernote.css') }}">
@stop

@section('script')
<script type="text/javascript" src="{{ asset('summernote/summernote.js') }}"></script>

	<script>
		$(document).ready(function() {
		  $('#content').summernote();
		});
	</script>
@stop