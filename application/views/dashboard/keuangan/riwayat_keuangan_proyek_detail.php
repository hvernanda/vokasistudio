  <!-- Content Header (Page header) --> 
 <div id="print">
  <h1>
    Riwayat Keuangan Proyek
  </h1>

    <?php 
      $pemasukan=0;
      $pengeluaran=0;
      foreach ($viewTotalPemasukan as $row){
        if ($row->pemasukan == null) {
          $pemasukan=0;
        }elseif ($row->pemasukan != null) {
          $pemasukan = $pemasukan + $row->pemasukan;
        }
      } 
      foreach ($viewTotalPengeluaran as $row){
        if ($row->pengeluaran == null) {
          $pengeluaran=0;
        }elseif ($row->pengeluaran != null) {
          $pengeluaran = $pengeluaran + $row->pengeluaran;
        }
      } 
      foreach ($viewTotalHonor as $row){
          $honor = $row->honor; 
      } 
    ?>
    <div class="row">
      <div class="col-md-6">
        <table class="detail-proyek">
        <?php foreach ($result as $row): ?>
          <tr>
            <td>Nama Project </td>
            <td> &nbsp; : &nbsp; </td>
            <td><?= $row->name; ?></td>
          </tr>
          <tr>
            <td>Harga </td>
            <td> &nbsp; : &nbsp; </td>
            <td><?php $number1 = preg_replace("/[^0-9]/s", "", $row->price); echo number_format( $number1 , 0 ,'' , '.' ); ?></td>
          </tr>
          <tr>
            <td>DP </td>
            <td> &nbsp; : &nbsp; </td>
            <td><?php $number2 = preg_replace("/[^0-9]/s", "", $row->DP); echo number_format( $number2 , 0 ,'' , '.' ); ?></td>
          </tr>
          <tr>
            <td>Kurang </td>
            <td> &nbsp; : &nbsp; </td>
            <td><?php $number3 = preg_replace("/[^0-9]/s", "", $row->price - $row->DP); echo number_format( $number3 , 0 ,'' , '.' ); ?></td>
          </tr>
          <tr>
            <td>Status </td>
            <td> &nbsp; : &nbsp; </td>
            <td><?php 
            if($row->status == 'on process')
                echo '<span class="label label-warning">On process</span>' ;
            elseif($row->status == 'done')
                echo '<span class="label label-success">Done</span>' ;
            else
                echo '<span class="label label-danger">Canceled</span>' ; 
            ?></td>
          </tr>
        <?php endforeach; ?>

          <?php foreach ($viewKeuangan as $row) { ?>
          <tr>
            <td>Total Pemasukan </td>
            <td> &nbsp; : &nbsp; </td>
            <td><?php $number4 = $pemasukan; echo number_format( $number4 , 0 ,'' , '.' ); ?></td>
          </tr>
          <tr>
            <td>Total Pengeluaran </td>
            <td> &nbsp; : &nbsp; </td>
            <td><?php $number4 = $pengeluaran + $honor; echo number_format( $number4 , 0 ,'' , '.' ); ?></td>
          </tr>
          <tr>
            <td>Sisa Uang </td>
            <td> &nbsp; : &nbsp; </td>
            <td><?php $number4 = $row->sisa_uang + $pemasukan; echo number_format( $number4 , 0 ,'' , '.' ); ?></td>
          </tr>
          <?php } ?>
          <tr>
            <td>Pengeluaran </td>
            <td> &nbsp; : &nbsp; </td>
            <td></td>
          </tr>
        </table>
      </div>
      <div class="col-md-6 text-right">
        <img src="<?php echo base_url()?>assets/img/film-tengkorak.jpg">
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="btn-normal">
          <a href="##" target="_blank" onclick="printDiv()">
            <button type="button" class="btn btn-primary">Cetak</button>
          </a>
        </div>
      </div>
    </div>
    <!-- Main content -->
    <section class="content">

      <!-- Main row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Keuangan Proyek</h3>
        </div>
         
        <!-- /.box-header --> 
          <div class="box-body">
              <?php echo $this->session->flashdata('msgfalse');?>
              <?php echo $this->session->flashdata('msgtrue');?>
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                    <tr>
                    <th>No</th>
                    <th>Keperluan</th>
                    <th>Tanggal</th>
                    <th>Uang Keluar</th>
                    <th>Ketarangan</th>
                  </tr>
              </thead>
              <tbody>
                  <?php 
                    $i=0;
                    foreach ($viewAmount as $row) {
                      $i++;
                      $rep[$i] = $row->amount;
                      $amount[$i] = str_replace('-', '', $rep[$i]);
                      $keterangan = $row->amount; 
                      $ket[$i] = preg_replace("/[0-9]+/","", $keterangan); 
                    }

                    $no=0;
                    foreach ($viewTransaksi as $row):
                    $no++;
                  ?>
                  <tr>
                    <td><?= $no; ?></td>
                    <td><?= $row->name; ?></td>
                    <td><?php $number = preg_replace("/[^0-9]/s", "", $amount[$no] * $row->total); echo number_format( $number , 0 ,'' , '.' ); ?></td>
                    <td><?= date('j F Y', strtotime($row->date)); ?></td>
                    <td>
                        <?php  
                            if($ket[$no] == '-'){
                              $ktrngn = 1;
                            }else {
                              $ktrngn = 2;
                            } 
                            if($ktrngn == 1){
                              echo "Pengeluaran";
                            }else {
                              echo "Pemasukan";
                            } 
                        ?>
                    </td>
                  </tr>
                  <?php $pengeluaran = $pengeluaran + $row->total; endforeach ?> 
                </tbody>
              </table>
            </div>  
          </div>
            <!-- /.box-body -->
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
     <!-- /.row (main row) -->

</section> 
<!-- /.content -->
</div>