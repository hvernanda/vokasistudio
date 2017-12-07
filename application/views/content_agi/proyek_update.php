      <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Proyek Update
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Proyek Update</li>
          </ol>
        </section>

        

        <!-- Main content -->
        <section class="content">
              <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Nama</th>
                      <th>Tugas</th>
                      <th>Attachment</th>
                      <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($view_update as $key) { ?>
                <tr>
                  <td><?= $key->crew_name;?></a><input type="hidden" class="idAct" value=<?php echo $key->id_activity ?> /></td>
                  <td><?= $key->crew_task;?></td>
                  <td><a href="<?php echo base_url('img/1499787046.png')?>">Download</a></td>
                  <td>
                 
                  <button type="submit" class="btn btn-default" data-target="#commentModal" onClick="showModal(this)">Comment</button>
 
                  </td>
                </tr>
                <?php } ?>
                  </tbody>
                </table>
              </div>
                <!-- /.box-body  commentButton-->
                <!-- /.box-footer -->
            </div>
        
         <!-- /.row (main row) -->
    </section>
    <!-- /.content -->

