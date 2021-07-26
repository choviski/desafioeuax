<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Projeto extends Model
{
    protected $table ="projetos";
    protected $fillable = ['nome','inicio','fim'];
    public function atividade(){
        return $this->hasOne('App\Models\projeto', 'id_projeto','id');
    }
    public function porcentagem(){
        return $this->hasOne('App\Models\porcentagem', 'id_projeto','id');
    }
    use SoftDeletes;
}
