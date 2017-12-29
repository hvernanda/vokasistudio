<!-- <h1>User Profile</h1> -->
<div class="row">
  <div class="col-md-3">
    <div class="box box-primary">
      <div class="box-body box-profile">
        <img src="<?php echo $result[0]->photo ? base_url('/uploads/img/'.$result[0]->photo) : base_url('/assets/img/icon.png') ;?>" alt="" class="profile-user-img img-responsive img-circle">
        <h3 class="profile-username text-center"><?php echo $result[0]->name ;?></h3>
        <p class="text-muted text-center"><?php echo $result[0]->user_role ;?></p>

        <ul class="list-group list-group-unbordered">
          <li class="list-group-item">
            <b>Projects Involved</b>
            <a class="pull-right">0</a>
          </li>
          <li class="list-group-item">
            <b>Project Manager</b>
            <a class="pull-right">0 times</a>
          </li>
          <li class="list-group-item">
            <b>Crew</b>
            <a class="pull-right">0 times</a>
          </li>
        </ul>
      </div>
    </div>

    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">
          <?php echo $result[0]->id_user == $this->session->userdata('logged_in')['id_user'] ? 'About Me' : 'About Staff' ;?>
        </h3>
      </div>
      <div class="box-body">
        <strong><i class="fa fa-envelope"></i> Email</strong>
        <p class="text-muted"><?php echo $result[0]->email ;?></p>
        <hr />

        <strong><i class="fa fa-phone"></i> Phone</strong>
        <p class="text-muted"><?php echo $result[0]->phone ;?></p>
        <hr />

        <strong><i class="fa fa-building"></i> Address</strong>
        <p class="text-muted"><?php echo $result[0]->address ;?></p>
        <hr />

        <strong><i class="fa fa-user"></i> Status</strong>
        <p class="text-muted">
          <?php 
            if($result[0]->status_account == 'active')
              echo '<span class="label label-success">Active</span>' ;
            else 
              echo '<span class="label label-danger">Inactive</span>' ;
          ?></p>
        <hr />

        <strong><i class="fa fa-pencil"></i> Skills</strong>
        <p class="text-muted">
        <?php
          foreach($data_skill as $skillMap){
            if($skillMap->skill_name){      
        ?>
        <?php echo '<span class="label label-info">'.$skillMap->skill_name.'</span>' ;?>
        <?php 
            }
          } ?>
        </p>
      </div>
    </div>
  </div>
  <div class="col-md-9">
    <h4>Projects Involved</h4>
    <div class="box box-primary">
      <div class="box-header">
        <h4 class="box-title">All Projects Data</h4>
      </div>
      <div class="box-body">
        <table class="table table-data">
          <thead>
            <tr>
              <th>#</th>
              <th>Nama Proyek</th>
              <th>Role</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              $i = 0 ;
              foreach($projects as $project){
                $i++ ;
            ?>
              <tr>
                <td><?php echo $i ;?></td>
                <td><?php echo $project->name ;?></td>
                <td><?php echo $project->role ;?></td>
                <td>
                <?php
                  if($project->status == 'done')
                    echo '<span class="label label-success">Done</span>' ;
                  elseif($project->status == 'canceled')
                    echo '<span class="label label-danger">Canceled</span>' ;
                  else
                    echo '<span class="label label-warning">On Process</span>' ;
                ?>
                </td>
                <td>
                  <a href="#" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> Detail</a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
    <?php if($result[0]->id_user == $this->session->userdata('logged_in')['id_user']){ ?>
    <div class="box box-warning">
      <div class="box-header with-border">
        <h4 class="box-title">Account Settings</h4>
      </div>
      <div class="box-body">
        <?php if($this->session->flashdata('errormsg')){ ?>
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

          <h4><i class="fa fa-ban"></i> Warning</h4>
          <?php echo $this->session->flashdata('errormsg') ;?>
        </div>
        <?php } ?>
        <?php echo form_open_multipart(base_url('user/edit/'.$result[0]->id_user)) ;?>
        <div class="form-group">
          <label>Nama</label>
          <input name="name" type="text" class="form-control" value="<?php echo $result[0]->name ;?>" required />
        </div>
        <div class="form-group">
          <label>Email</label>
          <input name="email" type="email" class="form-control" value="<?php echo $result[0]->email ;?>" required />
        </div>
        <div class="form-group">
          <label>Phone Number</label>
          <input name="phone" type="text" class="form-control" value="<?php echo $result[0]->phone ;?>" required />
        </div>
        <div class="form-group">
          <label>Address</label>
          <textarea name="address" class="form-control" required><?php echo $result[0]->address ;?></textarea>
        </div>
        <div class="form-group">
          <label>New Photo</label>
          <input type="file" name="photo" />
          <p class="help-block">Pilih file jika ingin mengubah foto</p>
        </div>
        <div class="form-group">
          <label>New Password</label>
          <input type="password" name="password" class="form-control" />
          <span class="help-block">Isi jika ingin mengubah password</span>
        </div>
        <div class="form-group">
          <input type="submit" name="submit" class="btn btn-primary" value="Edit data" />
        </div>
        <?php echo form_close() ;?>
      </div>
    </div>
    <?php } ?>
  </div>
</div>