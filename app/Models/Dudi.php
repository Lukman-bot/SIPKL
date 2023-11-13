<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dudi extends Model
{
    use HasFactory;

    protected $table = 'dudi';
    protected $primaryKey = 'id_dudi';
    protected $guarded = ['id_dudi'];
    public $timestamps = false;
}
