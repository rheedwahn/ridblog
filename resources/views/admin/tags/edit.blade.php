@extends('layouts.app')

@section('content')

	<!-- displaying errors -->
@include('admin.partials.error')

	<div class="panel panel-default">
		<div class="panel-heading">
			<p>Update Tag: {{ $tag->tag }}</p>
		</div>
		<div class="panel-body">
			<form action="{{ route('tag.update', ['id'=>$tag->id]) }}" method="post" >
				{{ csrf_field() }}
				<div class="form-group">
					<label for="name">Tag Name</label>
					<input type="text" name="tag" placeholder="Name of the Category" value="{{ $tag->tag }}" class="form-control"></input>
				</div>
				
				<div class="form-group">
					<button class="btn btn-success">Update Tag</button>
				</div>
			</form>
		</div>
	</div>

@stop