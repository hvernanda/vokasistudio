
<? var_dump($data)?>
<h1>Add proyek page</h1>
<<<<<<< HEAD

<?php echo form_open_multipart (base_url()."manajer/add_proyek_process") ?>

<div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>

<form role="form" method="post" name="submit">


    <div class="form-group">
        <label> Project Name</label>
        <input class="form-control" name="nama" id="nama" value="<?php echo set_value('nama');?>" required >
    </div>
    <div class="form-group">
        <label>Dealtime</label>
        <input type="date" class="form-control" name="deadltime" value="<?php echo set_value('dealtime');?>" placeholder="dd-mm-yyy" required>
    </div>
    <div class="form-group">
        <label> Price</label>
    </div>
    <div class="form-group input-group">
        <span class="input-group-addon">Rp</span>
        <input type="text" class="form-control" name="price" value="<?php echo set_value('price');?>" required>
        <span class="input-group-addon">,00</span>
    </div>

    <div class="form-group">
        <label>Deadline</label>
        <input type="date" class="form-control" name="deadline" value="<?php echo set_value('deadline');?>" placeholder="dd-mm-yyy" required>
    </div>
    <div class="form-group">
        <label>Revision Date</label>
        <input type="date" class="form-control" name="revisiondate" value="<?php echo set_value('revisiondate');?>" placeholder="dd-mm-yyy" required>
    </div>
     <div class="form-group">
        <label> Status</label>
        <select class="form-control" name="status" id="Status"  required">
            <option value="on_prosess"> ON PROSESS</option>
            <option value="done"> DONE </option>
            <option value="canceled"> CANCELED</option>
        </select>
    </div>
    <div class="form-group">
        <label> Down Payment</label>
    </div>
    <div class="form-group input-group">
        <span class="input-group-addon">Rp</span>
        <input type="text" class="form-control" name="downpayment" value="<?php echo set_value('downpayment');?>" required>
        <span class="input-group-addon">,00</span>
    </div>
    <div class="form-group">
        <label> Kontak Perusahaan </label>
        <select class="form-control" name="id_contact" id="id_contact"  required">
            <?php 
                foreach($daftar as $v) {
            ?>
            <option value="<?php echo $v->id_contact ;?>"><?php echo $v->name ;?></option>
            <?php 
                }
            ?>
        </select>
    </div>


    <input type="submit" class="btn btn-primary" name="submit" id="submit" value="Simpan" onClick="return confirm('Apakah anda yakin data yang anda isikan sudah benar dan sesuai?\nData yang disimpan sudah tidak dapat diubah lagi.')">
    <?php echo form_close()?>
</form>
=======
<div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>
<div class="row">
    <div class="col-md-6">
        <?php echo form_open(base_url('manajer/add_proyek')) ;?>
        <!-- <form role="form" method="post" name="submit"> -->
        <div class="form-group">
            <label> Project Name</label>
            <input class="form-control" name="nama" id="nama" value="<?php echo set_value('nama');?>" required >
        </div>
        <div class="form-group">
            <label>Dealtime</label>
            <input type="date" class="form-control" name="Deadltime" value="<?php echo set_value('dealtime');?>" placeholder="dd-mm-yyy" required>
        </div>
        <div class="form-group">
            <label> Price</label>
        </div>
        <div class="form-group input-group">
            <span class="input-group-addon">Rp</span>
            <input type="text" class="form-control" name="price" value="<?php echo set_value('price');?>" required>
            <span class="input-group-addon">,00</span>
        </div>

        <div class="form-group">
            <label>Deadline</label>
            <input type="date" class="form-control" name="deadline" value="<?php echo set_value('deadline');?>" placeholder="dd-mm-yyy" required>
        </div>
        <div class="form-group">
            <label>Revision Date</label>
            <input type="date" class="form-control" name="revisiondate" value="<?php echo set_value('revisiondate');?>" placeholder="dd-mm-yyy" required>
        </div>
        <div class="form-group">
            <label> Status</label>
            <select class="form-control" name="Status" id="Status"  required>
                <option value="on_prosess"> ON PROSESS</option>
                <option value="done"> DONE </option>
                <option value="canceled"> CANCELED</option>
            </select>
        </div>
        <div class="form-group">
            <label> Down Payment</label>
        </div>
        <div class="form-group input-group">
            <span class="input-group-addon">Rp</span>
            <input type="text" class="form-control" name="downpayment" value="<?php echo set_value('downpayment');?>" required>
            <span class="input-group-addon">,00</span>
        </div>
        <div class="form-group">
            <label> Kontak Perusahaan </label>
            <select class="form-control" name="id_contact" id="id_contact"  required>
                <?php 
                    foreach($client as $v) {
                ?>
                <option value="<?php echo $v->id_user ;?>"><?php echo $v->name ;?></option>
                <?php 
                    }
                ?>
            </select>
        </div>

        <input type="submit" class="btn btn-primary" name="submit" id="submit" value="Simpan" onClick="return confirm('Apakah anda yakin data yang anda isikan sudah benar dan sesuai?\nData yang disimpan sudah tidak dapat diubah lagi.')">
        <?php echo form_close();?>
    </div>
</div>
>>>>>>> eab78db4e7a3b08b0765419da741409fd3443b10
