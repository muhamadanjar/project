<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Gallery\Media;
use App\Gallery\Album;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use App\Gallery\RepositoryInterface;

class AlbumCtrl extends BackendCtrl
{
    private $repo;
    function __construct(RepositoryInterface $repo){
        $this->repo = $repo;
        return parent::__construct();
    }

    public function index(Request $r){
        $type = $r->get('type', 'album');
        $media = Media::orderBy('id','asc')->get();
        $album = Album::orderBy('id','asc')->get();
        $count['media'] = $this->repo->count();
        $count['album'] = $this->repo->countAlbum();
        return view('backend.galeri.index', compact('album','media','count', 'type'));
    }

    public function create(){
        session(['aksi'=>'add']);
        session(['aksi_route'=>'backend.album.store']);
        $album = new Album();
        $route = 'backend.album.store';
        return view('backend.galeri.formAlbum')->withAlbum($album)->withRoute($route);
    }
    public function store(Request $r){
        $user= Auth::user();
        
        if(session('aksi')== 'edit'){
            $id = $r->id;
            $this->repo->updateAlbum($id, $r,$user);
            return redirect()->route('backend.album.index')->with('flash.success', 'Album berhasil diperbarui');
        }else{
            $this->repo->createAlbum($r,$user);
            return redirect()->route('backend.album.index');
        }
        
    }
    public function edit($id){
        session(['aksi'=>'edit']);
        session(['aksi_route'=>'backend.album.store']);
        $route = 'backend.album.store';
        $album = new Album();
        $albumFind = Album::findOrFail($id);
        return view('backend.galeri.formAlbum')->withAlbum($album)
            ->withRoute($route)
            ->withEdit($albumFind);
    }
    public function update(Request $r, $id){
        $user= Auth::user();
        
    }
    public function destroy($id){
        $user = Auth::user();
        $this->repo->deleteAlbum($id,$user);
        return redirect()->route('backend.album.index')->with('flash.success','Album Berhasil di hapus');
    }
}
