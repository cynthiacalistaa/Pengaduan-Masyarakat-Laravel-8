<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tanggapan extends Model
{
    use HasFactory;

    protected $table = 'tb_tanggapans';

    protected $primaryKey = 'id';

    protected $fillable = [
        'pengaduan_id', 
        'status',
        'tanggapan'
    ];

    public function pengaduan()
    {
        return $this->belongsTo(pengaduan::class);
    }
}
