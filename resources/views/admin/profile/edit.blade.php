@extends('layouts.app')

@section('content')

	<!-- displaying errors -->


	<div class="panel panel-default">
		<div class="panel-heading">
			<p>Update Your Profile</p>
		</div>
		<div class="panel-body">
			<form action="{{ route('user.profile.update') }}" method="post" enctype="multipart/form-data" >
				{{ csrf_field() }}

				<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
					<label for="name">Name</label>
					<input type="text" name="name" value="{{ $user->name }}" class="form-control"></input>

					@if($errors->has('name'))
						<span class="help-block">{{ $errors->first('name') }}</span>
					@endif
				</div>

				<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
					<label for="name">Email</label>
					<input type="email" name="email" value="{{ $user->email }}" class="form-control"></input>

					@if($errors->has('email'))
						<span class="help-block">{{ $errors->first('email') }}</span>
					@endif
				</div>

				<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
					<label for="password">Change Password</label>
					<input type="password" name="password" placeholder="Enter your new password" class="form-control"></input>

					@if($errors->has('password'))
						<span class="help-block">{{ $errors->first('password') }}</span>
					@endif
				</div>

				<div class="form-group{{ $errors->has('avater') ? ' has-error' : '' }}">
					<label for="avater">Upload Profile Picture</label>
					<input type="file" name="avater" class="form-control"></input>

					@if($errors->has('avater'))
						<span class="help-block">{{ $errors->first('avater') }}</span>
					@endif
				</div>

				<div class="form-group{{ $errors->has('facebook') ? ' has-error' : '' }}">
					<label for="facebook">Facebook Profile</label>
					<input type="text" name="facebook" value="{{ $user->profile->facebook }}" class="form-control"></input>

					@if($errors->has('facebook'))
						<span class="help-block">{{ $errors->first('facebook') }}</span>
					@endif
				</div>

				<div class="form-group{{ $errors->has('youtube') ? ' has-error' : '' }}">
					<label for="youtube">Youtube Profile</label>
					<input type="text" name="youtube" value="{{ $user->profile->youtube }}" class="form-control"></input>

					@if($errors->has('youtube'))
						<span class="help-block">{{ $errors->first('youtube') }}</span>
					@endif
				</div>

				<div class="form-group{{ $errors->has('about') ? ' has-error' : '' }}">
					<label for="about">About Me</label>
					<textarea class="form-control" name="about" cols="6" rows="6">{{ $user->profile->about }}</textarea>

					@if($errors->has('about'))
						<span class="help-block">{{ $errors->first('about') }}</span>
					@endif
				</div>
				
				<div class="form-group">
					<button class="btn btn-success">Update User</button>
				</div>
			</form>
		</div>
	</div>

@stop