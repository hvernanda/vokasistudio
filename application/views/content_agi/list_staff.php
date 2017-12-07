      <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            List Crew
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
            <li class="active">List Crew</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Main row -->
          <?php if ($status != 'manajer vokasi') {?> 
          <form class="form-horizontal" method="post" action="<?php echo site_url('list_staff/tambahId/'.$listProject)?>" enctype="multipart/form-data">
          <?php }?>
          <?php if( $status != 'manajer vokasi') {?>
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Daftar Crew</h3>
            </div>
            <?php echo $this->session->flashdata('msgtrue');?>
            <?php echo $this->session->flashdata('msgfalse');?>
            <!-- /.box-header -->
            
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama Crew</th>
                  <th>Skill</th>
                  <th>Tool</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($view_crew as $key1) { ?>
                <tr>
                  <td><?= $key1->staff_name;?></a></td>
                  <td><?= $key1->staff_skill;?></td>
                  <td><?= $key1->staff_tool;?></td>
                  <td>
                  <a class ="fa fa-fw fa-ban" href="<?php echo site_url('list_staff/delete/'.$key1->id_crew.'/'.$listProject)?>" onclick="return confirm('Are you sure you want to delete this item?');">
                  </a>
                  </td>
                </tr>
                <?php } ?>
                </tbody>
              </table>
          </div>
        </div>
        <?php } ?>
        <div class="box box-warning">
          <div class="box-header with-border">
              <h3 class="box-title">Daftar Staff</h3>
            </div>

          <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama Staff</th>
                  <th>Skill</th>
                  <th>Tool</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($view_staff as $key) { ?>
                <tr>
                  <td><?= $key->staff_name;?></a></td>
                  <td><?= $key->staff_skill;?></td>
                  <td><?= $key->staff_tool;?></td>
                  <td>
                  <?php if($status == 'manajer vokasi') {?> 
                  <a href="<?php echo site_url('list_staff/tambah/'.$listProject.'/'.$key->id_staff)?>">
                  <button>Pilih</button>
                  </a>
                  <?php }else{?>
                  <div class="col-xs-0">
                    <label>
                      <input type="checkbox" name="id_staff[]" value=<?php echo $key->id_staff ?>>
                              pilih
                    </label>
                  </div>
                  <?php } ?>
                  </td>
                </tr>
                <?php } ?>
                </tbody>
              </table>
              <?php if($status != 'manajer vokasi'){?>
              <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
              <?php }?>
          </div>
        </div>
      </form>
    </section>