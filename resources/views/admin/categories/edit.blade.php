@extends('layouts.app')

@section('content')

	<!-- displaying errors -->
@include('admin.partials.error')

	<div class="panel panel-default">
		<div class="panel-heading">
			<p>Update Category: {{ $category->name }}</p>
		</div>
		<div class="panel-body">
			<form action="{{ route('category.update', ['id'=>$category->id]) }}" method="post" >
				{{ csrf_field() }}
				<div class="form-group">
					<label for="name">Category Name</label>
					<input type="text" name="name" placeholder="Name of the Category" value="{{ $category->name }}" class="form-control"></input>
				</div>
				
				<div class="form-group">
					<button class="btn btn-success">Update Category</button>
				</div>
			</form>
		</div>
	</div>

@stop