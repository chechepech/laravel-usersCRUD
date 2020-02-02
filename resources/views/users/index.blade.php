@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
  	<div class="col-12 col-sm-10 col-lg-8 mx-auto">		
		<div class="m-0">
			<h1 class="display-5 float-left">USERS</h1>
			<a href="{{route('users.create')}}" class="btn btn-outline-success btn-sm float-right m-2" title="">ADD USER</a>
		</div>
		@if($search)
		<div class="alert alert-primary" role="alert">
		  <p class="m-0">RESULTS: "{{$search}}"</p>
		</div>
		@endif
		<table class="table table-hover">
		  <thead class="thead-dark">
			<tr>
			  <th scope="col">#</th>
			  <th scope="col">Name</th>
			  <th scope="col">Email</th>
			  <th scope="col">Action</th>
			</tr>
		  </thead>
		  <tbody>
			@foreach($users as $user)
			<tr>
			  <th scope="row">{{$user->id}}</th>
			  <td>{{$user->name}}</td>
			  <td>{{$user->email}}</td>
			  <td>
				<a href="{{route('users.show',$user)}}" class="btn btn-outline-primary btn-sm">View</a>
				<a href="{{route('users.edit',$user)}}" class="btn btn-outline-secondary btn-sm">Edit</a>
				<a href="#" class="btn btn-outline-danger btn-sm" onclick="document.getElementById('delete-user').submit()">Remove</a>
				<form id="delete-user" method="post" class="d-none" action="{{route('users.destroy',$user)}}">
				@csrf @method('DELETE')
			  </form>
			  </td>
			</tr>
			@endforeach
		  </tbody>
		</table>
		<!--Pagination-->
		{{$users->links()}}
	</div>
  </div>
</div>
@endsection