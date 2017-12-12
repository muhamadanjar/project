<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Gallery\Media;
use App\Gallery\Album;
use App\Gallery\RepositoryInterface as MediaRepo;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use App\Post\RepositoryInterface;
class MediaCtrl extends BackendCtrl{
    private $post;
    private $media;
    public function __construct(RepositoryInterface $postRepo,MediaRepo $mediaRepo){
        $this->post = $postRepo;
        $this->media = $mediaRepo;
        $this->middleware('auth',['except'=>'show']);
    }
    public function show($medium){
        $media = Media::where('filename', $medium)->firstOrFail();
        $headers = [
            'Content-Type' => $media->mime_type,
            'Content-Disposition' => "filename='{$media->original_filename}'"
        ];

        return response()->file($media->getPath(), $headers);
    }

    public function index(Request $r){
        $type = $r->get('type', 'media');
        $media = Media::orderBy('id','asc')->get();
        $album = Album::orderBy('id','asc')->get();
        $count['media'] = $this->media->count();
        $count['album'] = $this->media->countAlbum();
        return view('backend.galeri.index', compact('album','media','count', 'type'));
    }

    public function edit(){
        
    }

    public function destroy($id){
        $media = Media::find($id);
        unlink(Media::getPermalinkMedia().$media->original_filename);
        $media->delete();
        return redirect()->route('backend.media.index');
    }

    public function create(Request $request){
        $media = new Media();
        $album = Album::all();
        $type = $request->get('type');
        return view('backend.galeri.form', compact('media','album','type'));
    }

    public function store(Request $input){
        $user = Auth::user();
        if($input->hasFile('file') && $input->file('file')->isValid()){
            $file = $input->file('file');
            $destination = public_path().DIRECTORY_SEPARATOR.'images/uploads';/*$this->fileManager->filePath($input->get('path'));*/
            $file->move($destination, $file->getClientOriginalName());

            $media = new Media();
            $media->filename = File::name($file->getClientOriginalName());
            $media->original_filename = $file->getClientOriginalName();
            $media->mime_type = File::mimeType($destination.DIRECTORY_SEPARATOR.$file->getClientOriginalName());
            $media->album_id = $input->album_id;
            $media->author()->associate($user);
            $media->save();
            
            return redirect()->route('backend.media.index')->with('flash.success', 'Upload file '.File::name($file->getClientOriginalName()).' berhasil ');
        }

        return redirect()->back()->with('flash.error', 'Upload file gagal');
        
    }

    public function update(){
        
    }

    public function postimage(){
        return $this->post->postfeatureimage('/images/uploads/gallery/');
    }
}
