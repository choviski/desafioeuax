<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Porcentagem extends Model
{
    protected $table ="porcentagens";
    protected $fillable = ['total','porcentagem','finalizadas','id_projeto'];
    public function projeto(){
        return $this->belongsTo("App\Model\Projeto",'id_projeto','id');
    }
    use SoftDeletes;
}
