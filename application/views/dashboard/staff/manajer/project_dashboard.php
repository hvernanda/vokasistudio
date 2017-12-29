<h1>Dashboard Project Manager Proyek</h1>

<a href="<?php echo base_url('') ;?>" class="btn btn-info">< BACK TO ALL PROJECT</a>

<a href="<?php echo base_url('manajer_proyek/add_crew/') ;?>" class="btn btn-info">ADD CREW</a>

<a href="<?php echo base_url('manajer_proyek/daftar_penugasan/'.$this->uri->segment(3)) ;?>" class="btn btn-info">DAFTAR PENUGASAN</a>

<a href="<?php echo base_url('') ;?>" class="btn btn-info">AKTIVITAS</a>

<br>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <b>ALL PROJECT CREWS</b>
            </div>
            <div class="panel-body">
              <div class="table-responsive">
                <table class="table">
                  <tr>
                    <td>NO</td>
                    <td>NAMA CREW</td>   
                    <td>ROLE</td>
                  </tr>
                  <?php
                  	if($result){
                      $i=0; 
                      foreach($result as $crew) {
                          if($crew->name){
                              $i++;
                    ?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $crew->name; ?></td>
                      <td><?php if($crew->id_crew_role==1){
                            echo "Manager";
                          } elseif($crew->id_crew_role==2){
                            echo "Keuangan";
                          } else {
                            echo "Crew";
                          } ?></td>
                    </tr>
                  <?php
                          }
                      }
                    } else {
                   ?>
                   		<td colspan="3" >No data crew in this project</td>
                   <?php
                    }
                  ?>
                </table>
              </div>
            </div>
        </div>
    </div>
</div>