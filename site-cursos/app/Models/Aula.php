<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    protected $fillable = ['id','curso_id','titulo', 'conteudo', 'video_url','order'];

    public function usuarios()
    {
        return $this->belongsToMany(User::class, 'user_aula');
    }
    

    public function curso(){
        return $this->belongsTo(Curso::class); //Aula pertence a um curso
    }
}
