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
              <?php 
                $id_role = $this->session->userdata('logged_in')['id_user_role'] ;
                if($id_role == '1'){
              ?>
              <th>Aksi</th>
              <?php } ?>
            </tr>
          </thead>
          <tbody>
          <?php
            $i = 0 ;
            foreach($projects as $project){
              $i++
          ?>
            <tr>
              <td><?php echo $i ;?></td>
              <td><?php echo $project->name ;?></td>
              <td><?php echo $project->pm_name ? $project->pm_name : "NULL" ;?></td>
              <td>
                <div class="clearfix"><span class="small pull-right">90%</span></div>
                <div class="progress xs">
                    <div class="progress-bar progress-bar-green" style="width:90%"></div>
                </div>
              </td>
              <td>
                <?php 
                  if($project->status == 'on_process')
                    echo '<span class="label label-warning">On Process</span>' ;
                  elseif($project->status == 'done')
                    echo '<span class="label label-success">Finished</span>' ;
                  else
                    echo '<span class="label label-danger">Canceled</span>' ;
                ?>
              </td>
              <td>
              <?php if($id_role == '1'){?>
                <a href="#" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> Detail</a>
                <a href="#" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i> Edit</a>
              <?php } ?>
              </td>
            </tr>
          <?php
            }
          ?>
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
        <?php if(validation_errors()){?>
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

          <h4><i class="fa fa-ban"></i> Caution</h4>
          <?php echo validation_errors() ;?>
        </div>
        <?php } ?>
        <div class="row">
          <div class="col-md-10">
          <form action="<?php echo base_url('/company/edit/') ;?>" method="post" class="form-horizontal">
            <div class="form-group">
              <label for="name" class="col-sm-2 control-label">Name</label>
              <div class="col-md-9">
                <input type="text" id="name" name="name" class="form-control" placeholder="Company Name" value="<?php echo $result[0]->name ;?>" />
              </div>
            </div>
            <div class="form-group">
              <label for="email" class="col-sm-2 control-label">Email</label>
              <div class="col-md-9">
                <input type="email" id="email" name="email" class="form-control" placeholder="Email Address" value="<?php echo $result[0]->email ;?>" />
              </div>
            </div>
            <div class="form-group">
              <label for="phone" class="col-sm-2 control-label">Phone</label>
              <div class="col-md-9">
                <input type="text" id="phone" name="phone" class="form-control" placeholder="Phone Number" value="<?php echo $result[0]->phone ;?>" />
              </div>
            </div>
            <div class="form-group">
              <label for="address" class="col-sm-2 control-label">Address</label>
              <div class="col-md-9">
                <textarea id="address" name="address" class="form-control" rows="5" placeholder="Address"><?php echo $result[0]->address ; ?></textarea>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-9 col-md-offset-2">
                <input type="hidden" name="id_company" value="<?php echo $result[0]->id_company?>" />
                <input type="submit" name="submit" value="Edit Data" class="btn btn-success btn-sm" />
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