<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Dokumen extends Model{
    protected $table = 'download';

    public function DownloadFile($id){
        ignore_user_abort(true);
        set_time_limit(0); 
        $path = $this->getPathDownload();
         
        //$secret = 'your-secret-string';
         
        if (isset($id) /*&& preg_match('/^([a-f0-9]{32})$/', $id)*/) {
            $dokumen = \App\Dokumen::find($id);    
            if (count($dokumen) == 1) {
                $obj = $dokumen;
                $fullPath = $path.$obj->upload;
                if ($fd = fopen ($fullPath, "r")) {
                    $fsize = filesize($fullPath);
                    $path_parts = pathinfo($fullPath);
                    $ext = strtolower($path_parts["extension"]);
                    switch ($ext) {
                        case "pdf":
                        header("Content-type: application/pdf");
                        header("Content-Disposition: attachment; filename=\"".$path_parts["basename"]."\""); // use 'attachment' to force a file download
                        break;
                        // add more headers for other content types here
                        default;
                        header("Content-type: application/octet-stream");
                        header("Content-Disposition: filename=\"".$path_parts["basename"]."\"");
                        break;
                    }
                    header("Content-length: $fsize");
                    header("Cache-control: private"); //use this to open files directly
                    while(!feof($fd)) {
                        $buffer = fread($fd, 2048);
                        echo $buffer;
                    }
                    \DB::table('download')->update(['hits'=>DB::raw('hits+1')]);
                }else{
                    die("File tidak ditemukan");
                }
                fclose ($fd);
                exit;
            } else {
                die('no match');
            }
        } else {
            //die('missing file ID');
            return redirect()->route('home.download')->with('flash.error','missing file ID');
        }

        return redirect()->route('home.download')->with('flash.success','Data Berhasil di download');
    }

    public function getKategori(){
        $type = DB::select( DB::raw("SHOW COLUMNS FROM $this->table WHERE Field = 'kategori'") )[0]->Type;
        preg_match('/^enum\((.*)\)$/', $type, $matches);
        $enum = array();
        foreach( explode(',', $matches[1]) as $value ){		
            $v = trim( $value, "'" );
            $enum = array_add($enum, $v, $v);
        }
        return $enum;
    }

    public function getPermalinkDownload(){
        return url('files/uploads/dokumen').DIRECTORY_SEPARATOR.'/';
    }

    public function getPathDownload(){
        return public_path('files/uploads/dokumen').DIRECTORY_SEPARATOR.'/';
    }
}
