<!-- resources/views/usuario/editar.blade.php -->

@extends('layout')

@section('content')
    <h1>Editar Usuário</h1>

    <form action="{{ route('usuarios.atualizar', $usuario->codigo) }}" method="POST">
        @csrf

        <div>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="{{ $usuario->nome }}" required>
        </div>

        <div>
            <label for="pedra">Pedra:</label>
            <input type="text" id="pedra" name="pedra" value="{{ $usuario->pedra }}" required>
        </div>

        <div>
            <label for="limite">Limite:</label>
            <input type="text" id="limite" name="limite" value="{{ $usuario->limite }}" required>
        </div>

        <div>
            <label for="endereco">Endereço:</label>
            <input type="text" id="endereco" name="endereco" value="{{ $usuario->endereco }}" required>
        </div>

        <div>
            <label for="telefone">Telefone:</label>
            <input type="text" id="telefone" name="telefone" value="{{ $usuario->telefone }}" required>
        </div>

        <div>
            <label for="cep">CEP:</label>
            <input type="text" id="cep" name="cep" value="{{ $usuario->cep }}" required>
        </div>

        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ $usuario->email }}" required>
        </div>

        <div>
            <label for="idade">Idade:</label>
            <input type="number" id="idade" name="idade" value="{{ $usuario->idade }}" required>
        </div>

        <button type="submit">Atualizar</button>
    </form>
@endsection
