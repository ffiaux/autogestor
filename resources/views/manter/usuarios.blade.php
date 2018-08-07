@extends('layouts.app')

@section('content')
<div class="container">
	<h1>Manter usuarios</h1>

	<ul>
	@foreach ($users as $user)
		<li>
			<a href="/manter/usuarios/{{ $user->id }}">{{ $user->name }}</a>
			&nbsp;&nbsp;&nbsp;&nbsp;
			<a class="btn btn-primary" href="/manter/usuario-delete/{{ $user->id }}" role="button">Excluir</a>
		</li>
		<hr>
	@endforeach
	</ul>

	<a href="/manter/usuario-create" class="btn btn-primary">Novo usuario</a>
</div>
@endsection
