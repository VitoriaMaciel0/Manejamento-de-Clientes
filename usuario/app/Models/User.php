<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    // ...
    use HasApiTokens, HasFactory, Notifiable;

    /**
     *Os atributos que podem ser preenchidos em massa.
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
     * Os atributos que foram ocultos durante a serialização.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Os atributos que devem serconvertidos para tipos específicos.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * A tabela associada ao modelo.
     *
     * @var string
     */
    protected $table = 'usuario';
    protected $primaryKey = 'codigo';
}
