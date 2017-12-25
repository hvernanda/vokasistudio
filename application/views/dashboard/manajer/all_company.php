<div class="row">
    <div class="col-md-6">
        <h4>All Companies</h4>
    </div>
    <div class="col-md-3 pull-right text-right">
        <a href="<?php echo base_url('manajer/add_client_company') ;?>" class="btn btn-info"><i class="fa fa-plus"></i> Add new company</a>
    </div>
</div>
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
                    <a href="<?php echo base_url('/company/detail/'.$company->id_company) ;?>" class="btn btn-info">View Company</a>
                </div>
            </div>
        </div>
    <?php
        }
    ?>
    </div>
</div>