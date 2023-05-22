<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Cadastro extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Os atributos que foram preenchidos em massa.
     *
     * @var array
     */
    protected $fillable = [
        'nome',
        'pedra',
        'limite',
        'endereço',
        'telefone',
        'cep',
        'idade',
        'email',
    ];

    /**
     *  Os atributos que foram ocultos durante a serialização
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Os atributos que devem ser convertidos para tipos específicos. Principamente pelo jeito que o Laravel pede essa parte
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * A tabela associada ao modelo. Muito importante pois na minha base de dados esta escrita como usuario e nã o user padrao, e o mesmo com id e codigo.
     *
     * @var string
     */
    protected $table = 'usuario';
    protected $primaryKey = 'codigo';
}
