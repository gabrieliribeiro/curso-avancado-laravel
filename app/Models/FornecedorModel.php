<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FornecedorModel extends Model
{
    //
    use SoftDeletes;
    
    protected $table = "fornecedores";
    protected $fillable = ["name","site","uf","email"];
}
