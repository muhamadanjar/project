<?php

namespace App\Gallery;

use Illuminate\Database\Eloquent\Model;
use App\AuditTrail\RevisionableTrait;
use App\User;
class Media extends Model
{
    use RevisionableTrait;
    protected $fillable = [
        'filename',
        'original_filename',
        'mime_type',
        'mediable_id',
        'mediable_type'
    ];

    /**
     * Get the media's url.
     *
     * @return string
     */
    public function getUrlAttribute()
    {
        return route('media.show', ['medium' => $this->filename]);
    }

    /**
     * Get the media's storage path.
     *
     * @return string
     */
    public function getPath()
    {
        return storage_path('app/') . $this->filename;
    }

    public function album(){
        return $this->belongsTo(Album::class,'album_id');
    }

    public function author(){
        return $this->belongsTo(User::class, 'author_id');
    }

    public function getPermalinkMedia(){
        return url('images/uploads/gallery').DIRECTORY_SEPARATOR.'/';
    }
}
