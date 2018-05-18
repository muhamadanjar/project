<?php namespace App\Map;

interface RepositoryInterface {
    public function getlayer();
    public function getgroups();
    public function getlayeresri();
    public function getgroupsesri();
    public function find($id);
    public function delete($id);
    public function postLayer($request,$aksi,$id);
    public function countlayer($group);
}