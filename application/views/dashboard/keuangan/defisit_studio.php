  <div id="print">
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Defisit Vokasi Studios
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('home') ?>"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
        <li class="active">Defisit Vokasi Studios</li>
      </ol>
    </section> 

    <div class="btn-normal" id="hidden-button"> 
      <a href="##" target="_blank" onclick="printDiv()">
        <button type="button" class="btn btn-primary">Cetak</button>
      </a>
    </div>
    <!-- Main content -->
    <section class="content">

      <!-- Main row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
        <div class="box-header">
          <h3 class="box-title">Table</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <?php echo $this->session->flashdata('msgtrue');?>
          <table id="example1" class="table table-bordered table-striped">
            <thead>
                  <tr>
                  <th>No</th>
                  <th>Pinjam Kepada</th>
                  <th>Jumlah Uang</th>
                  <th>Tanggal</th> 
                  <th>Status</th> 
                </tr>
            </thead>
            <tbody>
                <tr>
                <?php 
                  $i=0;
                  foreach ($result as $row): 
                  $i++;
                  $number = preg_replace("/[^0-9]/s", "", $row->amount);
                ?>
                  <td><?= $i; ?></td>
                  <td><?= $row->name; ?></td>
                  <td><?=  number_format( $number , 0 ,'' , '.' ) ?></td>
                  <td><?= date('j F Y', strtotime($row->date)); ?></td> 
                  <td>
                    <?php
                      if ($row->status == 'borrow') {
                        echo 'pinjam';
                      }else{
                        echo 'bayar';
                      }
                    ?>
                  </td>  
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
<!-- /.content -->
</div>