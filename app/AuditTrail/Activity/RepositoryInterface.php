<?php namespace App\AuditTrail\Activity;

interface RepositoryInterface {

    public function insert($subject, $predicate, $object = null, $note = null, $parentId = null);

    public function paginate($keyword);

    public function find($id);

    public function UpdateStatistik();
    public function hits();
    public function totalhits();
    public function pengunjungonline($bataswaktu);
    public function totalpengunjung();
}