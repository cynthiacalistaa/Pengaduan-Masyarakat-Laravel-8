<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;

class pengaduan extends Model
{
    use HasFactory;
    protected $table = "tb_pengaduans";
    protected $fillable = [
        'user_id',
        'kategori_id', 
        'judul_laporan', 
        'isi_laporan', 
        'tgl_kejadian', 
        'foto',
        'province_id',
        'regency_id',
        'district_id',
        'village_id',
        'status',
        'tanggapan'
       
    ];

    protected $primaryKey = 'id';
    
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    
    public function tanggapans()
    {
        return $this->belongsTo(pengaduan::class, 'id', 'id');
    }

    public function tanggapan()
    {
        return $this->hasMany(Tanggapan::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }

    public function regency()
    {
        return $this->belongsTo(Regency::class, 'regency_id');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }

    public function village()
    {
        return $this->belongsTo(Village::class, 'village_id');
    }
}
