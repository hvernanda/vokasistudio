<!-- <h1> SEMUA DATA STAFF </h1> -->
<div class="row">
    <div class="col-md-6">
        <h4>All staffs</h4>
    </div>
    <div class="col-md-3 pull-right text-right">
        <a href="<?php echo base_url('staff/add') ;?>" class="btn btn-info"><i class="fa fa-plus"></i> Add new staff</a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <?php if($this->session->flashdata('msgfailed')){ ?>
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <p><?php echo $this->session->flashdata('msgfailed') ;?></p>
        </div>
        <?php } ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
    <?php 
        foreach($result as $contact){
    ?>
    <div class="col-md-4" style="padding: 5px;">
        <div class="user-card">
            <div style="padding: 15px;">
                <p class="job-role"><em><?php echo $contact->user_role ?></em></p>
                <div class="row">
                    <div class="col-md-4">
                        <div class="user-card-image">
                            <img src="<?php echo $contact->photo ? base_url('uploads/img/'.$contact->photo) : base_url('assets/img/icon.png') ; ?>" alt="">
                        </div>
                    </div>
                    <div class="col-md-8" style="padding-left: 35px;">
                        <p><b><?php echo $contact->name ;?></b></p>
                        <p class="small">
                            <i class="fa fa-building"></i> Address:<br/>
                            <?php echo $contact->address ?>
                        </p>
                        <p class="small">
                            <i class="fa fa-phone"></i> Phone Number:<br/>
                            <?php echo $contact->phone ?>
                        </p>
                        <p class="small">
                            <i class="fa fa-envelope"></i> Email:<br/>
                            <?php echo $contact->email ?>
                        </p>
                        <p class="small">
                            <i class="fa fa-user"></i> Status: <br />
                            <?php 
                                if($contact->status_account == 'active')
                                    echo '<span class="label label-success">Active</span>' ;
                                    else
                                    echo '<span class="label label-danger">Not Active</span>' ;
                            ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="user-card-footer text-center">
                <a href="<?php echo base_url('/user/profile/'.$contact->id_user) ;?>" class="btn btn-info"><i class="fa fa-user"></i> View Profile</a>
                <?php if($contact->status_account == 'active'){ ?>
                <a href="<?php echo base_url('staff/set_status/inactive/'.$contact->id_user) ;?>" class="btn btn-danger"><i class="fa fa-ban"></i> Set Inactive</a>
                <?php }else{ ?>
                    <a href="<?php echo base_url('staff/set_status/active/'.$contact->id_user) ;?>" class="btn btn-success"><i class="fa fa-check"></i> Set Active</a>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php
        }
    ?>
    </div>
</div