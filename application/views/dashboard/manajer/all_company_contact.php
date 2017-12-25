<div class="row">
    <div class="col-md-6">
        <h4>All Contacts</h4>
    </div>
    <div class="col-md-3 pull-right text-right">
        <a href="<?php echo base_url('client/add')?>" class="btn btn-info"><i class="fa fa-plus"></i> Add new contact</a>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
    <?php 
        foreach($result as $contact){
    ?>
        <div class="col-md-4" style="padding: 5px;">
            <div class="user-card">
                <div style="padding: 15px;">
                    <p><em><?php echo $contact->company ;?></em></p>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="user-card-image">
                                <img src="<?php echo base_url('assets/img/icon.png') ; ?>" alt="">
                            </div>
                        </div>
                        <div class="col-md-8" style="padding-left: 35px;">
                            <p><b><?php echo $contact->nama;?></b></p>
                            <p class="small">
                                <i class="fa fa-phone"></i> Phone :<br/>
                                <?php echo $contact->phone ;?>
                            </p>
                            <p class="small">
                                <i class="fa fa-envelope"></i> Email :<br/>
                                <?php echo $contact->email ;?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="user-card-footer text-center">
                    <a href="<?php echo base_url('/user/profile/'.$contact->id_user) ;?>" class="btn btn-info btn-sm">View Detail</a>
                </div>
            </div>
        </div>
    <?php
        }
    ?>
    </div>
</div>