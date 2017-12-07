
        <section class="content-header">
          <h1>
            Upload File
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Upload</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Upload File</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post" action="<?php echo site_url('Aktivitas/do_upload')?>" enctype="multipart/form-data">
              <div class="box-body">
              <?php echo $this->session->flashdata('msgfalseproject');?>
              <?php echo $this->session->flashdata('msgtrueproject');?>
                <div class="form-group">
                  <label for="input" class="col-sm-2 control-label">Upload</label>
                  
                  <div class="col-sm-8">
                  <input type="hidden" name="id_activity" value="<?php echo $this->uri->segment(3);?>">
                    <input type="file" class="form-control" id="file_upload" placeholder="Upload" name="file_upload">
                  </div>
                </div>
                
                
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a class="btn btn-danger" href="<?php echo base_url('index.php/aktivitas')?>">Kembali</a>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
            </div>
          </div>
         <!-- /.row (main row) -->

    </section>
    <!-- /.content