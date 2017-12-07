          <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            New Contact
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">New Contact</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Form New Contact</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
             <form class="form-horizontal" method="post" action="<?php echo site_url('kontak_baru/tambah/'.$id_company)?>" enctype="multipart/form-data">
              <div class="box-body">
              <?php echo $this->session->flashdata('msgfalse');?>
              <?php echo $this->session->flashdata('msgtrue');?>
                <div class="form-group">
                  <label for="input" class="col-sm-2 control-label">Nama</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="nama" name="nama">
                  </div>
                </div>
                <div class="form-group">
                  <label for="input" class="col-sm-2 control-label">Phone</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="phone" name="phone">
                  </div>
                </div>
                <div class="form-group">
                  <label for="input" class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="email" name="email">
                  </div>
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
    <!-- /.content -->

   