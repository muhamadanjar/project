<?php namespace App\Gallery;

interface RepositoryInterface {

    public function all();
    
    public function get();

    public function create($input, $user);

    public function update($id, $input, $user);

    public function find($id);

    public function delete($id, $user);

    public function search($keyword, $type = null, $includeDraft = false, $owner = null);

    public function prepareSearch($keyword, $type, $includeDraft, $me);

    public function countSearch($keyword, $type = null, $includeDraft = false, $me=false);

    public function count();
    
    public function getRandomMedia($count);
    
    public function getAlbum();
    
    public function findAlbum($id);

    public function createAlbum($input, $user);

    public function updateAlbum($id, $input, $user);

    public function deleteAlbum($id, $user);

    public function countAlbum();

    public function getMediaVideoPly();
    
    public function getMediaVideo();
    
    

}
