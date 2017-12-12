<?php namespace App\AuditTrail\Activity;

use App\AuditTrail\Revision;
use DB;
class EloquentRepository implements RepositoryInterface {
    private $activity;
    
    private $revision;

    function __construct(Activity $activity, Revision $revision){
        $this->activity = $activity;
        $this->revision = $revision;
    }

    public function insert($subject, $predicate, $object = null, $note = null, $parentId = null){
        $data = [
            //'case_id'      => $case->getKey(),
            'subject_id'   => $subject->getKey(),
            'subject_type' => get_class($subject),
            'predicate'    => $predicate,
            'object_id'    => $object->getKey(),
            'object_type'  => get_class($object),
            'note'         => $note,
            'parent_id'    => $parentId,
        ];

        return $this->activity->create($data);
    }

    public function paginate($keyword){
        $query = $this->activity
            ->select('log_activities.*', /*'cases.kasus',*/ 'users.name')
            //->join('cases', 'case_id', '=', 'cases.id')
            ->join('users', 'subject_id', '=', 'users.id')
            ->orderBy('created_at' ,' desc');

        if($keyword){
            $query->where('users.name', 'like', "%$keyword%");
        }

        return $query->paginate();
    }

    public function find($id){
        return $this->activity->findOrFail($id);
    }

    public function UpdateStatistik(){
        $ip      = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
        $tanggal = date("Y-m-d"); // Mendapatkan tanggal sekarang
        $waktu   = time(); // 
        $s = DB::table('statistik')->where('ip',$ip)->where('tanggal',$tanggal);
        
        // Kalau belum ada, simpan data user tersebut ke database
        if($s->count() == 0){
            DB::table('statistik')->insert(['ip'=>$ip,'tanggal'=>$tanggal,'hits'=>1,'online'=>$waktu]);
        } else{
            DB::table('statistik')->where('ip',$ip)->where('tanggal',$tanggal)->update(['hits'=>DB::raw('hits+1'),'online'=>$waktu]);
        }
        /*$pengunjung       = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE tanggal='$tanggal' GROUP BY ip"));
        $totalpengunjung  = mysql_result(mysql_query("SELECT COUNT(hits) FROM statistik"), 0); 
        $hits             = mysql_fetch_assoc(mysql_query("SELECT SUM(hits) as hitstoday FROM statistik WHERE tanggal='$tanggal' GROUP BY tanggal")); 
        $totalhits        = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik"), 0); 
        $tothitsgbr       = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik"), 0); 
        $bataswaktu       = time() - 300;
        $pengunjungonline = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE online > '$bataswaktu'"));*/
    }
    public function hits(){
        $tanggal = date("Y-m-d");
        $hits = DB::table('statistik')->select(DB::Raw('SUM(hits) as hitstoday'))->where('tanggal',$tanggal)->groupBy('tanggal')->first(); 
        $hitstoday = ($hits==null) ? 0 : $hits->hitstoday ;
        return $hitstoday;
    }
    public function totalhits(){
        return DB::table('statistik')->sum('hits');
    }
    
    public function pengunjungonline($bataswaktu){
        return DB::table('statistik')->where('online','>',$bataswaktu)->count();
    }

    public function totalpengunjung(){
        return DB::table('statistik')->count('hits');
    }

    

    //public function revisionsByActivity($id)
    //{
    //    return $this->revision->where('activity_id', '=', $id)->get();
    //}
}