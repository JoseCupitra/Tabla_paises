<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pais extends Model
{
    use HasFactory;
    protected $table='paises';
    protected $primarykey='id';
    protected $fillable=['Nombre','Capital','Odioma_oficial'];
    protected $guarded=[];
    public $timestamps=false;
}
