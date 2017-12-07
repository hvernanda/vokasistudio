      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box box-solid">

                    <div>
                        <?php echo $this->session->flashdata('message') ; ?>
                        <?php echo $this->session->flashdata('message1') ; ?>
                    </div>

                    <div class="box-header with-border">
                    <?php foreach ($result as $row) { ?>
                    <h5 class="box-title">Hallo,  <?php echo $row->name; ?> </h5>
                    <?php } ?>
                    </div>
            </div>
                <div class="row">
                <div class="col-xs-12">
                <div class="box-body box-profile">
                    <?php foreach ($result as $row) { ?>
                    <?php if($row->photo == ''){?>
                    <img class="profile-user-img img-responsive img-circle" 
                        src="<?php echo base_url();?>assets/img/avatar.png" 
                        style="height:200px; width:200px" alt="User profile picture">      
                    <?php } else{?>
                    <img class="profile-user-img img-responsive img-circle" 
                        src="<?php echo $row->photo;?>"  
                        style="height:200px; width:200px" alt="User profile picture">
                    <?php } ?>
                    <?php } ?>
                    <hr>
                </div>
                </div>
                <div class="col-sm-12">
                <div class="col-xs-6">
                <?php foreach ($result as $row) { ?>
                <form class="form" action="<?php echo site_url('profil/changePhoto') ?>" enctype="multipart/form-data" method="post">
                    <input type="hidden" class="form-control" id="id" name="id"  value="<?php echo $row->id_company; ?>">
                    <input type="file" class="form-control" name="photo" required>

                    <h6>*pilih Choose File kemudian ganti foto</h6>
                    <button class="btn btn-default btn-flat" type="submit">Ganti Foto</button>
                </form>
                </div>



                <?php } ?>
                </div>
            </div>

            <?php foreach ($result as $row) { ?>
            <div class="row">
                <div class="col-sm-offset-1 col-xs-10">
                <hr>
                <div class="box-body table-responsive"> 
                <button class="btn btn-default btn-block btn-flat" >Biodata Profil</button>
                <table id="example1" class="table dataTable table-striped">
                    <tr>
                        <td><h5>ID</h5></td>
                        <td><h5> : </h5></td>
                        <td><h5><?php echo $row->id_company;?> </h5></td>
                    </tr>
                    <tr>
                        <td><h5>Nama Lengkap </h5></td>
                        <td><h5> : </h5></td>
                        <td><h5><?php echo $row->name;?> </h5></td>
                    </tr>
                    <tr>
                        <td><h5>Alamat </h5></td>
                        <td><h5> : </h5></td>
                        <td><h5><?php echo $row->address;?> </h5></td>
                    </tr>
                    <tr>
                        <td><h5>No. HP</h5></td>
                        <td><h5> : </h5></td>
                        <td><h5><?php echo $row->phone;?> </h5></td>
                    </tr>
                    <tr>
                        <td><h5>Email </h5></td>
                        <td><h5> : </h5></td>
                        <td><h5><?php echo $row->email;?> </h5></td>
                    </tr>
                    <tr>
                        <td><h5>Password </h5></td>
                        <td><h5> : </h5></td>
                        <td><h5><?php echo $row->password;?></h5></td>
                    </tr> 
                </table>            
                <hr>

                <div class="col-xs-6">
                    <a href="<?php echo site_url('profil/ambil_user/'.$row->id_company) ?>" 
                    class="btn btn-default btn-block btn-flat">Edit Profil </i></a>
                </div>
                <?php } ?>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>

