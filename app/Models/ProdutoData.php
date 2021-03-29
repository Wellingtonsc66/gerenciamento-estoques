<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutoData extends Model
{
    use HasFactory;
    protected $table = 'produtos_datas';
    protected $primaryKey = 'produto_data_id';
    protected $fillable = ['usuario_id','produto_id','produto_data_qnt','produto_data_data'];
    public $timestamps = false;
}
