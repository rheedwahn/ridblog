@extends('layouts.app')

@section('content')


	<div class="panel panel-default">
		<div class="panel-heading">
			<p>Create a new User</p>
		</div>
		<div class="panel-body">
			<form action="{{ route('setting.update') }}" method="post" enctype="multipart/form-data" >
				{{ csrf_field() }}
				<div class="form-group{{ $errors->has('site_name') ? ' has-error' : '' }}">
					<label for="name">Site Name</label>
					<input type="text" name="site_name" value="{{ $settings->site_name }}" class="form-control"></input>

					@if($errors->has('site_name'))
						<span class="help-block">{{ $errors->first('site_name') }}</span>
					@endif
				</div>
				<div class="form-group{{ $errors->has('contact_email') ? ' has-error' : '' }}">
					<label for="email">Contact Email</label>
					<input type="email" name="contact_email" value="{{ $settings->contact_email }}"  class="form-control"></input>

					@if($errors->has('contact_email'))
						<span class="help-block">{{ $errors->first('contact_email') }}</span>
					@endif
				</div>
				<div class="form-group{{ $errors->has('contact_number') ? ' has-error' : '' }}">
					<label for="number">Contact Number</label>
					<input type="text" name="contact_number" value="{{ $settings->contact_number }}"  class="form-control"></input>

					@if($errors->has('contact_number'))
						<span class="help-block">{{ $errors->first('contact_number') }}</span>
					@endif
				</div>
				<div class="form-group{{ $errors->has('site_logo') ? ' has-error' : '' }}">
					<label for="site_logo">Site Logo</label>
					<input type="file" name="site_logo" class="form-control"></input>

					@if($errors->has('site_logo'))
						<span class="help-block">{{ $errors->first('site_logo') }}</span>
					@endif
				</div>
				<div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
					<label for="address">Contact Address</label>
					<textarea class="form-control" name="address" rows="6" cols="6">{{ $settings->address }}</textarea>

					@if($errors->has('address'))
						<span class="help-block">{{ $errors->first('address') }}</span>
					@endif
				</div>
				
				<div class="form-group">
					<button class="btn btn-success">Update Site Settings</button>
				</div>
			</form>
		</div>
	</div>

@stop