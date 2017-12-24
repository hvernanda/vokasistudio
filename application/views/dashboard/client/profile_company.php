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
    <h4>Content profile</h4>
    <p>All company contacts</p>
    <p>All company projects</p>
  </div>
</div>