<h1 class="text-center">ADD TOOL SKILL</h1>

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
                <input type="text" class="form-control" name="name" id="name" value="<?php echo set_value('name');?>" required >
            </div>
            <input type="submit" class="btn btn-primary" name="submit" id="submit" value="Simpan" onClick="return confirm('Apakah anda yakin data yang anda isikan sudah benar dan sesuai?\nData yang disimpan sudah tidak dapat diubah lagi.')">
        <?php echo form_close()?>
    </div>
</div>