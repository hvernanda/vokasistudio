<!-- <h1> SEMUA DATA STAFF </h1> -->
<div class="row">
    <div class="col-md-12">
    <?php 
        foreach($result as $contact){
    ?>
    <div class="col-md-4" style="padding: 0 5px;">
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
                    </div>
                </div>
            </div>
            <div class="user-card-footer text-center">
                <a href="#" class="btn btn-info">View Profile</a>
            </div>
        </div>
    </div>
    <?php
        }
    ?>
    </div>
</div