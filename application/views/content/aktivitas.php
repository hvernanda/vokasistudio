<section class="content-header">

<!-- jQuery 2.2.0 -->
<script src="http://localhost:81/vokasistudioss/plugins/jQuery/jQuery-2.2.0.min.js"></script>

  <h1>
    Aktivitas
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
    <li class="active">Aktivitas</li>
  </ol>
</section>

<div class="btn-normal">
    <a href="<?php echo site_url('Aktivitas/tambahAktivitas')?>">
        <button type="button" class="btn btn-primary">Tambah Aktivitas</button>
    </a>
    <!-- <a href="#" id="download">
        <button type="button" class="btn btn-warning">Backup File</button>
    </a> -->
          
</div>
<section class="content">
      <div class="row">
        <div class="col-md-12">
         <div class="box">
              <?php echo $this->session->flashdata('msgfalseproject');?>
              <?php echo $this->session->flashdata('msgtrueproject');?>
            <div class="box-header">
              <h3 class="box-title">Aktivitas</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="tabel" class="table table-responsive no-padding">
                <table class="table table-hover">
                <thead>
                <tr>
                  <th>Tugas</th>
                  <th>Detail Penugasan</th>
                  <th>Nama Aktivitas</th>
                  <th>Tanggal Aktivitas</th>
                  <th>Waktu Mulai</th>
                  <th>Waktu Selesai</th>
                  <th>Lokasi</th>
                  <!-- <th>Lokasi Backup</th> -->
                  <th>Upload File</th>

                  
                </tr>
                  
                <tbody>
      
                <tr>
          <?php
            $no = 1;
              foreach ($isi as $row){
                // print_r($row);
          ?>
                    <td><?php echo $row->tugas;?></td>
                    <td><?php echo $row->name;?></td>
                    <td><?php echo $row->aktivitas;?></td>
                    <td><?php echo empty($row->tanggal)?'':date('d F Y',strtotime($row->tanggal));?></td>
                    <td><?php echo empty($row->mulai)?'':date('h:i:s',strtotime($row->mulai));?></td>
                    <td><?php echo empty($row->selesai)?"<button class='btn btn-primary btn-end-time' data-id='$row->id_activity'><i class='fa fa-clock-o' aria-hidden='true'></i></button>":date('h:i:s',strtotime($row->selesai));?></td>
                    <!-- <td><?php echo $row->lokasi;?></td> -->
                    <!-- <td><?php echo $row->lokasi_backup;?></td> -->
                    <td>
                      <button type="button" class='btn btn-primary btn-save-location' data-toggle="modal" data-target="#myModalLokasi" data-id="<?php echo $row->id_activity ?>" >Lokasi</button>
                    </td>
                    <td>
                    <a href="<?php echo site_url('aktivitas/form_upload/'.$row->id_activity)?>" class="btn btn-primary"><span class="fa fa-fw fa-file-code-o"></span></a>
                    </td>

                  </tr>

          <?php 
            }
          ?>

                  </tbody>
                       
                </thead>
                
                
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
    </div>
    </div>
 <!--SIMPAN LOKASI  -->
    <div class="modal fade" id="myModalLokasi" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Modal Lokasi</h4>
          </div>
          <div class="modal-body">
           <form class="form-horizontal" method="post" action="<?php echo site_url('aktivitas/setLokasi')?>" enctype="multipart/form-data">
              <input type="hidden" name="id_act"> 
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Komputer</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputPassword3" name="komputer">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">File Lokasi</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputPassword3" name="lokasi">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">File Backup Lokasi</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputPassword3" name="backup">
                  </div>
                </div> 
             <!-- /.box-body -->
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
              <!-- /.box-footer -->
              </div>
            </form>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>  
    </div>
           
</section>
<script type="text/javascript">
    $(document).ready(function(){
    $("#myModalLokasi").on('show.bs.modal',function(event){
      
      var button  = $(event.relatedTarget);
      console.log(button);
      button.data('id');

      var modal = $(this);
      modal.find('input[name="id_act"]').val(button.data('id'));
    });

  }) 
</script>


<script type="text/javascript">
  $(document).on('click','.btn-end-time',function(){
    // alert('halo');
    var button = $(this);
    var id     = button.data('id');
    $.ajax({
      url   : "<?php echo site_url('aktivitas/setEndTime') ?>",
      type  : 'post',
      data  : {
        _id   : id
      },
      success : function(e){
        console.log(e);
        if (e!='failed') {
          button.parent().html(e);
        } else{
          alert('gagal')
        };
      },
      error   : function(e){
        console.log(e);
      },
    })
  })
</script>
