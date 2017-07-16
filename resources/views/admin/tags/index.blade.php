@extends('layouts.app')

@section('content')

	<!-- displaying errors -->
@include('admin.partials.error')

	<div class="panel panel-default">
		<div class="panel-heading">
			<p>All Tags</p>
		</div>
		<div class="panel-body">
			<table class="table table-hover">
				<thead>
					<th>
						Tags
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
					@foreach($tag as $tags)
						<tr>
							<td>
								{{ $tags->tag }}
							</td>
							@if(Auth::user()->admin === 1)
								<td>
									<a href="{{ route('tag.edit', ['id'=>$tags->id]) }}" class="btn btn-primary">Edit</a>
								</td>
								<td>
									<a href="{{ route('tag.delete', ['id'=>$tags->id]) }}" class="btn btn-danger">Delete</a>
								</td>
							@endif
						</tr>

					@endforeach
				</tbody>
			</table>
		</div>
	</div>

@stop