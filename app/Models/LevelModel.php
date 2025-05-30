<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LevelModel extends Model
{
    protected $table = 'm_level';
    protected $primaryKey = 'level_id';
    public $timestamps = false;// Jika tabel tidak memiliki created_at dan updated_at

    protected $fillable = [
        'level_kode',
        'level_nama'
    ];
}