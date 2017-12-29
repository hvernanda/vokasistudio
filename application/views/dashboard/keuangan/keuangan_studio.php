<div class="btn-normal" id="hidden-button">
  <a href="<?php echo site_url('keuangan/tambah_data_studio')?>">
    <button type="button" class="btn btn-primary">Tambah Data</button>
  </a>
  <a href="##" target="_blank" onclick="printDiv()">
    <button type="button" class="btn btn-primary">Cetak</button>
  </a>
</div>
<section class="content">
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <b> DATA KEUANGAN VOKASI STUDIOS </b>
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
          <div class="table-responsive">
            <!-- minta tlg dibikin sortingnya ya -->
            <table class="table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Jumlah Uang</th>
                  <th>Tanggal</th>
                  <th>Keterangan</th>
                  <th>info</th>
                  <!--                     <th>Aksi</th> -->
                </tr>
              </thead>
              <tbody>
                <?php
                      $i=0;
                      foreach($result as $row){
                        if($row->id_finance){  
                          $number = preg_replace("/[^0-9]/s", "", $row->amount); $jumlah = $number * $row->total;
                          $i++; 
                          ?>
                <tr>
                  <td>
                    <?php echo $i ?>
                  </td>
                  <td>
                    <?= number_format( $jumlah , 0 ,'' , '.' ) ?>
                  </td>
                  <td>
                    <?= date('j F Y', strtotime($row->date)); ?>
                  </td>
                  <td>
                    <?= $row->name; ?>
                  </td>
                  <td>
                    <?php 
                              $keterangan = $row->amount; 
                              $ket = preg_replace("/[0-9]+/","", $keterangan); 

                              if($ket == '-'){
                                echo "Pengeluaran";
                              }else {
                                echo "Pemasukan";
                              } 
                          ?>
                  </td>
                </tr>
                <?php 
                              }
                          }
                      ?>
              </tbody>
            </table>
          </div>
          <!-- /.table-responsive -->
        </div>
        <!-- /.panel-body -->
      </div>
      <!-- /.panel -->
    </div>
    <!-- /.col-lg-6 -->
  </div>
  <!-- /.row -->

  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Tabungan Vokasi Studios</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <tbody><tr>
              <th>Jumlah</th>
              <th>Tabungan</th>
              <th>Cash</th>
            </tr>
            <?php foreach ($viewTabungan as $row): ?>
            <tr>
              <td>Rp.<?php $number1 = $row->jumlah; echo number_format( $number1 , 0 ,'' , '.' ); ?></td>
              <td>Rp.<?php $number2 = $row->tabungan; echo number_format( $number2 , 0 ,'' , '.' ); ?></td>
              <td>Rp.<?php $number3 = $row->cash; echo number_format( $number3 , 0 ,'' , '.' ); ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody></table>
        </div>
        <!-- /.box-body -->
        <!-- /.box-footer -->
      </div>
      <!-- /.box -->
    </div>
  </div>
</section>