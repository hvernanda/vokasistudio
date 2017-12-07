      <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            List Client
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
            <li class="active">List Client</li>
          </ol>
        </section>

        <div class="btn-normal">
          <a href="<?php echo site_url('klien_baru')?>">
            <button type="button" class="btn btn-primary">Buat Client Baru</button>
          </a>
        </div>

        <!-- Main content -->
        <section class="content">
          <form role="form" method="post" action="<?php echo site_url('proyek_baru_table/search/')?>" enctype="multipart/form-data">
          <!-- Main row -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Daftar Client</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama Client</th>
                  <th>Phone</th>
                  <th>Email</th>
                  <th>Alamat</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($view_company as $key) { ?>
                <tr>

                  <td> <a href="<?php echo site_url('riwayat_klien/index/'.$key->id) ?>"><?= $key->company_name;?></a></td>
                  <td><?= $key->company_phone;?></td>
                  <td><?= $key->company_email;?></td>
                  <td><?= $key->company_address;?></td>
                  <td>
                  <a href="<?php echo site_url('kontak_table/index/'.$key->id) ?>">
                  <button type="button" class="btn btn-default">Buat Proyek</button>
                  </a>
                  </td>
                </tr>
                 <?php } ?>
                </tbody>
                </table>
          </div>  
      </div>
    </form>
</section>
        