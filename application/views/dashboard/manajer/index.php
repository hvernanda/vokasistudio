<div class="row">
  <div class="col-md-4 col-sm-4 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-green">
        <i class="ion ion-videocamera"></i>
      </span>
      <div class="info-box-content">
        <span class="info-box-text">Proyek Dikerjakan</span>
        <span class="info-box-number"><?php echo sizeof($project) ;?></span>
      </div>
    </div>
  </div>
  <div class="col-md-4 col-sm-4 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-aqua">
        <i class="ion ion-person-stalker"></i>
      </span>
      <div class="info-box-content">
        <span class="info-box-text">Jumlah Klien</span>
        <span class="info-box-number"><?php echo sizeof($client) ;?></span>
      </div>
    </div>
  </div>
  <div class="col-md-4 col-sm-4 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-yellow">
        <i class="ion ion-ios-people-outline"></i>
      </span>
      <div class="info-box-content">
        <span class="info-box-text">Jumlah Staff</span>
        <span class="info-box-number"><?php echo sizeof($staff) ;?></span>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
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
              <th>Status</th>
              <th>Progress</th>
            </tr>
          </thead>
          <tbody>
          <?php $i=0; foreach($project as $project){ $i++; ?>
            <tr>
              <td><?php echo $i ;?></td>
              <td><?php echo $project->name ;?></td>
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
                <div class="clearfix"><span class="small pull-right">90%</span></div>
                <div class="progress xs">
                    <div class="progress-bar progress-bar-green" style="width:90%"></div>
                </div>
              </td>
            </tr>
          <?php if($i >= 10) break ; } ?>
          </tbody>
        </table>
      </div>
    </div>  
  </div>
  <div class="col-md-6">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">All Clients</h3>
      </div>
      <div class="box-body">
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>Nama</th>
              <th>Email</th>
              <th>Phone</th>
            </tr>
          </thead>
          <tbody>
          <?php $i=0; foreach($client as $contact){ $i++; ?>
            <tr>
              <td><?php echo $i ;?></td>
              <td><?php echo $contact->name ;?></td>
              <td><?php echo $contact->email ;?></td>
              <td><?php echo $contact->phone ;?></td>
            </tr>
          <?php if($i >= 10) break ;} ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">All Staffs</h3>
      </div>
      <div class="box-body">
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>Nama</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Address</th>
              <th>Role</th>
            </tr>
          </thead>
          <tbody>
          <?php $i=0; foreach($staff as $staff){ $i++ ;?>
            <tr>
              <td><?php echo $i ;?></td>
              <td><?php echo $staff->name ;?></td>
              <td><?php echo $staff->email ;?></td>
              <td><?php echo $staff->phone ;?></td>
              <td><?php echo $staff->address ;?></td>
              <td><?php echo $staff->user_role ;?></td>
            </tr>
          <?php if($i >= 10) break; } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>