      <!-- Content Header (Page header) -->
      <div id="summaryPage"/>
        <section class="content-header">
          <h1>
            Summary Project
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Summary Project</li>
          </ol>
        </section>

        

        <!-- Main content -->
        <section class="content">

          <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">SUMMARY</h3>
                </div>
                <!-- /.box-header -->
               <div class="box-body">
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama Crew</th>
                  <th>Tugas</th>
                  <th>Attachment</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($view_crew as $key) { ?>
                <tr>
                  <td><?= $key->crew_name;?></a></td>
                  <td><?= $key->crew_task;?></td>
                  <td><a href="<?php echo base_url('img/1499787046.png')?>">Download</a></td>
                  <td>
                  <div class="col-xs-0">
                  <?php if($key->statusProject == 'done') {?>
                    <label>
                      <input checked type="checkbox" name="done" value="done" class="done" onClick="clickCheckbox(this,<?php echo $key->id_activity; ?>)"/>
                              done
                    </label>
                    <?php  }
                    else if($key->finish != '0000-00-00')
                      {?>
                         <label>
                      <input checked type="checkbox" name="done" value="done" class="done" onClick="clickCheckbox(this,<?php echo $key->id_activity; ?>)"/>
                              done
                    </label>
                    <?php }
                    
                     else {?>
                       <label>
                      <input type="checkbox" name="done" value="done" class="done" onClick="clickCheckbox(this,<?php echo $key->id_activity; ?>)"/>
                              done
                    </label>
                    <?php }?>
                  </div>
                  </td>
                </tr>
                <?php } ?>
                </tbody>
                </table>
                <div class="btn-normal" id="done" style="visibility:hidden">
                  <a href="<?php echo site_url('detil_proyek/updateStatus/'.$listProject)?>">
                    <button type="button" class="btn btn-primary">Tutup Proyek</button>
                  </a>
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