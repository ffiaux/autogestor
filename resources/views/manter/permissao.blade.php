@extends('layouts.app')

@section('content')
<div class="container">
	<h1>Permissao</h1>

	<form method="POST" action="/manter/permissoes/">
		{{ csrf_field() }}
		<input type="hidden" id="id" name="id" value="{{ $role->id }}" />
		<div class="form-group">
			<label for="userName">Name</label>
			<input type="text" class="form-control" id="name" name="name" value="{{ $role->name }}" placeholder="Enter name">
		</div>
		<div class="form-group">
			<label for="userName">Description</label>
			<input type="text" class="form-control" id="description" name="description" value="{{ $role->description }}" placeholder="Enter Description">
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>		
</div>
@endsection
