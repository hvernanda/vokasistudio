<h1>ALL PROYEK</h1>

<div class="row">
  <div class="col-md-4 col-sm-4 col-xs-12">
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
  <div class="col-md-4 col-sm-4 col-xs-12">
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
  <div class="col-md-4 col-sm-4 col-xs-12">
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
  <div class="col-md-4 col-sm-4 col-xs-12">
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
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <b>ALL PROJECTS</b>
            </div>
            <div class="panel-body">
              <div class="table-responsive">
                <table class="table">
                  <tr>
                    <td>NO</td>
                    <td>NAMA PROJECT</td>
                    <td>DEAL TIME</td>
                    <td>HARGA</td>
                    <td>DEADLINE</td>
                    <td>REVISION DEADLINE</td>
                    <td>STATUS</td>
                    <td>DP</td>
                    <td>ID CONTACT</td>
                    <td>ROLE</td>
                    <td>ACTION</td>
                  </tr>
                  <?php
                      $i=0; 
                      foreach($isi as $proyek) {
                          if($proyek->id_project){
                              $i++;
                    ?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $proyek->name; ?></td>
                      <td><?php echo $proyek->dealTime; ?></td>
                      <td><?php echo $proyek->price; ?></td>
                      <td><?php echo $proyek->deadline; ?></td>
                      <td><?php echo $proyek->revisionDeadline; ?></td>
                      <td><?php echo $proyek->status; ?></td>
                      <td><?php echo $proyek->DP; ?></td>
                      <td><?php echo $proyek->id_contact; ?></td>
                      <td><?php if($proyek->id_crew_role==1){
                            echo "Manager";
                          } elseif($proyek->id_crew_role==2){
                            echo "Keuangan";
                          } else {
                            echo "Crew";
                          } ?></td>
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
                </table>
              </div>
            </div>
        </div>
    </div>
</div>