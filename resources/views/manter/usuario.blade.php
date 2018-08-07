@extends('layouts.app')

@section('content')
<div class="container">
	<h1>Usuario</h1>

	<form method="POST" action="/manter/usuarios/">
		{{ csrf_field() }}
		<input type="hidden" id="id" name="id" value="{{ $user->id }}" />
		<div class="form-group">
			<label for="name">Name</label>
			<input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" placeholder="Enter name">
		</div>
		<div class="form-group">
			<label for="email">Email address</label>
			<input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" placeholder="Enter email">
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>	
</div>
@endsection
