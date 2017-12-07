
        <section class="content-header">
          <h1>
            Tambah Komentar
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Komentar</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Komentar</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post" action="<?php echo site_url('Progresproject/beriKomen')?>" enctype="multipart/form-data">
              <div class="box-body">
              <?php echo $this->session->flashdata('msgfalseproject');?>
              <?php echo $this->session->flashdata('msgtrueproject');?>
                <div class="form-group">
                  <label for="input" class="col-sm-2 control-label">Komentar</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputPassword" placeholder="Komentar" name="komen">
                  </div>
                </div>
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
              <!-- /.box -->
            </div>
          </div>
         <!-- /.row (main row) -->

    </section>
    <!-- /.content