<h1 class="text-center">Add staff page</h1>

<div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>
<div class="row">
    <div class="col-md-4 col-md-offset-4">
    <?php if(validation_errors()) {?>
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

            <h4><i class="fa fa-ban"></i> Warning!</h4>
            <?php echo validation_errors() ;?>
        </div>
    <?php } ?>
        <?php echo form_open(base_url()."staff/add") ?>
            <div class="form-group">
                <label> Nama </label>
                <input type="text" class="form-control" name="nama" id="nama" value="<?php echo set_value('nama');?>" required >
            </div>
            <div class="form-group">
                <label> Email </label>
                <input type="email" class="form-control" name="email" id="email" value="<?php echo set_value('email');?>" required>
            </div>
            <div class="form-group">
                <label> Password </label>
                <input type="password" class="form-control" name="password" id="password" value="<?php echo set_value('password');?>" required>
            </div>
            <div class="form-group">
                <label> Status</label>
                <select class="form-control" name="id_user_role" id="id_user_role"  required>
                    <option value="3">Staff</option>
                    <option value="2"> Staff Keuangan</option>
                </select>
            </div>


            <input type="submit" class="btn btn-primary" name="submit" id="submit" value="Simpan" onClick="return confirm('Apakah anda yakin data yang anda isikan sudah benar dan sesuai?\nData yang disimpan sudah tidak dapat diubah lagi.')">
        <?php echo form_close()?>
    </div>
</div>