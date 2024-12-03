<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User;

class Curso extends Model
{

  protected $fillable = ['titulo', 'descricao', 'imagem','preco'];

     public function aulas(){
      return $this->hasMany(Aula::class, 'curso_id'); // Curso tem varias aulas
     }

     public function alunos(){
        return $this->belongsToMany(User::class, 'curso_user');
     }

      
    public function usuarios()
    {
        return $this->belongsToMany(User::class, 'curso_user', 'curso_id', 'user_id')
                    ->withTimestamps();
    }


     
}
