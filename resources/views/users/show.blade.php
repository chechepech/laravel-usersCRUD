@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-12 col-sm-10 col-lg-6 mx-auto">
			<div class="jumbotron jumbotron-fluid">
				<h1 class="display-5 text-center">{{$user->name}}</h1>
				<p class="lead text-center">{{$user->email}}</p>
			</div>
		</div>
	</div>
</div>
@endsection