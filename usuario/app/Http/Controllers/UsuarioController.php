<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsuarioController extends Controller
{
    public function store(Request $request)
{
    $usuario = new User;
    $usuario->nome = $request->input('nome');
    $usuario->pedra = $request->input('pedra');
    $usuario->limite = $request->input('limite');
    $usuario->endereco = $request->input('endereco');
    $usuario->telefone = $request->input('telefone');
    $usuario->cep = $request->input('cep');
    $usuario->email = $request->input('email');
    $usuario->idade = $request->input('idade');
    
    $usuario->save();
    
    return redirect()->route('usuario.listagem')->with('success', 'Usuário cadastrado com sucesso!');
}

    public function cadastrarUsuario(Request $request)
    {
        // Validação dos dados recebidos
        $request->validate([
            'nome' => 'required',
            'pedra' => 'required',
            'limite' => 'required',
            'endereco' => 'required',
            'telefone' => 'required',
            'cep' => 'required',
            'idade' => 'required|integer|min:18',
            'email' => 'required|email',
            'cep_amazonas' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (strpos($value, '69') !== 0) {
                        $fail('O CEP fornecido não é do estado do Amazonas.');
                    }
                },
            ],
        ]);

        // Verificar se a idade é válida
        $idade = $request->input('idade');
        if ($idade < 18) {
            return redirect()->back()->with('error', 'Você deve ter no mínimo 18 anos para se cadastrar');
        }

        // Criar uma nova instância do usuário
        $usuario = new User();
        $usuario->nome = $request->input('nome');
        $usuario->pedra = $request->input('pedra');
        $usuario->limite = $request->input('limite');
        $usuario->endereco = $request->input('endereco');
        $usuario->telefone = $request->input('telefone');
        $usuario->cep = $request->input('cep');
        $usuario->email = $request->input('email');
        $usuario->idade = $idade;

        // Salvar o usuário no banco de dados
        $usuario->save();

        // Redirecionar para o índice
        return redirect()->route('index');
    }

    public function formularioCadastro()
    {
        return view('cadastro');
    }

    public function index()
    {
        $usuarios = User::all();
        return view('index', compact('usuarios'));
    }

    public function listarUsuarios()
    {
        $usuarios = User::all();
        return view('listagem', compact('usuarios'));
    }

    public function formularioEdicao($codigo)
    {
        $usuario = User::find($codigo);
    
        if (!$usuario) {
            return redirect()->route('index')->with('error', 'Usuário não encontrado');
        }
    
        return view('editar', compact('usuario'));
    }

    public function atualizar(Request $request, $codigo)
    {
        $request->validate([
            'nome' => 'required',
            'pedra' => 'required',
            'limite' => 'required',
            'endereco' => 'required',
            'telefone' => 'required',
            'cep' => 'required',
            'idade' => 'required',
            'email' => 'required|email',
        ]);

        $usuario = User::find($codigo);

        if (!$usuario) {
            return redirect()->route('index')->with('error', 'Usuário não encontrado');
        }
    
        $usuario->nome = $request->input('nome');
        $usuario->pedra = $request->input('pedra');
        $usuario->limite = $request->input('limite');
        $usuario->endereco = $request->input('endereco');
        $usuario->telefone = $request->input('telefone');
        $usuario->cep = $request->input('cep');
        $usuario->email = $request->input('email');
        $usuario->idade = $request->input('idade');
        $usuario->save();
    
        return redirect()->route('index')->with('success', 'Usuário atualizado com sucesso');
    }
    }