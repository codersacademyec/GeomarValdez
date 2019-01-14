<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagos extends Model
{
    protected $table ='pagos';
    protected $primaryKey='id';
    public $timestamps = false;
    protected $fillable=[
        'id',
        'num_comp_pago',
        'monto_pago',
        'usuario_pago',
    ];

}
