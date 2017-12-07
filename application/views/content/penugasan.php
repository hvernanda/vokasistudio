<script type="text/javascript">
  function confirmSubmit(){
    var agree = confirm("Hapus?");
    if (agree)
      return true;
    else
      return false;
  }

</script>

<section class="content-header">
  <h1>
    Penugasan
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
    <li class="active">Penugasan</li>
  </ol>
</section>

<div class="box-body btn-normal">
  <a href="<?php echo site_url('penugasan/tambahPenugasan')?>">
            <button type="button" class="btn btn-primary">Tambah Penugasan</button>
    </a>
          
</div>
<section class="content">
      <div class="row">
        <div class="col-md-12">
         <div class="box">
         <?php echo $this->session->flashdata('msgfalseproject');?>
          <?php echo $this->session->flashdata('msgtrueproject');?>
            <div class="box-header">
              <h3 class="box-title">Penugasan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="tabel" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Penugasan</th>
                  <th>Nama Kru</th>
                  <th>Waktu Diterima</th>
                  <th>Waktu Selesai</th>
                  <th>Aksi</th>
                  <th>Nilai</th>
                </tr>
                  
                <tbody>
      
          <?php
            $no = 1;
              foreach ($isi as $row){
          ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $row->penugasan;?></td>
                  <td><?php echo $row->nama;?></td>
                  <td><?php echo $row->diterima;?></td>
                  <td><?php echo $row->deadline;?></td>
                  <td>
                    <!-- <a href="<?php echo site_url('Activitas/detail/'.$row->id_jobassignment)?>">detail</a> -->
                    <!-- <a href="<?php echo site_url('penugasan')?>" class="btn btn-primary"><span class="fa fa-fw fa-reorder"></span></a> -->
                    <a href="<?php echo site_url('penugasan/edit/'.$row->id_jobassignment)?>" class="btn btn-success"><span class="fa fa-fw fa-pencil"></span></a>
                    <a onclick="return confirmSubmit()" href="<?php echo site_url('penugasan/delete/'.$row->id_jobassignment)?>" class="btn btn-danger"><span class="fa fa-fw fa-trash"></span></a>
                  </td>
                  <td>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><span class="fa fa-fw fa-star"></span></button>
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
    <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
         <form class="form-horizontal" method="post" action="<?php echo site_url('Penugasan')?>" enctype="multipart/form-data">
              <div class="box-body">
              <?php echo $this->session->flashdata('msgfalseproject');?>
              <?php echo $this->session->flashdata('msgtrueproject');?>
                <div class="form-group">
                  <label for="input" class="col-sm-2 control-label">Penilaian</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputPassword3" placeholder="Nilai" name="nilai">
                  </div>
                </div>
                
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
              <!-- /.box-footer -->
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
</section>

