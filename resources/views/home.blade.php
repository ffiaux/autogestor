@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Welcome</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in! {{ $userRole }}
                </div>              
            </div>

            <div class="card">
                <div class="card-header">Menu</div>

                <div class="card-body">
                    <ul>
                        <li><a href="/manter/produtos">Manter produtos</a></li>
                        <li><a href="/manter/categorias">Manter categorias</a></li>
                        <li><a href="/manter/marcas">Manter marcas</a></li>
                    </ul>
                </div>              
            </div>            
        </div>
    </div>
</div>
@endsection
