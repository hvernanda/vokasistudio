      <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>&nbsp;
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Riwayat Kontak</li>
          </ol>
        </section>

        

        <!-- Main content -->
        <section class="content">

          <!-- Main row -->
         <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">RIWAYAT KONTAK</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" method="post" action="<?php echo site_url('Riwayat_kontak/search/')?>" enctype="multipart/form-data">
                 <div class="input-group col-xs-3">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
                      <span class="input-group-btn">
                      <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                      </button>
                      </span>
              </div>
              <?php foreach ($view_contact as $key) { ?>
                <div class="form-group">
                  <label>Nama Kontak : <?= $key->contact_name; ?></label>
                </div>

                <div class="form-group">
                  <label>Phone : <?= $key->contact_phone; ?></label>
                </div>

                <div class="form-group">
                  <label>Email : <?= $key->contact_email; ?></label>
                </div>

                <div class="form-group">
                  <label>Nama Perusahaan : <?= $key->company_name; ?></label>
                </div>

                <div class="form-group">
                  <label>Phone Perusahaan : <?= $key->company_phone; ?></label>
                </div>

                <div class="form-group">
                  <label>Email Perusahaan : <?= $key->company_email; ?></label>
                </div>
                <?php } ?>
              </form>
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