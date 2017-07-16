@extends('layouts.app')

@section('content')


	<div class="panel panel-default">
		<div class="panel-heading">
			<p>Create a new User</p>
		</div>
		<div class="panel-body">
			<form action="{{ route('user.store') }}" method="post" >
				{{ csrf_field() }}
				<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
					<label for="name">Name</label>
					<input type="text" name="name" placeholder="Name of User" value="{{ Request::old('name') }}" class="form-control"></input>

					@if($errors->has('name'))
						<span class="help-block">{{ $errors->first('name') }}</span>
					@endif
				</div>
				<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
					<label for="name">Email</label>
					<input type="email" name="email" value="{{ Request::old('email') }}" placeholder="Email of user" class="form-control"></input>

					@if($errors->has('email'))
						<span class="help-block">{{ $errors->first('email') }}</span>
					@endif
				</div>
				
				<div class="form-group">
					<button class="btn btn-success">Add User</button>
				</div>
			</form>
		</div>
	</div>

@stop