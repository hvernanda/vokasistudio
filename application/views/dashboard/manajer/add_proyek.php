
<h1 class="text-center">
    <?php echo isset($edit) ? 'Edit' : 'Add' ;?> proyek page
</h1>


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
        <?php echo isset($edit) ? form_open (base_url()."project/edit/".$result->id_project) : form_open (base_url()."project/add") ?>
            <div class="form-group">
                <label> Project Name</label>
                <input class="form-control" name="nama" id="nama" value="<?php echo isset($edit) ? $result->name : set_value('nama');?>" required >
            </div>
            <div class="form-group">
                <label>Dealtime</label>
                <input type="date" class="form-control" name="dealtime" value="<?php echo isset($edit) ? $result->dealtime : set_value('dealtime');?>" placeholder="dd-mm-yyy" required>
            </div>
            <div class="form-group">
                <label> Price</label>
            </div>
            <div class="form-group input-group">
                <span class="input-group-addon">Rp</span>
                <input type="text" class="form-control" name="price" value="<?php echo isset($edit) ? $result->price : set_value('price');?>" required>
                <span class="input-group-addon">,00</span>
            </div>

            <div class="form-group">
                <label>Deadline</label>
                <input type="date" class="form-control" name="deadline" value="<?php echo isset($edit) ? $result->deadline : set_value('deadline');?>" placeholder="dd-mm-yyy" required>
            </div>
            <div class="form-group">
                <label>Revision Date</label>
                <input type="date" class="form-control" name="revisiondate" value="<?php echo isset($edit) ? $result->revision_deadline : set_value('revisiondate');?>" placeholder="dd-mm-yyy" required>
            </div>
            <?php if(isset($edit)){?>
            <div class="form-group">
                <label> Status</label>
                <select class="form-control" name="status" id="status"  required>
                    <option value="on process" <?php echo isset($edit) ? ($result->status == 'on_process' ? 'selected' : '') : '' ?>> ON PROSESS</option>
                    <option value="done" <?php echo isset($edit) ? ($result->status == 'done' ? 'selected' : '') : '' ?>> DONE </option>
                    <option value="canceled" <?php echo isset($edit) ? ($result->status == 'canceled' ? 'selected' : '') : '' ?>> CANCELED</option>
                </select>
            </div>
            <?php } ?>
            <div class="form-group">
                <label> Down Payment </label>
            </div>
            <div class="form-group input-group">
                <span class="input-group-addon">Rp</span>
                <input type="text" class="form-control" name="downpayment" value="<?php echo isset($edit) ? $result->DP : set_value('downpayment');?>" required>
                <span class="input-group-addon">,00</span>
            </div>
            <div class="form-group">
                <label>Type Proyek</label>
                <select name="type[]" id="type" class="form-control select2" multiple="multiple" required>
                <option disabled="disabled">-- Pilih tipe --</option>
                <?php foreach($types as $type){ ?>
                    <option value="<?php echo $type->id_type?>" <?php echo isset($edit) ? (in_array($type->id_type, $protypes) ? 'selected' : '') : '' ?>><?php echo $type->name?></option>
                <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label> Kontak Perusahaan </label>
                <select class="form-control" name="id_contact" id="id_contact"  required>
                    <?php 
                        foreach($daftar as $v) {
                    ?>
                    <option value="<?php echo $v->id_contact ;?>" <?php echo isset($edit) ? ($result->id_contact == $v->id_contact ? 'selected' : '') : ''?>><?php echo $v->name ;?></option>
                    <?php 
                        }
                    ?>
                </select>
            </div>
            <?php if(!isset($edit)){ ?>
            <div class="form-group">
                <label>Manajer Proyek</label>
                <select name="manpro" id="manpro" class="form-control">
                    <option>-- Pilih Manajer Proyek --</option>
                <?php foreach($staffs as $staff){ ?>
                    <option value="<?php echo $staff->id_staff?>"><?php echo $staff->name?></option>
                <?php }?>
                </select>
            </div>
            <?php } ?>

            <input type="submit" class="btn btn-primary" name="submit" id="submit" value="Simpan" onClick="return confirm('Apakah anda yakin data yang anda isikan sudah benar dan sesuai?\nData yang disimpan sudah tidak dapat diubah lagi.')">
        <?php echo form_close()?>
    </div>
</div>




