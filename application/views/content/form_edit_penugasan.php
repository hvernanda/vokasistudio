
        <section class="content-header">
          <h1>
            Penugasan
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Penugasan</li>
            <li class="active">Edit Penugasan</li>
          </ol>
        </section>

        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Penugasan</h3>
            </div>
            <?php foreach ($view as $row):?>
            <form class="form-horizontal" method="post" action="<?php echo site_url('Master_penugasan/prosesEdit/')?>" enctype="multipart/form-data">
              <div class="box-body">
              <?php echo $this->session->flashdata('msgfalseproject');?>
              <?php echo $this->session->flashdata('msgtrueproject');?>
                <div class="form-group">
                  <label for="input" class="col-sm-2 control-label">Nama Penugasan</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputPassword" placeholder="Nama" name="name" value="<?php echo $row->nama;?>">
                  </div>
                  </div>
                  
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a type="text" class="btn btn-danger" href="<?php echo base_url('index.php/master_penugasan')?>">Kembali</a>
              </div>
              <!-- /.box-footer -->
            </form>
          <?php endforeach; ?>
          </div>
              <!-- /.box -->
            </div>
          </div>
         <!-- /.row (main row) -->

    </section>
    <!-- /.content