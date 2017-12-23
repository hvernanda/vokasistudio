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