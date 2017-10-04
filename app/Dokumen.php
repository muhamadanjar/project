<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    protected $table = 'download';
    protected $primaryKey = 'id';

    protected $fillable = [
        'judul_dokumen', 'tanggal',
    ];

}
