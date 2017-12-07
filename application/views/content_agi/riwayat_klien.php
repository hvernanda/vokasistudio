      <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>&nbsp;
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">History Client</li>
          </ol>
        </section>

        

        <!-- Main content -->
        <section class="content">

          <!-- Main row -->
         <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">History Client</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" method="post" action="<?php echo site_url('Riwayat_klien/search/')?>" enctype="multipart/form-data">
                <!-- text input -->
              <div class="input-group col-xs-3">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                  <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                  </span>
              </div> 
              <?php 
              $company = NULL;
              foreach ($view_company as $key) { ?>
                <div class="form-group">
                  <label>Nama Klien : <?= $key->company_name; ?></label>
                </div>

                <div class="form-group">
                  <label>Phone : <?= $key->company_phone; ?></label>
                </div>

                <div class="form-group">
                  <label>Email : <?= $key->company_email; ?></label>
                </div>
              <?php 
                $company = $key->id_company;
              } ?>
              </form>
            </div>
          </div>

        <div class="btn-normal">
          <a href="<?php echo site_url('kontak_baru/index/'.$company)?>">
            <button type="button" class="btn btn-primary">Tambah Kontak Baru</button>
          </a>
        </div>

         <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Daftar Kontak</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama Kontak</th>
                  <th>Phone</th>
                  <th>Email</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($view_contact as $key) { ?> 
                <tr>
                  <td><a href="<?php echo site_url('riwayat_kontak/indexId/'.$key->id_contact) ?>"><?= $key->contact_name;?></a></td>
                  <td><?= $key->contact_phone;?></td>
                  <td><?= $key->contact_email;?></td>
                </tr>
                <?php } ?>
                </tbody>
                </table>
          </div>  
      </div>
    </section>

    <section class="content">
     <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Daftar Project</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama Project</th>
                  <th>Harga</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
               <?php foreach ($view_project as $key) { ?> 
                <tr>
                  <td><a href="<?php echo site_url('detil_proyek/index/'.$key->id_project) ?>"><?= $key->project_name;?></a></td>
                  <td><?= number_format( $key->project_price , 0 ,'' , '.' );?></td>
                  <td><?= $key->project_status;?></td>
                </tr>
               <?php } ?>
                </tbody>
                </table>
          </div>  
      </div>
    </section>