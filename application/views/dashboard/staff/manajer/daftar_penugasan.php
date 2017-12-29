<h1>Dashboard Daftar Penugasan</h1>

<?php var_dump($isi) ?>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <b>DAFTAR PENUGASAN</b>
            </div>
            <div class="panel-body">
              <div class="table-responsive">
                <table class="table">
                  <tr>
                    <td>NO</td>
                    <td>NAMA CREW</td>
                    <td>JOB</td>
                    <td>DETAIL JOB</td>
                    <td>ACCEPTANCE DATE</td>
                    <td>DEADLINE</td>
                    <td>FEE</td>
                    <td>RATING</td>
                  </tr>
                  <?php
                      $i=0; 
                      foreach($isi as $tugas) {
                          if($tugas->jobname){
                              $i++;
                    ?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $tugas->name; ?></td>
                      <td><?php echo $tugas->jobname; ?></td>
                      <td><?php echo $tugas->detail_job; ?></td>
                      <td><?php echo $tugas->acceptance_date; ?></td>
                      <td><?php echo $tugas->deadline; ?></td>
                      <td><?php echo $tugas->fee; ?></td>
                      <td><?php echo $tugas->rating; ?></td>
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