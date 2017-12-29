<!-- Main content -->
<section class="content">
  <!-- Main row -->
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Data Keuangan Proyek</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Harga</th>
          <th>DP</th>
          <th>Kurang</th>
          <th>Status</th>
          <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
        <tr>
        <?php 
          $no=0;
          foreach ($result as $row):
          $no++;
        ?>
          <td><?= $no; ?></td>
          <td><?= $row->name; ?></td>
          <td><?= $row->price; ?></td>
          <td><?= $row->DP; ?></td>
          <td><?= $row->price - $row->DP; ?></td>
          <td><?php 
            if($row->status == 'on process')
                echo '<span class="label label-warning">On process</span>' ;
            elseif($row->status == 'done')
                echo '<span class="label label-success">Done</span>' ;
            else
                echo '<span class="label label-danger">Canceled</span>' ;
           ?></td>
          <td>
            <a href="<?php echo site_url('riwayat_keuangan_proyek/detail/'.$row->id_project);?>">
              Detail
            </a>
          </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <!-- /.box-body -->
    <!-- /.box-footer -->
  </div>
  <!-- /.box --> 

</section>
<!-- /.content -->