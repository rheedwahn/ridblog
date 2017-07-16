@extends('layouts.app')

@section('content')

	<!-- displaying errors -->
@include('admin.partials.error')

	<div class="panel panel-default">
		<div class="panel-heading">
			<p>All Posts</p>
		</div>
		<div class="panel-body">
			<table class="table table-hover">
				<thead>
					<th>
						Post Author
					</th>
					<th>
						Post Title
					</th>

					<th>
						Post Image
					</th>

					<th>
						Edit
					</th>

					<th>
						Trash
					</th>
				</thead>
				<tbody>

				@if(Auth::user()->admin === 1)

					@foreach($post_admin as $posts_admin)
						
							<tr>
								<td>
									{{ $posts_admin->user->name }}
								</td>
								<td>
									{{ $posts_admin->title }}
								</td>
								<td>
									<img src="{{ $posts_admin->featured }}" alt="{{ $posts_admin->title }}" width="90px" height="50px">
								</td>
								<td>
									<a href="{{ route('post.edit', ['id'=>$posts_admin->id]) }}" class="btn btn-primary">Edit</a>
								</td>
								<td>
									<a href="{{ route('post.delete', ['id'=>$posts_admin->id]) }}" class="btn btn-danger">Trash</a>
								</td>
							</tr>

					@endforeach

				@else

					@foreach($posts as $post)

						@if($post->user->id === Auth::user()->id)
						
							<tr>
								<td>
									{{ $post->user->name }}
								</td>
								<td>
									{{ $post->title }}
								</td>
								<td>
									<img src="{{ $post->featured }}" alt="{{ $post->title }}" width="90px" height="50px">
								</td>
								<td>
									<a href="{{ route('post.edit', ['id'=>$post->id]) }}" class="btn btn-primary">Edit</a>
								</td>
								<td>
									<a href="{{ route('post.delete', ['id'=>$post->id]) }}" class="btn btn-danger">Trash</a>
								</td>
							</tr>

						@endif

					@endforeach

				@endif
				</tbody>
			</table>
		</div>
	</div>

@stop