<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutoData extends Model
{
    use HasFactory;
    protected $table = 'produtos_datas';
    protected $primaryKey = 'produto_data_id';
}
