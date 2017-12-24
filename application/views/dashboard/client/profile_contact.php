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
            <a class="pull-right">0</a>
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
    <div class="box box-primary">
      <div class="row">
        <div class="col-md-12">
          <h1>All projects involved here</h1>
        </div>
      </div>
    </div>
  </div>
</div>