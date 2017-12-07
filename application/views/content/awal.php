      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Daftar Proyek</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <!-- <input type="text" name="table_search" class="form-control pull-right" placeholder="Search"> -->

                  <div class="input-group-btn">
                    <!-- <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button> -->
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <?php foreach ($proyek as $row) { ?>
              <table class="table table-hover">
                
               
                <tr><td><a href="<?php echo site_url('dashboard/coba/'.$row->id_project); ?>" class="btn btn-default"><?php echo $row->nama_proyek .' - '. $row->nama_status; ?></a></td>
                <!-- <td><?php echo $row->id_project; ?></td> --></tr>
                <form action="<?php echo site_url('dashboard/coba'); ?>" method="POST">
                <td><input type="hidden" name="id_status" value="<?php echo $row->id_status; ?>"></td></tr>
                </form>
                <?php } ?>
              </table>
            </div>
            <!-- /.box-body -->
            
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
      </div>