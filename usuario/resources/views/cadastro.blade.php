<!-- cadastro.blade.php -->

@extends('layout')

@section('content')
<div class="custom-form">
    <form action="{{ route('usuario.store') }}" method="POST" id="myForm" class="custom-form">
        @csrf

        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome">

        <label for="pedra">Pedra:</label>
        <input type="text" name="pedra" id="pedra">

        <label for="limite">Limite:</label>
        <input type="text" name="limite" id="limite">

        <label for="endereco">Endereço:</label>
        <input type="text" name="endereco" id="endereco">

        <label for="telefone">Telefone:</label>
        <input type="text" name="telefone" id="telefone">

        <div class="form-group">
            <label for="cep">CEP</label>
            <input type="text" id="cep" name="cep">
            <small id="cep-message"></small>
        </div>

        <label for="email">E-mail:</label>
        <input type="email" name="email" id="email">

        <label for="idade">Idade:</label>
        <input type="number" name="idade" id="idade">

        <button type="submit">Cadastrar</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('#myForm').submit(function(event) {
            var idade = $('#idade').val();
            if (idade < 18) {
                event.preventDefault();
                alert('Você deve ter no mínimo 18 anos para se cadastrar.');
            } else {
                // Continuar o envio do formulário
            }
        });

        $('#cep').on('input', function() {
            var cep = $(this).val();
            if (cep.length === 8 && cep.startsWith('69')) {
                $.ajax({
                    url: 'https://viacep.com.br/ws/' + cep + '/json/',
                    dataType: 'json',
                    success: function(data) {
                        if (data.erro) {
                            $('#cep-message').text('CEP inválido');
                        } else {
                            $('#cep-message').text('CEP válido');
                        }
                    },
                    error: function() {
                        $('#cep-message').text('Erro ao verificar CEP');
                    }
                });
            } else {
                $('#cep-message').text('CEP inválido');
            }
        });
    });
</script>
@endsection

