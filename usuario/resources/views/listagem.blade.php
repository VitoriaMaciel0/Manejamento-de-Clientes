<!-- resources/views/listagem.blade.php -->


<h1>Listagem de Usuários</h1>

<table>
    <thead>
        <tr>
            <th>Nome</th>
            <th>Pedra</th>
            <th>Limite</th>
            <th>Endereço</th>
            <th>Telefone</th>
            <th>CEP</th>
            <th>Email</th>
            <th>Idade</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($usuarios->sortBy('nome') as $usuario)
            <tr>
                <td>{{ $usuario->nome }}</td>
                <td>{{ $usuario->pedra }}</td>
                <td>{{ $usuario->limite }}</td>
                <td>{{ $usuario->endereco }}</td>
                <td>{{ $usuario->telefone }}</td>
                <td>{{ $usuario->cep }}</td>
                <td>{{ $usuario->email }}</td>
                <td>{{ $usuario->idade }}</td>
                <td>
                    <a href="{{ route('usuario.editar', ['codigo' => $usuario->codigo]) }}">Editar</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

