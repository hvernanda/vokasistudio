<h1 class="text-center">Add Client Company</h1>

<div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <form role="form" method="post" name="submit" action="<?php echo base_url ('manajer/add_client_company_process')?>">
            <div class="form-group">
                <label> Nama </label>
                <input class="form-control" name="nama" id="nama" value="<?php echo set_value('nama');?>" required >
            </div>
            <div class="form-group">
                <label> Phone Number </label>
                <input class="form-control" name="phone" id="phone" value="<?php echo set_value('phone');?>" required>
            </div>
            <div class="form-group">
                <label> Company Email </label>
                <input class="form-control" name="email" id="email" value="<?php echo set_value('email');?>" required>
            </div>
            <div class="form-group">
                <label> Address </label>
                <input class="form-control" name="address" id="address" value="<?php echo set_value('Address');?>" required>
            </div>

            <input type="submit" class="btn btn-primary" name="submit" id="submit" value="Simpan" onClick="return confirm('Apakah anda yakin data yang anda isikan sudah benar dan sesuai?\nData yang disimpan sudah tidak dapat diubah lagi.')">
        </form>
    </div>
</div>