@extends('layouts.app')

@section('content')

	<!-- displaying errors -->
@include('admin.partials.error')

	<div class="panel panel-default">
		<div class="panel-heading">
			<p>All Users</p>
		</div>
		<div class="panel-body">
			<table class="table table-hover">
				<thead>
					<th>
						Image
					</th>

					<th>
						Name
					</th>

					<th>
						Restore
					</th>

					<th>
						Delete
					</th>
				</thead>
				<tbody>
					@foreach($users as $user)
						<tr>
							<td>
								<img src="{{ asset($user->profile->avater) }}" align="{{ $user->name }}" height="60" width="60" style="border-radius: 50%;">
							</td>
							<td>
								{{ $user->name }}
							</td>
							<td>
									<a href="{{ route('user.restore', ['id' => $user->id]) }}" class="btn btn-primary btn-xs">Restore User</a>
							</td>
							<td>
									<a href="{{ route('user.kill', ['id' => $user->id]) }}" class="btn btn-danger btn-xs">Delete User</a>									
							</td>
						</tr>

					@endforeach
				</tbody>
			</table>
		</div>
	</div>

@stop