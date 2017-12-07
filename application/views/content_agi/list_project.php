      <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>&nbsp;
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">List Project</li>
          </ol>
        </section>

        

        <!-- Main content -->
        <section class="content">

          <!-- Main row -->
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" method="post" action="<?php echo site_url('')?>" enctype="multipart/form-data">
                <!-- text input -->
    <section class="content">
     <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">List Project</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama Project</th>
                  <th>Harga</th>
                  <th>Status</th>
                  <th>Manajer</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
               <?php foreach ($view_project as $key) { ?> 
                <tr>
                  <td><a href="<?php echo site_url('detil_proyek/index/'.$key->id_project) ?>"><?= $key->project_name;?></a></td>
                  <td><?= number_format( $key->project_price , 0 ,'' , '.' );?></td>
                  <td><?= $key->project_status;?></td>
                  
                  <?php if($key->crew_status!=3) { ?>
                    <td>-</td>
                  <?php } else {?>
                    <td>
                    <?= $key->crew_name;?>
                    </td>
                  <?php } ?>
                  <td>
                  <a class="fa fa-edit" href="<?php echo site_url('list_staff/index/'.$key->id_project) ?>"></a>
                  </td>
                </tr>
               <?php } ?>
                </tbody>
                </table>
          </div>  
      </div>
    </section>
  </form>
</div>

    