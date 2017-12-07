<script type="text/javascript">
  function confirmSubmit(){
    var agree = confirm("Apakah Anda Yakin Ingin Menghapus Data Ini?");
    if (agree)
      return true;
    else
      return false;
  }

</script>

<!-- jQuery 2.2.0 -->
<script src="http://localhost:81/vokasistudioss/plugins/jQuery/jQuery-2.2.0.min.js"></script>

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
    <td>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Tambah Penugasan</button>
    </td>
          
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
                  <th>Aksi</th>
                </tr>
                  
                <tbody>
      
          <?php
            $no = 1;
              foreach ($isi as $row){
                // print_r($row);
          ?>  
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $row->name;?></td>
                  <td>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#editModal" data-id=<?php echo $row->id_job ?> data-name=<?php echo $row->name ?> >  <span class="fa fa-fw fa-pencil"></span> </button>
                    <a onclick="return confirmSubmit()" href="<?php echo site_url('master_penugasan/delete/'.$row->id_job)?>" class="btn btn-danger"><span class="fa fa-fw fa-trash"></span></a>
                  </td>
                  <!-- <td>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><span class="fa fa-fw fa-star"></span></button>
                  </td> -->                
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

    <!--  MODAL EDIT -->
    <div class="modal fade" id="editModal" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">EDIT</h4>
          </div>

          <div class="modal-body">
           <form class="form-horizontal" method="post" action="<?php echo site_url('Master_penugasan/prosesEdit')?>" enctype="multipart/form-data">
              
              <input type="hidden" name="id_job">

              <div class="box-body">

                <div class="form-group">
                  <label for="input" class="col-sm-2 control-label">Nama</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputPassword3" placeholder="Tugas" name="name">
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

    <!--MODAL TAMBAH  -->
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Tambah</h4>
          </div>

          <div class="modal-body">
           <form class="form-horizontal" method="post" action="<?php echo site_url('Master_penugasan/tambahJob')?>" enctype="multipart/form-data">
              <input type="hidden" name="id_job"> 
              <div class="box-body">
                <div class="form-group">
                  <label for="input" class="col-sm-2 control-label">Nama</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputPassword3" placeholder="Tugas" name="job">
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
    $("#editModal").on('show.bs.modal',function(event){
      
      var button  = $(event.relatedTarget);
      console.log(button);
      button.data('id');

      var modal = $(this);
      modal.find('input[name="name"]').val(button.data('name'));
      modal.find('input[name="id_job"]').val(button.data('id'));
    });

  }) 
</script>

