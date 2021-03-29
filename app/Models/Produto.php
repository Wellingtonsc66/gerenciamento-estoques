<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;
    protected $primaryKey = 'produto_id';
    protected $fillable = ['skuId','produto_nome','produto_qnt'];
    public $timestamps = false;
}
