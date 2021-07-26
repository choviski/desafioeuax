<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Atividade extends Model
{
    protected $table ="atividades";
    protected $fillable = ['nome','inicio','fim','finalizada','id_projeto'];
    public function projeto(){
        return $this->belongsTo("App\Models\Projeto",'id_projeto','id');
    }
    use SoftDeletes;
}
