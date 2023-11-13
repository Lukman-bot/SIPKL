<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembimbing extends Model
{
    use HasFactory;
    protected $table = 'pembimbing_dudi';
    protected $primaryKey = 'id_pembimbing_dudi';
    protected $guarded = ['id_pembimbing_dudi'];
    public $timestamps = false;
}
