<style>
.scrollable-menu {
    height: auto;
    max-height: 100px;
    overflow-x: hidden;
}
</style>
      <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            New Project
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">New Project</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Main row -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Form New Project</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form id="buatProyek" class="form-horizontal"> 
              <!-- method="post" action="<?php //echo site_url('proyek_baru/tambah/'.$id)?>" enctype="multipart/form-data">-->
              <div class="box-body">
              <?php echo $this->session->flashdata('msgfalse');?>
                <div id="message">
                </div>
                <div class="form-group">
                  <label for="input" class="control-label col-sm-2" style="text-align:left">Nama</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="nama" placeholder="nama" name="nama">
                  </div>
                </div>
                 <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label" style="text-align:left">Harga</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="harga" placeholder="harga" name="harga" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label" style="text-align:left">DP</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="dp" placeholder="DP" name="DP" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label" style="text-align:left">Dead Line</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask="" name="deadline" id="deadline">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label" style="text-align:left">Revisi Dead Line</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask="" name="revisideadline" id="revisi">
                  </div>
                </div>
                        <!-- checkbox -->
                        <div class="form-group">
                              <label class="col-sm-2 control-label" style="text-align:left">Tipe Proyek</label> 
                            <div class="col-sm-2">
                              <select class="selectpicker" data-size="5" id="tipeProyek" name="tipeProyek">
                              <option selected disabled>Pilih Tipe</option>
                              <?php foreach($tipeProyek as $tipe){ ?>
                                <option value=<?= $tipe->id_type; ?>><?= $tipe->name; ?></option>
                              <?php } ?>
                            </select>
                            <a href="<?php echo site_url('type')?>">
                            <button type="button" class="btn btn-default">Tambah Tipe</button>
                            </a>
                            </div>
                      </div>
                   <div style="margin-bottom:10px">
                   <input type="text" id="choosenTipe" value="" data-role="tagsinput" readonly="readonly">
                   </div>
                        <!-- select -->
                        <div class="form-group">
                          <label class="col-sm-2">Status</label>
                          <div class="col-sm-8">
                          <select class="form-control" name="status" id="status">
                            <option name="status" value="on process">OnProccess</option>
                            <option name="status" value="canceled">Canceled</option>
                            <option name="status" value="done">Done</option>
                          </select>
                          </div>
                        </div>

                        <div class="form-group">
                        <button type="submit" class="btn btn-default" id="submitProyek">Simpan</button>
                        </div>
                      </div>
                        </form>
                        <div>
                        </div>
                    </div>
            </div>
        </section>
