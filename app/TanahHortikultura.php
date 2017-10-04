<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tanah;
class TanahHortikultura extends Model
{
    protected $table = 'tanah_hortikultura';
    protected $primaryKey = 'thortikultura_id';

    protected $fillable = [];

    public function tanah(){
        return $this->belongsTo(Tanah::class);
    }

    public $timestamps = false;
}
