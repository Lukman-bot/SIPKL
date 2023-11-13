<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penempatan extends Model
{
    use HasFactory;
    protected $table = 'penempatan';
    protected $primaryKey = 'id_penempatan';
    protected $guarded = ['id_penempatan'];
    public $timestamps = false;
}
