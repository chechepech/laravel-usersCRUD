@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-around">
@foreach($notes as $note)
	<div class="card border-primary mb-3" style="max-width: 18rem;">
  <div class="card-header">{{($note->id)}}
  	<p class="small float-right">{{$note->created_at}}</p>
  </div>
  <div class="card-body text-primary">
    <h5 class="card-title">{{$note->title}}</h5>
    <p class="card-text">{{$note->text}}</p>
  </div>
</div>
@endforeach
</div>
@endsection