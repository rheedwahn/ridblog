@extends('layouts.app')

@section('content')

	<!-- displaying errors -->
@include('admin.partials.error')

	<div class="panel panel-default">
		<div class="panel-heading">
			<p>All Categories</p>
		</div>
		<div class="panel-body">
			<table class="table table-hover">
				<thead>
					<th>
						Category Name
					</th>
					@if(Auth::user()->admin === 1)
						<th>
							Edit
						</th>

						<th>
							Delete
						</th>
					@endif
				</thead>
				<tbody>
					@foreach($categories as $category)
						<tr>
							<td>
								{{ $category->name }}
							</td>
							@if(Auth::user()->admin === 1)
								<td>
									<a href="{{ route('category.edit', ['id'=>$category->id]) }}" class="btn btn-primary">Edit</a>
								</td>
								<td>
									<a href="{{ route('category.delete', ['id'=>$category->id]) }}" class="btn btn-danger">Delete</a>
								</td>
							@endif
						</tr>

					@endforeach
				</tbody>
			</table>
		</div>
	</div>

@stop