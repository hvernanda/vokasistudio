<!-- <h1> SEMUA DATA COMPANY </h1> -->
<div class="row">
    <div class="col-lg-12">
    <?php 
        foreach($result as $company){
    ?>
        <div class="col-md-4" style="padding: 5px;">
            <div class="user-card">
                <div style="padding: 15px;">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="user-card-image">
                                <img src="<?php echo base_url('assets/img/icon.png') ; ?>" alt="">
                            </div>
                        </div>
                        <div class="col-md-8" style="padding-left: 35px;">
                            <p><b><?php echo $company->name?></b></p>
                            <p class="small">
                                <i class="fa fa-phone"></i> Phone:<br/>
                                <?php echo $company->phone;?>
                            </p>
                            <p class="small">
                                <i class="fa fa-envelope"></i> Email:<br/>
                                <?php echo $company->email;?>
                            </p>
                            <p class="small">
                                <i class="fa fa-building"></i> Address:<br/>
                                <?php echo $company->address;?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="user-card-footer text-center">
                    <a href="#" class="btn btn-info">View Company</a>
                </div>
            </div>
        </div>
    <?php
        }
    ?>
    </div>
</div>