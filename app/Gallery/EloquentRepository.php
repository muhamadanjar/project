<?php namespace App\Gallery;

use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;

class EloquentRepository implements RepositoryInterface {
    
    private $media;
    private $album;

    function __construct(Media $media,Album $album){
        $this->media = $media;
        $this->album = $album;

        $this->config = App::make('config');
        
    }
    public function all($keyword = null){
        return $this->media->orderBy('created_at', 'desc')->get();
    }

    public function get($keyword = null){
        return $this->media->orderBy('created_at', 'desc')->get();
    }

    public function create($input, $user){

        $media = $this->media->create($input);

        $loggedMedia = clone $media;
        
        $media->author()->associate($user)->save();

        Event::fire('media.created', [$loggedMedia, $loggedMedia]);

        return $media;
    }

    public function update($id, $input, $user){
        $media = $this->media->findOrFail($id);

        $updated = $media->update($input);

        if($updated){
            Event::fire('media.updated', [$media, $media]);
            return $media;
        }

        return false;
    }

    public function find($id){
        return $this->media->findOrFail($id);
    }

    public function delete($id, $user){
        $media = $this->media->findOrFail($id);
        $deleted = $media->delete();

        if($deleted){
            Event::fire('media.deleted', [$media]);
            return $media;
        }

        return false;
    }

    public function search($keyword, $type = null, $includeDraft = false, $me=false){
        $query = $this->prepareSearch($keyword, $type, $includeDraft, $me);

        return $query->paginate($this->config->get('pagination.per_page'));
    }

    public function prepareSearch($keyword, $type, $includeDraft, $me){
        $query = $this->album->orderBy('album.updated_at', 'DESC');

        /*if(!$includeDraft){
            $query->published();
        }*/

        if($me){
            $officer_id = -999;
            if(Auth::user()->officer){
                $officer_id = Auth::user()->officer->id;
            }
            $user_id = Auth::user()->id;
            $query->where(function($query2) use ($officer_id, $user_id){
                $query2->where('author_id', $user_id);
            });
        }
        $query->select('album.*');
        //$query->join('officers', 'jaksa_id', '=', 'officers.id', 'left');

        if($keyword){
            $query->where(function($query2) use ($keyword){
                $query2
                    ->where('name', 'LIKE', '%'.$keyword.'%')
                    //->orWhere('spdp_number', 'LIKE', '%'.$keyword.'%')
                    //->orWhereIn('cases.id', $cases_ids)
                    //->orWhere('officers.name', 'LIKE', "%$keyword%")
                ;

            });
        }

        return $query;
    }

    public function countSearch($keyword, $type = null, $includeDraft = false, $me=false){
        $query = $this->prepareSearch($keyword, $type, $includeDraft, $me);

        return $query->count();
    }

    public function count(){
        return $this->media->count();
    }

    public function getRandomMedia($count){
        return $this->media->where('mime_type','!=','video/mp4')->limit($count)->inRandomOrder()->get();
    }

    public function getAlbum(){
        return $this->album->whereType('photo')->orderBy('created_at', 'desc')->limit(4)->get();
    }
    public function findAlbum($id){
        return $this->album->findOrFail($id);
    }
    public function createAlbum($input, $user){
        $album = new Album();
        $album->name = $input->name;
        $album->type = $input->type;
        $album->slug = str_slug($input->name);
        $album->keterangan = $input->keterangan;
        $album->image = $input->image;
        $album->actived = $input->actived;
        if(session('aksi')!='edit'){
            $album->posted_at = Carbon::now();
        }
        $album->save();
        $loggedMedia = clone $album;
        
        $album->author()->associate($user)->save();
        
        Event::fire('album.created', [$loggedMedia, $loggedMedia]);
        
        return $album;
    }

    public function updateAlbum($id, $input, $user){
        $album = $this->album->findOrFail($id);
        $album->name = $input->name;
        $album->type = $input->type;
        $album->slug = str_slug($input->name);
        $album->keterangan = $input->keterangan;
        $album->image = $input->image;
        $album->actived = $input->actived;
        $album->save();
        $updated = $album;

        if($updated){
            Event::fire('album.updated', [$album, $album]);
            return $album;
        }

        return false;
    }

    public function deleteAlbum($id, $user){
        $album = $this->album->findOrFail($id);
        $deleted = $album->delete();

        if($deleted){
            Event::fire('album.deleted', [$album]);
            return $album;
        }

        return false;
    }
    public function countAlbum(){
        return $this->album->count();
    }

    public function getMediaVideoPly(){
        return $this->media->where('mime_type','video/mp4')->inRandomOrder()->get();
    }

    public function getMediaVideo(){
        return $this->media->where('mime_type','video/mp4')->inRandomOrder()->first();
    }

    

   

}