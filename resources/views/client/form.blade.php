@extends('theme.base')

@section('content')
    <div class="container py-5 text-center">
        @if (isset($client))
            <h1>Editar Cliente</h1>      
        @else
            <h1>Crear cliente</h1>
        @endif

        @if (isset($client))
            <form action="{{ route('client.update', $client)}}" method="POST">  
                @method('PUT')  
        @else
            <form action="{{ route('client.store')}}" method="POST">
        @endif

        
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" name="name" class="form-control" placeholder="Nombre del cliente" value="{{ old('name') ?? @$client->name}}">
                <p class="form-text">Escriba el nombre del cliente</p>
                @error('name')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="due" class="form-label">Saldo</label>
                <input type="number" name="due" class="form-control" placeholder="Saldo Clientes" step="0.00001" value="{{ old('due') ?? @$client->due}}">
                <p class="form-text">Escriba el Saldo del cliente</p>
                @error('due')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="comments" class="form-label">Comentarios</label>
                <textarea name="comments" cols="30" rows="4" class="form-control" value="{{ old('comments') ?? @$client->comments}}"></textarea>
                <p class="form-text">Escriba algunos comentarios</p>
                @error('comments')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>

            @if (isset($client))
                <button type="submit" class="btn btn-info">Editar Cliente</button>
            @else
                <button type="submit" class="btn btn-info">Guardar Cliente</button>
            @endif

        </form> 
    </div>
@endsection