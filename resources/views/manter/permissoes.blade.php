@extends('layouts.app')

@section('content')
<div class="container">
	<h1>Manter permissoes</h1>

	<ul>
	@foreach ($roles as $role)
		<li>
			<a href="/manter/permissoes/{{ $role->id }}">{{ $role->name }} - {{ $role->description }}</a>
			&nbsp;&nbsp;&nbsp;&nbsp;
			<a class="btn btn-primary" href="/manter/permissao-delete/{{ $role->id }}" role="button">Excluir</a>
		</li>
		<hr>
	@endforeach
	</ul>

	<a href="/manter/permissao-create" class="btn btn-primary">Nova permissao</a>
</div>
@endsection
