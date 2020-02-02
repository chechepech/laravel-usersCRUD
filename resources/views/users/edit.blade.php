@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-12 col-sm-10 col-lg-6 mx-auto">			
			@if ($errors->any())
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif
			<form method='post' class="bg-white py-3 px-4 shadow rounded" action="{{route('users.update',$user)}}">
				<h1 class="display-5 text-center">EDIT USER</h1><hr>
				@method('PATCH') @csrf
			  <div class="form-group">
				<label for="name">Name</label>
				<input type="text" class="form-control" name="name" id="name" value="{{old('name',$user->name)}}" placeholder="Enter your name">
			  </div>
			  <div class="form-group">
				<label for="email">Email</label>
				<input type="email" class="form-control" name="email" id="email" value="{{old('email',$user->email)}}" placeholder="Enter your email">
			  </div>
			  <!--<div class="form-group">
				<label for="password">Password</label>
				<input type="password" class="form-control" name="password" id="password" value="{{old('password',$user->password)}}" placeholder="Enter a password">
			  </div>-->
			  <button type="submit" class="btn btn-dark">SAVE</button>
			  <button type="reset" class="btn btn-light">CANCEL</button>
			</form>
		</div>
	</div>
</div>
@endsection