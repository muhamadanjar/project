<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Dokumen;

class DokumenCtrl extends Controller
{
    public $secret = 'simpju_download';
    public function __construct($value='')
    {
        $this->middleware('auth');
    }
    public function getIndex(){
        $dokumen = Dokumen::get();
        if (auth()->user()->isRole('admin')) {
            $view = 'dokumen.index';
        }else{
            $view = 'dokumen.download';
        }
    	return view($view)->with('dokumen',$dokumen);
    }

    public function getTambah(){
    	if (Gate::check('create.dokumen')) {
            session(['aksi'=>'add']);
            return view('dokumen.tambah');
        }
        return redirect('/dokumen')->withInfo('Anda Tidak diijinkan Mengakses Halaman ini');
    }

    public function getEdit($id){
        if (Gate::check('edit.dokumen')) {
        	session(['aksi'=>'edit']);
            $dokumen = Dokumen::find($id);
        	return view('dokumen.tambah')->withDokumen($dokumen);
        }
        return redirect('/dokumen')->withInfo('Anda Tidak diijinkan Mengakses Halaman ini');
    }

    public function postDokumen(Request $r){
        try {
            $dokumen = (session('aksi') == 'edit') ? Dokumen::find($r->id) : new Dokumen;
            $dokumen->judul_dokumen = $r->judul_dokumen;
            $dokumen->tanggal = $r->tanggal;
            if ($r->upload != null) {
                
                $fupload = $r->file('upload');
                $vdir_upload ='files/uploads';
                $fileName=str_random(20) . '.' . $fupload->getClientOriginalExtension();
                $destinationPath = public_path().'/'.$vdir_upload;
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0777);
                } else {
                }
                $fuploadName = $fupload->getClientOriginalName();
                $fupload->move($destinationPath, $fileName);
                $lokasi_file = $destinationPath.'/'.$fileName;
                $dokumen->upload = $fileName;
            }
            $dokumen->save();
            return redirect('dokumen');
        } catch (Exception $e) {
            
        }
    }

    public function postDelete($id){
        if (Gate::check('edit.dokumen')) {
            $dokumen = Dokumen::find($id);
            $dokumen->delete();
            return redirect('dokumen');
        }
        return redirect('/dokumen')->withInfo('Anda Tidak diijinkan Mengakses Halaman ini');
    }

    public function postDownload($id){
        

        ignore_user_abort(true);
        set_time_limit(0); 
        $path = public_path("files/uploads/");
         
        //$secret = 'your-secret-string';
         
        if (isset($id) /*&& preg_match('/^([a-f0-9]{32})$/', $id)*/) {
            $dokumen = Dokumen::find($id);    
            
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


                }else{
                    die("File tidak ditemukan");
                }
                fclose ($fd);
                exit;
            } else {
                die('no match');
            }
        } else {
            die('missing file ID');
        }
    }

    public function download($value=''){
        ignore_user_abort(true);
        set_time_limit(0); // disable the time limit for this script
         
        $path = "/absolute_path_to_your_files/"; // change the path to fit your websites document structure
         
        $dl_file = preg_replace("([^\w\s\d\-_~,;:\[\]\(\).]|[\.]{2,})", '', $_GET['download_file']); // simple file name validation
        $dl_file = filter_var($dl_file, FILTER_SANITIZE_URL); // Remove (more) invalid characters
        $fullPath = $path.$dl_file;
         
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
        }
        fclose ($fd);
        exit;
    }
}
