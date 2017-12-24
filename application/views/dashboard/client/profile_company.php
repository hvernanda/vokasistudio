<div class="row">
  <div class="col-md-3">
    <div class="box box-primary">
      <div class="box-body box-profile">
        <img src="<?php echo base_url('/assets/img/icon.png') ;?>" alt="" class="profile-user-img img-responsive img-circle">
        <h3 class="profile-username text-center"><?php echo $result[0]->name ;?></h3>
        <p class="text-muted text-center">Company</p>

        <ul class="list-group list-group-unbordered">
          <li class="list-group-item">
            <b>Projects</b>
            <a class="pull-right">0</a>
          </li>
          <li class="list-group-item">
            <b>Contacts</b>
            <a class="pull-right">0</a>
          </li>
        </ul>
      </div>
    </div>

    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">About Company</h3>
      </div>
      <div class="box-body">
        <strong><i class="fa fa-building"></i> Name :</strong>
        <p class="text-muted"><?php echo $result[0]->name ;?></p>
        <hr />

        <strong><i class="fa fa-phone"></i> Phone :</strong>
        <p class="text-muted"><?php echo $result[0]->phone ;?></p>
        <hr />

        <strong><i class="fa fa-envelope"></i> Email :</strong>
        <p class="text-muted"><?php echo $result[0]->email ;?></p>
        <hr />

        <strong><i class="fa fa-map-marker"></i> Location :</strong>
        <p class="text-muted"><?php echo $result[0]->address ;?></p>

      </div>
    </div>
  </div>
  <div class="col-md-9">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">All Projects</h3>
      </div>
      <div class="box-body">
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>Nama Proyek</th>
              <th>Manajer Proyek</th>
              <th>Progress</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>

          </tbody>
        </table>
      </div>
    </div>

    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title with-border">All Company Contacts</h3>
        <div class="row">
          <div class="col-md-12">
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Kontak</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
              <?php 
                $i=0;
                foreach($contacts as $contact){
                  $i++;
              ?>
                <tr>
                  <td><?php echo $i ;?></td>
                  <td><?php echo $contact->name ;?></td>
                  <td><?php echo $contact->email ;?></td>
                  <td><?php echo $contact->phone ;?></td>
                  <td><a class="btn btn-xs btn-info" href="<?php echo base_url('/user/profile/'.$contact->id_user) ;?>"><i class="fa fa-eye"></i></a></td>
                </tr>
              <?php
                }
              ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <?php if($this->session->userdata('logged_in')['id_user_role'] == '1'){?>
    <div class="box box-warning">
      <div class="box-header">
        <h3 class="box-title">Company Setting</h3>
      </div>
      <div class="box-body">
        <div class="row">
          <div class="col-md-10">
          <form action="" method="post" class="form-horizontal">

            <div class="form-group">
              <label for="name" class="col-sm-2 control-label">Name</label>
              <div class="col-md-9">
                <input type="text" id="name" class="form-control" placeholder="Company Name" value="<?php echo $result[0]->name ;?>" />
              </div>
            </div>
            <div class="form-group">
              <label for="email" class="col-sm-2 control-label">Email</label>
              <div class="col-md-9">
                <input type="email" id="email" class="form-control" placeholder="Email Address" value="<?php echo $result[0]->email ;?>" />
              </div>
            </div>
            <div class="form-group">
              <label for="phone" class="col-sm-2 control-label">Phone</label>
              <div class="col-md-9">
                <input type="text" id="phone" class="form-control" placeholder="Phone Number" value="<?php echo $result[0]->phone ;?>" />
              </div>
            </div>
            <div class="form-group">
              <label for="address" class="col-sm-2 control-label">Address</label>
              <div class="col-md-9">
                <textarea id="address" class="form-control" rows="5" placeholder="Address"><?php echo $result[0]->address ; ?></textarea>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-9 col-md-offset-2">
                <input type="submit" value="Edit Data" class="btn btn-success btn-sm" />
              </div>
            </div>

          </form>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>
    
  </div>
</div>