<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JamMengajar extends Model
{
    use HasFactory;

    protected $table = 'jam_mengajar';

    protected $fillable = [
        'guru_id',
        'tanggal',
        'jumlah_jam',
    ];

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }
}
