      <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>&nbsp;
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Tipe Proyek</li>
          </ol>
        </section>
   
        <section class="content">
     <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Daftar Tipe</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama Tipe</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
               <?php foreach ($view_type as $key) { ?> 
                <?php if ($key->visibility == 0){ ?>
                <tr>
                  <td><?= $key->name;?></td>
                  <td><a class ="fa fa-fw fa-ban" href="<?php echo site_url('type/delete/'.$key->id_type)?>" onclick="return confirm('Are you sure you want to delete this item?');">
                  </a></td>
                </tr>
             
               <?php }  }?>
                </tbody>
              </table>
              </div>
            </div>  
          </section>
 

    <section class="content">

          <!-- Main row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Form New Type</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post" action="<?php echo site_url('type/tambah')?>" enctype="multipart/form-data">
              <div class="box-body">
              
              <?php echo $this->session->flashdata('msgfalse');?>
              <?php echo $this->session->flashdata('msgtrue');?>
                <div class="form-group">
                  <label for="input" class="col-sm-2 control-label">Nama Type</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputType" placeholder="type" name="type">
                  </div>
                </div>

                <div class="box-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
               
              </div>
            </form>
            </div>
              <!-- /.box-body -->
            
              <!-- /.box-footer -->
          </div>
              <!-- /.box -->
        </div>
    </section>
     

           
   