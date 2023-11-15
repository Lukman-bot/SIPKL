## langkah-langkah menu Agenda

lanjut buat model untuk agenda dengan perintah berikut
```console
php artisan make:model Agenda
```

isikan kode berikut pada mode Agenda Anda
```console
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;
    protected $table = 'agenda';
    protected $primaryKey = 'id_agenda';
    protected $guarded = ['id_agenda'];
    public $timestamps = false;
}
```

buat file migrasi
```console
php artisan make:migration create_agenda_table
```

isikan file migrasi tersebut dengan kode berikut
```console
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('agenda', function (Blueprint $table) {
            $table->id('id_agenda');
            $table->date('tgl_agenda');
            $table->text('uraian_kegiatan');
            $table->unsignedBigInteger('id_penempatan');
            $table->foreign('id_penempatan')
                ->references('id_penempatan')
                ->on('penempatan')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agenda');
    }
};
```

sesuaikan file AgendaController.php menjadi seperti berikut
```console
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Agenda;

class AgendaController extends Controller
{
    public function __construct()
    {
        $this->model = new Agenda();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Agenda',
            'data' => Agenda::all()
        ];
        
        return view('agenda.index', $data);
    }

    public function form($id = null)
    {
        $penempatan = DB::table('penempatan')->where('id_pengguna', session()->get('id_pengguna'))->first();
        if (!$penempatan) {
            return redirect('agenda')->with('error', 'Anda belum ditambahkan kedalam DU/DI. Silahkan hubungi Admin');
        }
        
        $data = [
            'title' => 'Form Agenda Harian',
            'data' => $this->model->find(base64_decode($id)),
            'id_penempatan' => $penempatan->id_penempatan
        ];

        return view('agenda.form', $data);
    }

    public function store(Request $request)
    {
        $id = $request->get('id');

        $validate = $request->validate([
            'tgl_agenda' => ['required'],
            'uraian_kegiatan' => ['required'],
            'id_penempatan' => ['required']
        ]);

        if ($id == null) {
            $this->model->insert($validate);
            return redirect('agenda')->with('success', 'Berhasil menyimpan data agenda');
        } else {
            $this->model->where('id_agenda', $id)->update($validate);
            return redirect('agenda')->with('success', 'Berhasil memperbarui data agenda');
        }
    }

    public function destroy($id)
    {
        $this->model->where('id_agenda', base64_decode($id))->delete();

        return redirect('agenda')->with('success', 'Berhasil menghapus data agenda');
    }
}
```

edit file index.blade.php pada folder Agenda menjadi seperti berikut
```console
@extends('template/template')
@section('views')
@if (session()->has('success'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" ariahidden="true">&times;</button>
    {{ session('success') }}
</div>
@elseif (session()->has('error'))
<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" ariahidden="true">&times;</button>
    {{ session('error') }}
</div>
@endif
<div class="card">
    <div class="card-header">
        <div class="float-right">
            <a class="btn btn-success" href="{{url("agenda/form")}}">
                <i class="fa fa-plus"></i> Tambah
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 5%;">No</th>
                        <th>Tgl. Agenda</th>
                        <th>Uraian Kegiatan</th>
                        <th style="width: 5%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $show)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$show->tgl_agenda}}</td>
                            <td>{{$show->uraian_kegiatan}}</td>
                            <td>
                                <div class="d-flex align-items-center justify-content-center">
                                    <a href="{{url("agenda/form/" . base64_encode($show->id_agenda))}}" class="btn btn-warning btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{url("agenda/delete/" . base64_encode($show->id_agenda))}}" class="btn btn-danger btn-sm ml-2">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
```

buat file form.blade.php pada folder Agenda, dan masukkan kode berikut
```console
@extends('template/template')
@section('views')
<div class="row">
    <div class="col-lg-8">
        <form action="{{url("agenda")}}" method="post">
            @csrf
            <div class="card">
                <div class="card-header">
                    <a href="{{url("agenda")}}" class="btn btn-warning">
                        <i class="fas fa-angle-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-success float-right">
                        <i class="fa fa-save"></i> Simpan
                    </button>
                </div>
                <div class="card-body">
                    <input type="hidden" name="id" value="{{@$data['id_agenda']}}">
                    <input type="hidden" name="id_penempatan" value="{{$id_penempatan}}">
                    <div class="form-group">
                        <label for="">Tgl. Agenda</label>
                        <input type="date" class="form-control" name="tgl_agenda" required value="{{old('tgl_agenda', @$data['tgl_agenda'])}}">
                        @error('tgl_agenda')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Uraian Kegiatan</label>
                        <input type="text" class="form-control" name="uraian_kegiatan" placeholder="Masukkan uraian kegiatan" required value="{{old('uraian_kegiatan', @$data['uraian_kegiatan'])}}">
                        @error('uraian_kegiatan')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
```

terakhir, sesuaikan file Routes/web.php menjadi seperti berikut.
```console

```
