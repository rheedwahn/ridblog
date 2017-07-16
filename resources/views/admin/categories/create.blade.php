@extends('layouts.app')

@section('content')

	<!-- displaying errors -->
@include('admin.partials.error')

	<div class="panel panel-default">
		<div class="panel-heading">
			<p>Create a Category</p>
		</div>
		<div class="panel-body">
			<form action="{{ route('category.store') }}" method="post" >
				{{ csrf_field() }}
				<div class="form-group">
					<label for="name">Category Name</label>
					<input type="text" name="name" placeholder="Name of the Category" class="form-control"></input>
				</div>
				
				<div class="form-group">
					<button class="btn btn-success">Save Category</button>
				</div>
			</form>
		</div>
	</div>

@stop