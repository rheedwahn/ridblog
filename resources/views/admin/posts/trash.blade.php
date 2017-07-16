@extends('layouts.app')

@section('content')

	<!-- displaying errors -->
@include('admin.partials.error')

	<div class="panel panel-default">
		<div class="panel-heading">
			<p>Thrashed Posts</p>
		</div>
		<div class="panel-body">
			<table class="table table-hover">
				<thead>
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

						@foreach($posts_admin as $post_admin)

							<tr>
								<td>
									{{ $post_admin->title }}
								</td>
								<td>
									<img src="{{ $post_admin->featured }}" alt="{{ $post_admin->title }}" width="90px" height="50px">
								</td>
								@if($users->count() === 0)
									<td>
										<a href="{{ route('post.restore', ['id'=>$post_admin->id]) }}" class="btn btn-primary">Restore</a>
									</td>
									<td>
										<a href="{{ route('post.kill', ['id'=>$post_admin->id]) }}" class="btn btn-danger">Delete</a>
									</td>
								@else
								@foreach($users as $user)
									@if($user->id !== $post_admin->user_id )
										<td>
											<a href="{{ route('post.restore', ['id'=>$post_admin->id]) }}" class="btn btn-primary">Restore</a>
										</td>
										<td>
											<a href="{{ route('post.kill', ['id'=>$post_admin->id]) }}" class="btn btn-danger">Delete</a>
										</td>
									@endif
								@endforeach
								@endif
							</tr>

						@endforeach

					@else

						@foreach($posts as $post)

							@if($post->user->id === Auth::user()->id)

								<tr>
									<td>
										{{ $post->title }}
									</td>

									<td>
										<img src="{{ $post->featured }}" alt="{{ $post->title }}" width="90px" height="50px">
									</td>
									
									<td>
										<a href="{{ route('post.restore', ['id'=>$post->id]) }}" class="btn btn-primary">Restore</a>
									</td>
									<td>
										<a href="{{ route('post.kill', ['id'=>$post->id]) }}" class="btn btn-danger">Delete</a>
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