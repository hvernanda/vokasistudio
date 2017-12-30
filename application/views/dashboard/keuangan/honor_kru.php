<!-- Main content -->
<section class="content">

  <!-- Main row -->
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Honor Kru</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <?php echo $this->session->flashdata('msgfalse');?>
          <?php echo $this->session->flashdata('msgtrue');?>
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Proyek</th>
              <th>Tugas</th>
              <th>Jumlah</th>
              <th>Sudah Diambil (tanggal)</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                $no=0;
                foreach ($result as $row):
                $no++;
              ?>
              <tr>
              <form class="form-horizontal" method="post" action="<?php echo site_url('honor_kru/updatePembayaranKru/'.$row->id)?>" enctype="multipart/form-data">
                <td><?= $no; ?></td>
                <td><?= $row->nama; ?></td>
                <td><?= $row->proyek; ?></td>
                <td><?= $row->tugas; ?></td>
                <td><?= number_format($row->jumlah , 0 ,'' , '.' ); ?></td>
                <td>
                  <div class="col-sm-6 input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" id="kalender<?= $no; ?>" class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask="" disabled="true" name="date" value="<?php if ($row->payment_date == '0000-00-00') {
                      
                    } else {
                      echo $row->payment_date;
                    } ?>">
                  </div>
                </td> 
              </form>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
        <!-- /.box-footer -->
      </div>
      <!-- /.box -->
    </div>
  </div>
  <!-- /.row (main row) -->
</section>
<!-- /.content -->