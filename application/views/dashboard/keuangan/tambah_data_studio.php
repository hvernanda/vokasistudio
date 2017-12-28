          <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Tambah Data Transaksi Vokasi Studios
          </h1>
<!--           <ol class="breadcrumb">
            <li><a href="<?php echo site_url('home') ?>"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
            <li class="active"><a href="<?php echo site_url('keuangan_vokasi_studios') ?>">Keungan Vokasi Studios</a></li>
            <li class="active">Data Transaksi Vokasi Studios</li>
          </ol> -->
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-info">
<!--             <div class="box-header with-border">
              <h3 class="box-title">Tambah Data Keuangan Vokasi Studios</h3>
            </div> -->
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post" action="<?php echo site_url('keuangan/inputDataTransaksiVokasi')?>" enctype="multipart/form-data">
              <div class="box-body">
              <?php echo $this->session->flashdata('msgfalse');?>
              <?php echo $this->session->flashdata('msgtrue');?>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Jumlah Uang</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputPassword3" placeholder="Jumlah Uang" name="amount" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Tanggal</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" placeholder="yyyy-mm-dd" data-mask="" name="date">
                  </div>
                </div> 
                <div class="form-group">
                  <label for="input" class="col-sm-2 control-label">Keperluan</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Keperluan" name="keperluan">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Keterangan</label>

                  <div class="col-sm-8">
                    <select class="form-control" name="keterangan">
                    <option name="keterangan" value="1">Pengeluaran</option>
                    <option name="keterangan" value="2">Pemasukan</option>
                  </select>
                  </div>
                </div> 
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Sumber/Penyimpanan Uang</label>

                  <div class="col-sm-8">
                   <select class="form-control" name="savings">
                    <option value="1">Tabungan</option>
                    <option value="2">Cash</option>
                  </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Pinjam/Bayar Hutang</label>

                  <div class="col-sm-8">
                    <input type="checkbox" value="no-hutang" id="show-form-debt" onclick="showForm()">
                    <input type="checkbox" value="hutang" id="hide-form-debt" onclick="hideForm()">
                  </div>
                </div>
                <div id="form-hutang">
                  <div class="form-group">
                    <label for="pinjamke" class="col-sm-2 control-label">Pinjam Ke</label>
                      <div class="col-sm-8">
                       <select class="form-control" name="id_staf">
                            <option name="type"></option>
                            <?php foreach ($namaStaf as $key){ ?>
                              <option value="<?= $key->id_staff; ?>"><?= $key->name; ?></option>
                            <?php } ?> 
                        </select>
                      </select>
                      </div>
                    </div> 
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Status</label>

                    <div class="col-sm-8">
                      <select class="form-control" name="status">
                        <option></option>
                        <option value="1">Pinjam</option>
                        <option value="2">Bayar</option>
                      </select>
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

   