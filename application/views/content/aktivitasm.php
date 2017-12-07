

<!-- jQuery 2.2.0 -->
<script src="http://localhost:81/vokasistudioss/plugins/jQuery/jQuery-2.2.0.min.js"></script>

<section class="content-header">
  <h1>
    Aktivitas
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
    <li class="active">Aktivitas</li>
  </ol>
</section>

<!-- <div class="btn-normal">
    <a href="<?php echo site_url('Aktivitas/tambahAktivitas')?>">
            <button type="button" class="btn btn-primary">Tambah Aktivitas</button>
    </a>
          
</div> -->
<section class="content">
      <div class="row">
        <div class="col-md-12">
         <div class="box">
            <div class="box-header">
              <h3 class="box-title">Aktivitas</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="tabel" class="table table-responsive no-padding">
                <table class="table table-hover">
                <thead>
                <tr>
                  <th>Nama Kru</th>
                  <th>Tugas</th>
                  <th>Detail Tugas</th>
                  <th>Nama Aktivitas</th>
                  <th>Tanggal Aktivitas</th>
                  <th>Lokasi File</th>
                  <th>Download File</th>
                  <th>Komentar</th>
                </tr>
                  
                <tbody>
      
                <tr>
          <?php
            $no = 1;
              foreach ($isi as $row){
                // var_dump($row)
          ?>
                    <td><?php echo $row->nama;?></td>
                    <td><?php echo $row->tugas;?></td>
                    <td><?php echo $row->name;?></td>
                    <td><?php echo $row->aktivitas;?></td>
                    <td><?php  $tgl = date('d F Y',strtotime($row->tanggal)); echo $tgl;?></td>
                    <td>
                      <button type="button" class='btn btn-primary' data-toggle="modal" data-target="#myModalLokasi" data-id="<?php echo $row->id_activity ?>" data-komputer="<?php echo $row->komputer ?>" data-lokasi="<?php echo $row->lokasi ?>" data-backup="<?php echo $row->lokasi_backup ?>" >Lokasi File</button>
                    </td>
                    <td>
                      <?php
                        if($row->upload!=""){
                          echo "<a href=".site_url('aktivitasm/download/'.$row->id_activity)." >Download</a>";
                        }else{
                          echo "Tidak Ada";
                      }
                      ?> 
                    </td>
                    <td>
                    <?php
                    if ($row->komentar!=''||$row->komentar!=null) {
                      echo $row->komentar;
                    }else{?>

                      <button type="button" id="komen-<?php echo $row->id_activity ?>" class="btn btn-primary " data-uniq= "<?php echo $row->id_activity ?>" data-toggle="modal" data-target="#myModal"><span class="fa fa-fw fa-star"></span></button>    
                    <?php 
                    }
                    ?>
                      
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

 <!--SIMPAN LOKASI  -->
    <div class="modal fade" id="myModalLokasi" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Modal Lokasi</h4>
          </div>
          <div class="modal-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Komputer</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputPassword3" name="komputer" disabled>
                  </div>
                </div>
                </div>
                <div class="modal-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">File Lokasi</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputPassword3" name="lokasi" disabled>
                  </div>
                </div>
                </div>
                <div class="modal-body">
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">File Backup Lokasi</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputPassword3" name="backup" disabled>
                  </div>
                </div> 
                </div>


          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>  
    </div>

    <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Komentar</h4>
        </div>
        <div class="modal-body">
        <input type="hidden" id="uniq">        
         <div class="form-horizontal" method="" action="" enctype="">
              <div class="box-body">
              <!-- <?php echo $this->session->flashdata('msgfalseproject');?> -->
              <!-- <?php echo $this->session->flashdata('msgtrueproject');?> -->
                <div class="form-group">
                  <label for="input" class="col-sm-2 control-label">Komentar</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputPassword3" placeholder="Komentar" name="commentByManager">
                  </div>
                </div>
                
              <!-- /.box-body -->
              <div class="box-footer">
                <button class="btn btn-primary btn-save-komen">Simpan</button>
              </div>
              <!-- /.box-footer -->
            </div>
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
     

      var komp;
      var lok;
      var back;
      if (button.data('komputer') =="") {
        komp = "Belum diisi";
      } else{
        komp = button.data('komputer');
      };
      if (button.data('lokasi') =="") {
        lok = "Belum diisi";
      } else{
        lok = button.data('lokasi');
      };
      if (button.data('backup') =="") {
        back = "Belum diisi";
      } else{
        back = button.data('backup');
      };
      var modal = $(this);
      modal.find('input[name="komputer"]').val(komp);
      modal.find('input[name="lokasi"]').val(lok);
      modal.find('input[name="backup"]').val(back);
      modal.find('input[name="id"]').val(button.data('id'));

    });

  }) 
</script>

<script type="text/javascript">
$(document).ready(function(){

  $('#myModal').on('show.bs.modal',function(event){
    $('#inputPassword3').val('');
    var button = $(event.relatedTarget);
    $('#uniq').val(button.data('uniq'));  
  });

})

  $(document).on('click','.btn-save-komen',function(){
    var id  = $('#uniq').val();
    var val = $('#inputPassword3').val();
    var button  = $(this);
    // console.log(val);
    $.ajax({  
      url       :"<?php echo site_url('aktivitasm/setKomen') ?>",
      type      :'post',
      // dataType  : 'json',
      data      :{
        _id   : id,
        _val  : val,
      },
      success  : function(e){
        // console.log(e)
        if (e!='failed') {
          // alert('score berhasil dimasukkan ke sistem.');
          // console.log(button);
          $('#komen-'+id).parent().html(e);
          $('#myModal').modal('hide');

        }else{
          alert('Kolom Komen Harus di Isi');
        };
      },
      error   : function(e){
        console.log(e);
      }
    });
  });
</script>


