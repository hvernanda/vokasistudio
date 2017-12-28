<h1 class="text-center">Add Client Contact</h1>

<div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>
<div class="row">
    <div class="col-md-4 col-md-offset-4">
    <?php if(validation_errors()){ ?>
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

            <h4><i class="fa fa-ban"></i> Warning</h4>
            <?php echo validation_errors() ;?>
        </div>
    <?php } ?>
        <form role="form" method="post" name="submit" action="<?php echo base_url ('client/add')?>">
            <div class="form-group">
                <label> Nama </label>
                <input type="text" class="form-control" name="nama" id="nama" value="<?php echo set_value('nama');?>" required >
            </div>
            <div class="form-group">
                <label> Email </label>
                <input type="email" class="form-control" name="email" id="email" value="<?php echo set_value('email');?>" required>
            </div>
            <div class="form-group">
                <label>Phone Number</label>
                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo set_value('phone') ;?>" required>
            </div>
            <div class="form-group">
                <label> Password </label>
                <input type="password" class="form-control" name="password" id="password" required>
            </div>
            <div class="form-group">
                <label>Company</label>
                <select name="id_company" id="id_company" class="form-control" required>
                <option value=""></option>
                <?php foreach($companies as $company){ ?>
                    <option value="<?php echo $company->id_company ;?>"><?php echo $company->name; ?></option>
                <?php } ?>
                </select>
            </div>
            <input type="submit" class="btn btn-primary" name="submit" id="submit" value="Simpan" onClick="return confirm('Apakah anda yakin data yang anda isikan sudah benar dan sesuai?\nData yang disimpan sudah tidak dapat diubah lagi.')">
        </form>
    </div>
</div>