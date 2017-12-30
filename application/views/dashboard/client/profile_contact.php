<div class="row">
  <div class="col-md-3">
    <div class="box box-primary">
      <div class="box-body box-profile">
        <img src="<?php echo base_url('/assets/img/icon.png') ;?>" alt="" class="profile-user-img img-responsive img-circle">
        <h3 class="profile-username text-center"><?php echo $result[0]->nama ;?></h3>
        <p class="text-muted text-center">Client</p>

        <ul class="list-group list-group-unbordered">
          <li class="list-group-item">
            <b>Projects Involved</b>
            <a class="pull-right"><?php echo sizeof($projects)?></a>
          </li>
        </ul>
      </div>
    </div>

    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">
          <?php echo $result[0]->id_user == $this->session->userdata('logged_in')['id_user'] ? 'About Me' : 'About Client' ;?>
        </h3>
      </div>
      <div class="box-body">
        <strong><i class="fa fa-building"></i> Company :</strong>
        <p class="text-muted"><?php echo $result[0]->company ?></p>
        <hr />

        <strong><i class="fa fa-phone"></i> Phone :</strong>
        <p class="text-muted"><?php echo $result[0]->phone ?></p>
        <hr />

        <strong><i class="fa fa-envelope"></i> Email :</strong>
        <p class="text-muted"><?php echo $result[0]->email ?></p>
      </div>
    </div>
  </div>

  <div class="col-md-9">
    <h4>Projects Involved</h4>
    <p>All projects the contact involved in</p>
    <div class="box box-primary">
      <div class="box-header">
        <h4 class="box-title">All Projects</h4>
      </div>
      <div class="box-body">
        <table class="table table-data">
          <thead>
            <tr>
              <th>#</th>
              <th>Project Name</th>
              <th>Project Manager</th>
              <th>Dealtime</th>
              <th>Deadline</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
          <?php $i=0; foreach($projects as $project){ $i++; ?>
            <tr>
              <td><?php echo $i ;?></td>
              <td><?php echo $project->name ;?></td>
              <td><?php echo $project->manpro ;?></td>
              <td><?php echo $general->convertDate($project->dealtime) ;?></td>
              <td><?php echo $general->convertDate($project->deadline) ;?></td>
              <td>
              <?php
                if($project->status == 'on process')
                  echo '<span class="label label-warning">On Process</span>' ;
                elseif($project->status == 'done')
                  echo '<span class="label label-success">Done</span>' ;
                else
                  echo '<span class="label label-danger">Canceled</span>' ;
              ?>
              </td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
    <?php 
      if($result[0]->id_user == $this->session->userdata('logged_in')['id_user']){
    ?>
    <div class="box box-warning">
      <div class="box-header with-border">
        <h4 class="box-title">User Settings</h4>
      </div>
      <div class="box-body">
        <?php echo form_open(base_url('/user/edit_contact/'.$result[0]->id_user)) ;?>
        <div class="form-group">
          <label>Name</label>
          <input type="text" name="name" class="form-control" value="<?php echo $result[0]->nama ;?>" required>
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="email" name="email" class="form-control" value="<?php echo $result[0]->email ;?>" required>
        </div>
        <div class="form-group">
          <label>Phone Number</label>
          <input type="text" name="phone" class="form-control" value="<?php echo $result[0]->phone ;?>" required>
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" name="password" class="form-control">
          <span class="help-block">Isi bila ingin mengubah password</span>
        </div>
        <div class="form-group">
          <input type="submit" name="submit" class="btn btn-primary" value="Edit data">
        </div>
        <?php echo form_close() ;?>
      </div>
    </div>
    <?php } ?>
  </div>
</div>