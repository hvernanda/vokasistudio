<section class="content">
      <div class="row">
        <div class="col-md-12">
         <div class="box">
            <div class="box-header">
              <h3 class="box-title">Progres Kru</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="tabel" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Aktivitas</th>
                  <th>Nama Kru</th>
                  <th>Tanggal Aktivitas</th>
                </tr>

                <tbody>
                  
                  <tr>
                <?php
                    $no = 1;
                    foreach ($isi as $row) {
                    ?>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $row->aktivitas; ?></td>
                    <td><?php echo $row->nama; ?></td>
                    <td><?php echo $row->tanggal; ?></td>
                    <td>
                      <a href="<?php echo site_url('progresproject/beriKomen/')?>" class="btn btn-primary"><span class="fa fa-fw fa-pencil"></span></a>
                      </td>
                  </tr>
                <?php
                }
                ?>
                </tbody>
                </thead>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
    </div>
</section>

