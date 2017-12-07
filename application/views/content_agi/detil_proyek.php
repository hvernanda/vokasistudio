      <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>&nbsp;
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Detil Proyek</li>
          </ol>
        </section>

        

        <!-- Main content -->
        <section class="content">

          <!-- Main row -->
         <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Detil Proyek</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form">
              <?php foreach ($view_project as $key) { ?> 
                <div class="form-group">
                  <label>Nama Client : <?= $key->company_name;?></label>
                </div>

                <div class="form-group">
                  <label>Nomor Telepon Client : <?= $key->company_phone;?></label>
                </div>

                <div class="form-group">
                  <label>Email Client : <?= $key->company_email;?></label>
                </div>

                <div class="form-group">
                  <label>Nama Kontak : <?= $key->contact_name;?></label>
                </div>

                <div class="form-group">
                  <label>Nama Project : <?= $key->project_name;?></label>
                </div>

                <div class="form-group">
                  <label>Harga Project : <?= number_format( $key->project_price , 0 ,'' , '.' );?></label>
                </div>

                <div class="form-group">
                  <label>Deal Time : <?= $key->project_dealTime;?></label>
                </div>

                <div class="form-group">
                  <label>Dead Line : <?= $key->project_deadLine;?></label>
                </div>

                <div class="form-group">
                  <label>Revisi Dead Line : <?= $key->project_reivisideadLine;?></label>
                </div>

                <div class="form-group">
                  <label>Status : <?= $key->project_status;?></label>
                </div>

                <div class="form-group">
                  <label>DP : <?= number_format( $key->project_DP , 0 ,'' , '.' );?></label>
                </div>

              <?php } ?>
              <div class="form-group">
              <label>Tipe Project : </label>
              <?php
                $maks = count($view_type);
                $index = 0;
              ?>
               <?php foreach ($view_type as $key) {
                  $index++;
                  if($index != $maks){
                ?> 
                  <?= 
                    $key->project_tipe." /";
                    } else { echo $key->project_tipe;}?>
                 <?php 
                 } ?>
                 </div>
              </form>
            </div>
            <div class="box-footer">
                <a href="<?php echo site_url('edit_proyek/index/'.$id_project)?>">
                  <button type="button" class="btn btn-default">Edit Proyek</button>
                </a>
              </div>
          </div>
        </section>