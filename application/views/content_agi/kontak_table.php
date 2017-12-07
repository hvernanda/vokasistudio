      <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            List Kontak
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
            <li class="active">List Kontak</li>
          </ol>
        </section>

        <div class="btn-normal">
          <a href="<?php echo site_url('kontak_baru/index/'.$id)?>">
            <button type="button" class="btn btn-primary">Tambah Kontak Baru</button>
          </a>
        </div>

        <!-- Main content -->
        <section class="content">
          <form role="form" method="post" action="<?php echo site_url('proyek_baru_table/search/')?>" enctype="multipart/form-data">
          <!-- Main row -->
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
                  <th></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($view_contact as $key) { ?>
                <tr>
                  <td><a href="<?php echo site_url('riwayat_kontak/indexId/'.$key->id) ?>"><?= $key->contact_name;?></a></td>
                  <td><?= $key->contact_phone;?></td>
                  <td><?= $key->contact_email;?></td>
                  <td>
                  <a href="<?php echo site_url('proyek_baru/index/'.$key->id) ?>">
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
        