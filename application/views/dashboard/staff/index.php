<h1>ALL PROYEK</h1>

<div class="row">
  <div class="col-md-3 col-sm-3 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-green">
        <i class="ion ion-videocamera"></i>
      </span>
      <div class="info-box-content">
        <span class="info-box-text">Jumlah Proyek</span>
        <span class="info-box-number"><?php echo $project_count[0]->count ;?></span>
      </div>
    </div>
  </div>
  <div class="col-md-3 col-sm-3 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-aqua">
        <i class="ion ion-person-stalker"></i>
      </span>
      <div class="info-box-content">
        <span class="info-box-text">As Manajer Proyek</span>
        <span class="info-box-number"><?php echo $manajer_count ;?></span>
      </div>
    </div>
  </div>
  <div class="col-md-3 col-sm-3 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-aqua">
        <i class="ion ion-person-stalker"></i>
      </span>
      <div class="info-box-content">
        <span class="info-box-text">As Keuangan Proyek</span>
        <span class="info-box-number"><?php echo $keuangan_count ;?></span>
      </div>
    </div>
  </div>
  <div class="col-md-3 col-sm-3 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-aqua">
        <i class="ion ion-person-stalker"></i>
      </span>
      <div class="info-box-content">
        <span class="info-box-text">As Crew Proyek</span>
        <span class="info-box-number"><?php echo $crew_biasa_count ;?></span>
      </div>
    </div>
  </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <b>ALL PROJECTS</b>
            </div>
            <div class="panel-body">
              <table class="table table-data">
                <thead>
                  <tr>
                    <td>NO</td>
                    <td>NAMA PROJECT</td>
                    <td>STATUS</td>
                    <td>ROLE</td>
                    <td>ACTION</td>
                  </tr>
                </thead>
                <tbody>
                  <?php
                      $i=0; 
                      foreach($result as $proyek){
                          if($proyek->id_project){
                              $i++;
                    ?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $proyek->name; ?></td>
                      <td><?php echo $proyek->status; ?></td>
                      <td><?php echo $proyek->role ?></td>
                      <td>
                        <a href="<?php 
                          if($proyek->id_crew_role==1){
                            echo base_url('manajer_proyek/project/'.$proyek->id_project);
                          } elseif($proyek->id_crew_role==2){
                            echo base_url('keuangan/project/'.$proyek->id_project);
                          } else {
                            echo base_url('crew/project/'.$proyek->id_project);
                          }


                          ?>" class="btn btn-info">Manage</a></td>
                    </tr>
                  <?php
                          }
                      }
                  ?>
                </tbody>
              </table>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
      <div class="panel panel-default">
        <div class="panel-heading"><b>ALL PENAWARAN MANAGER PROJECT</b></div>
        <div class="panel-body">
          <table class="table table-data">
            <thead>
              <tr>
                <th>#</th>
                <th>Nama Proyek</th>
                <th>Deadline</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
            <?php 
              $i = 0 ;
              foreach($offers as $offer){ $i++;
            ?>
              <tr>
                <td><?php echo $i ;?></td>
                <td><?php echo $offer->name ;?></td>
                <td><?php echo $general->convertDate($offer->deadline) ;?></td>
                <td>
                <?php 
                  if($offer->status_offer == '0'){
                    echo '<a href="#" class="btn btn-success btn-xs"><i class="fa fa-check"></i></a>&nbsp;' ;
                    echo '<a href="#" class="btn btn-danger btn-xs"><i class="fa fa-times"></i></a>' ;
                  }
                ?>
                </td>
              </tr>
            <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
</div>