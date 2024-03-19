<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    use HasFactory;

    protected $table = "tb_kategoris";
    protected $fillable = ['nama_kategori'];

    protected $primaryKey = 'id';


    public function pengaduan()
    {
        return $this->hasMany(pengaduan::class);
    }
}
