<!-- Modal Dialog -->
<div class="modal fade" id="frmKuesioner" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Tutup</span></button>
        <h4 class="modal-title" id="frm_title">Delete</h4>
      </div>
      <div class="modal-body" id="frm_body"></div>
      <div class="modal-footer">
        <button style='margin-left:10px;' type="button" class="btn btn-primary col-sm-2 pull-left" id="frm_submit">Yes</button>
        <button type="button" class="btn btn-danger col-sm-2 pull-right" data-dismiss="modal" id="frm_cancel">No</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal Dialog -->
<div class="modal fade" id="formConfirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Tutup</span></button>
        <h4 class="modal-title" id="frm_title">Delete</h4>
      </div>
      <div class="modal-body" id="frm_body"></div>
      <div class="modal-footer">
        <button style='margin-left:10px;' type="button" class="btn btn-primary col-sm-2 pull-right" id="frm_submit">Yes</button>
        <button type="button" class="btn btn-danger col-sm-2 pull-right" data-dismiss="modal" id="frm_cancel">No</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="formModalMap" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Tutup</span></button>
        <h4 class="modal-title" id="frm_title">Info</h4>
      </div>
      <div class="modal-body" id="frm_body"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger col-sm-2 pull-right" data-dismiss="modal" id="frm_cancel">Tutup</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="mainMenuMap" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Tutup</span></button>
        <h4 class="modal-title" id="frm_title">Main Menu Map</h4>
      </div>
      <div class="modal-body" id="frm_body">
        <div class="row">
         
          <section class="col-md-3">
            <div class="box box-success">
              <div class="box-header">
                <i class="fa fa-comments-o"></i>
                <h3 class="box-title">Tipe PJU</h3>
              </div>
              <div class="box-body modal-box" id="tipepju-box">
                <ul class="layer-maps list-unstyled">
                      <?php 
                      if (isset($maptipepju)) {
                        foreach ($maptipepju AS $row) {?>
                        <div class="form-group">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" class="checkbox tipe_pju" id="<?php echo $row->tipe_pju ?>" name="<?php echo $row->tipe_pju ?>" value="<?php echo $row->id_pju ?>">
                              <?php echo $row->tipe_pju ?>
                            </label>
                          </div>

                        </div>

                      <?php 
                        }
                      } 
                      ?>

                </ul>
                
              </div>
              
              
            </div>
            

          </section>
          <section class="col-md-3">
            <div class="box box-success">
              <div class="box-header">
                <i class="fa fa-comments-o"></i>
                <h3 class="box-title">Kondisi PJU</h3>
              </div>
              <div class="box-body modal-box" id="tipepju-box">
                <ul class="layer-maps list-unstyled">
                      <?php 
                      if (isset($kondisi)) {
                        foreach ($kondisi AS $row) {?>
                        <div class="form-group">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" class="checkbox kondisi_pju" id="<?php echo $row->kondisi_pju ?>" name="<?php echo $row->kondisi_pju ?>" value="<?php echo $row->id_kondisi ?>">
                              <?php echo $row->kondisi_pju ?>
                            </label>
                          </div>

                        </div>

                      <?php 
                        }
                      } 
                      ?>

                </ul>
                
              </div>
              
              
            </div>
            

          </section>
          <section class="col-md-3">
            <div class="box box-success">
              <div class="box-header">
                <i class="fa fa-comments-o"></i>
                <h3 class="box-title">Fungsi Jalan</h3>
              </div>
              <div class="box-body modal-box" id="fungsijalan-box">
                <ul class="layer-maps list-unstyled">
                      <?php 
                      if (isset($fungsijalan)) {
                        foreach ($fungsijalan AS $row) {?>
                        <div class="form-group">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" class="jaringanjalan_map" id="<?php echo $row->id_line ?>" name="<?php echo $row->nama_line ?>" value="<?php echo $row->id_line ?>" data-kodeline="<?php echo $row->kode_line ?>" checked>
                              <?php echo $row->nama_line ?>
                            </label>
                          </div>

                        </div>

                      <?php 
                        }
                      } 
                      ?>

                  </ul>
                
              </div>
              
              
            </div>
            

          </section>
          <section class="col-md-3">
            <div class="box box-success">
              <div class="box-header">
                <i class="fa fa-comments-o"></i>
                <h3 class="box-title">Administrasi</h3>
              </div>
              <div class="box-body modal-box" id="chat-box">
                <div class="item">
                  <ul class="layer-maps list-unstyled">
                      <?php 
                      if (isset($admin)) {
                        foreach ($admin AS $k => $row) {?>
                        <div class="form-group">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" class="checkbox administrasi" id="<?php echo $row->nama_layer ?>" name="<?php echo $row->nama_layer ?>" data-kodelayer="{{$k}}" checked value="<?php echo $row->id_layer ?>">
                              <?php echo $row->nama_layer ?>
                            </label>
                          </div>

                        </div>

                      <?php 
                        }
                      } 
                      ?>

                  </ul>
                </div>
                <!-- /.item -->
              </div>
              <!-- /.chat -->
            </div>
          </section>
          
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger col-sm-2 pull-right" data-dismiss="modal" id="frm_cancel">Tutup</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="formPjuSearch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Tutup</span></button>
        <h4 class="modal-title" id="frm_title">Cari Keterangan</h4>
      </div>
      <div class="modal-body" id="frm_body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
                <label for="kecamatan">Kecamatan</label>
                <select name="kecamatan_filter" class="form-control" id="kecamatan_filter">
                  <option value="">-----</option>
                  <option value="320204">Bantar Gadung</option>
                </select>
            </div>

            <div class="form-group">
                <label for="kecamatan">Kelurahan/Desa</label>
                <select name="kelurahan_filter" class="form-control" id="kelurahan_filter">
                  <option value="">-----</option>
                  
                </select>
            </div>

            <div class="form-group">
                <label for="namajalan_filter">Nama Jalan</label>
                <select name="namajalan_filter" class="form-control" id="namajalan_filter">
                  <option value="">-----</option>
                </select>
            </div>

            <div class="form-group">
                <label for="statusjalan_filter">Status Jalan</label>
                <select name="statusjalan_filter" class="form-control" id="statusjalan_filter">
                  <option value="">-----</option>
                </select>
            </div>
            <div class="form-group">
                  <label for="tipepju_filter">Tipe PJU</label>
                  <select name="tipepju_filter" class="form-control" id="tipepju_filter">
                    <option value="">-----</option>
                  </select>
            </div>

            
          </div>
          <div class="col-md-6">
              
              <div class="form-group">
                  <label for="tipepju_filter">Jenis Lengan</label>
                  <select name="jenislengan_filter" class="form-control" id="jenislengan_filter">
                    <option value="">-----</option>
                  </select>
              </div>
              <div class="form-group">
                  <label for="tipepju_filter">Jenis Tiang</label>
                  <select name="jenistiang_filter" class="form-control" id="jenistiang_filter">
                    <option value="">-----</option>
                  </select>
              </div>
              <div class="form-group">
                  <label for="tipepju_filter">Jenis Lampu</label>
                  <select name="jenislampu_filter" class="form-control" id="jenislampu_filter">
                    <option value="">-----</option>
                  </select>
              </div>

              <div class="form-group">
                  <label for="tipepju_filter">Kondisi</label>
                  <select name="kondisi_filter" class="form-control" id="kondisi_filter">
                    <option value="">-----</option>
                  </select>
              </div>
          </div>
        </div>      
        

      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-danger col-sm-2 pull-right" data-dismiss="modal" id="frm_cancel">Tutup</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="formPengawasanSearch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Tutup</span></button>
        <h4 class="modal-title" id="frm_title">Cari Keterangan</h4>
      </div>
      <div class="modal-body" id="frm_body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
                <label for="kecamatan">Kecamatan</label>
                <select name="kecamatan_filter" class="form-control" id="kecamatan_filter_pengawasan">
                  <option value="">-----</option>
                  <option value="320204">Bantar Gadung</option>
                </select>
            </div>

            <div class="form-group">
                <label for="kecamatan">Kelurahan/Desa</label>
                <select name="kelurahan_filter" class="form-control" id="kelurahan_filter_pengawasan">
                  <option value="">-----</option>
                  
                </select>
            </div>

            <div class="form-group">
                <label for="namajalan_filter">Nama Jalan</label>
                <select name="namajalan_filter" class="form-control" id="namajalan_filter_pengawasan">
                  <option value="">-----</option>
                </select>
            </div>

            
          </div>
          <div class="col-md-6">
              
            

              <div class="form-group">
                  <label for="tipepju_filter">Kondisi</label>
                  <select name="kondisi_filter" class="form-control" id="kondisi_filter_pengawasan">
                    <option value="">-----</option>
                  </select>
              </div>
          </div>
        </div>      
        

      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-danger col-sm-2 pull-right" data-dismiss="modal" id="frm_cancel">Tutup</button>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="lpmModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Tutup</span></button>
        <h4 class="modal-title" id="frm_title">Lihat Laporan Masyarakat</h4>
      </div>
      <div class="modal-body" id="frm_body">
        <div class="row">
          
        </div>      
        

      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-danger col-sm-2 pull-right" data-dismiss="modal" id="frm_cancel">Tutup</button>
      </div>
    </div>
  </div>
</div>
