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
						Permission
					</th>

					<th>
						Trash
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
								@if($user->admin)
									<a href="{{ route('user.not.admin', ['id' => $user->id]) }}" class="btn btn-danger btn-xs">Remove Admin Permission</a>
								@else
									<a href="{{ route('user.admin', ['id' => $user->id]) }}" class="btn btn-success btn-xs">Make an Admin</a>
								@endif
							</td>
							<td>
								@if(Auth::id() !== $user->id)
									<a href="{{ route('user.delete', ['id' => $user->id]) }}" class="btn btn-danger btn-xs">Trash User</a>
								@endif								
							</td>
						</tr>

					@endforeach
				</tbody>
			</table>
		</div>
	</div>

@stop