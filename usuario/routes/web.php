<?php
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;
/**
     *  Este código define as rotas (routes) do aplicativo usando o Laravel's Route Facade.
     *
     * 
     */
Route::get('/', [UsuarioController::class, 'index'])->name('index');
Route::get('/cadastro', [UsuarioController::class, 'formularioCadastro'])->name('usuario.cadastro');
Route::post('/cadastro', [UsuarioController::class, 'cadastrarUsuario'])->name('cadastrar.usuario');
Route::post('/cadastro-usuario', [UsuarioController::class, 'store'])->name('usuario.store');
Route::get('/listagem', [UsuarioController::class, 'listarUsuarios'])->name('usuario.listagem');
Route::post('/usuarios/atualizar/{codigo}', [UsuarioController::class, 'atualizar'])->name('usuarios.atualizar');
Route::get('/editar/{codigo}', [UsuarioController::class, 'formularioEdicao'])->name('usuario.editar');
Route::get('/listar-usuarios', [UsuarioController::class, 'listarUsuarios'])->name('usuario.listar');
Route::get('/test-db-connection', function () {
    try {
        DB::connection()->getPdo();
        return "Conexão com o banco de dados estabelecida com sucesso!";
    } catch (\Exception $e) {
        return "Erro ao conectar com o banco de dados: " . $e->getMessage();
    }
});

Route::get('/welcome', function () {
    return view('welcome');
});
