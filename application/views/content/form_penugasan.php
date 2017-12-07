
        <section class="content-header">
          <h1>
            Tambah Penugasan
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Penugasan</li>
            <li class="active">Tambah Penugasan</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Penugasan</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post" action="<?php echo site_url('daftar_penugasan/inputData')?>" enctype="multipart/form-data" >
              <div class="box-body">
              <?php echo $this->session->flashdata('msgfalseproject');?>
              <?php echo $this->session->flashdata('msgtrueproject');?>
                <div class="form-group">
                <label for="input" class="col-sm-2 control-label">Tugas</label>
                <div class="col-sm-8">
                  <select name="id_job" class="form-control">
                      <?php foreach ($hasil as $row):?>
                        <option value="<?php echo $row->id_job ?>"> <?php echo $row->name; ?> </option>
                      <?php endforeach; ?>                 
                    </select>
                  </div>
                  </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Detail Penugasan</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputPassword3" placeholder="Nama Job" name="namaJob">
                  </div>
                </div>

                <div class="form-group">
                  <label for="input" class="col-sm-2 control-label">Pilih Kru</label>

                  <div class="col-sm-8">
                    <select name="id_crew[]" class="form-control select2" multiple="multiple">
                      <option disabled>-nama kru-</option>
                      <?php foreach ($hasil2 as $row):?>
                        <option value="<?php echo $row->id_crew ?>"> <?php echo $row->name; ?> </option>
                      <?php endforeach; ?>                 
                    </select>
                    </div>
                  </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Upah</label>

                  <div class="col-sm-8">
                    <input type="number" class="form-control" id="inputPassword3"  name="upah">
                  </div>
                </div>

                <div class="form-group">
                  <label for="input" class="col-sm-2 control-label">Waktu Diterima</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask="" name="diterima">

                  </div>
                </div>
                <div class="form-group">
                  <label for="input" class="col-sm-2 control-label">Waktu Akhir</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask="" name="deadline">
                  </div>
                </div>
                
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a class="btn btn-danger" href="<?php echo base_url('daftar_penugasan')?>">Kembali</a>
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