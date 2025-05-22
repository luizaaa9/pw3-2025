<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use SoftDeletes;
    // Listagem de campos para inserção no banco
    protected $fillable = ['titulo', 'texto'];
}
