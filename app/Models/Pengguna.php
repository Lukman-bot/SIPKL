<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Pengguna extends Model
{
    use HasFactory;

    protected $table = 'pengguna';
    protected $primaryKey = 'id_pengguna';
    protected $guarded = ['id_pengguna'];
    protected $column_search = ['username', 'nama_lengkap'];
    public $timestamps = false;

    public function getDatatables(Request $request)
    {
        $this->dt = DB::table($this->table)->orderBy('pengguna.id_pengguna', 'desc');

        if ($request->get('search_pengguna') != '') {
            $i = 0;
            foreach ($this->column_search as $item) {
                if ($i === 0) {
                    $this->dt->where($item, 'like', '%' . $request->get('search_pengguna') . '%');
                } else {
                    $this->dt->orWhere($item, 'like', '%' . $request->get('search_pengguna') . '%');
                }

                $i++;
            }
        }

        return $this->dt;
    }
}
