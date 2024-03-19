<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class masyarakat extends Model
{
    use HasFactory;

    protected $table = 'tb_masyarakat';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nama_depan', 
        'nama_belakang',
        'username',
        'email',
        'no_telp',
        'alamat'
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
