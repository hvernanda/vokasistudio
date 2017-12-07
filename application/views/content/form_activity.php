        <section class="content-header">
          <h1>
            Aktivitas
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Aktivitas</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-info">
            <div class="box-header wZZith-border">
              <h3 class="box-title">Aktivitas</h3>
            </div>
            <!-- /.box-header -->
            <!-- form st art -->
            <form class="form-horizontal" method="post" action="inputData" >
              <div class="box-body">
              <?php echo $this->session->flashdata('msgfalseproject');?>
              <?php echo $this->session->flashdata('msgtrueproject');?>
                <div class="form-group">
                  <label for="input" class="col-sm-2 control-label">Nama Penugasan</label>

                  <div class="col-sm-8">
                    <select name="penugasan" class="form-control">
                      <!-- <option>--nama penugasan--</option> -->
                      <?php  foreach ($ini as $row) { ?>

                        <option name="penugasan" value="<?php echo $row->id_jobassignment;?>"> <?php echo $row->name;?></option>
                      <?php } ?>                 
                    </select>
                  </div>
                </div>
                <!-- <div class="form-group">
                <select name="idcrew" class="form-control">
                  <option>--penugasan--</option>
                  <?php foreach ($hasil2 as $row) { ?>
                    <option value="<?php echo $row->idjob;?>"> <?php echo $row->nama_job;?></option>
                  ?><?php } ?>                 
                </select>
                </div> -->
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Aktivitas</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputPassword3" placeholder="Aktivitas" name="aktivitas">
                  </div>
                </div>
                <!-- <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Tanggal Aktivitas</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask="" name="date">
                  </div>
                </div> -->
                <!-- <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Waktu mulai</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask="" name="start">
                  </div>
                </div> -->
                <!-- <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Waktu selesai</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask="" name="finish" >
                  </div>
                </div> -->
                <!-- <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Informasi</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputPassword3" placeholder="Informasi" name="informasi">
                  </div>
                </div> -->
                <!-- <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Lokasi File</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputPassword3" placeholder="Lokasi File" name="lokasi_file">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Lokasi Backup File</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputPassword3" placeholder="Lokasi Backup" name="lokasi backup">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Upload File</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputPassword3" placeholder="Upload File" name="upload file">
                  </div>
                </div> -->
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a class="btn btn-danger" href="<?php echo base_url('aktivitas')?>">Kembali</a>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
              <!-- /.box -->
            </div>
          </div>
         <!-- /.row (main row)