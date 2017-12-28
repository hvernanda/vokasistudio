
<h1 class="text-center">
    <?php echo isset($edit) ? 'Edit' : 'Add' ?> Tool Skill 
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
        <?php echo !isset($edit) ? form_open(base_url()."staff/add_tool_skill") : form_open(base_url()."staff/edit_tool_skill/".$result->id_toolskill) ?>
            <div class="form-group">
                <label>Tools Name </label>
                <select class="form-control" name="id_tool" id="id_tool"  required>
                    <option></option>
                    <?php 
                        foreach($list as $v) {
                    ?>
                    <option value="<?php echo $v->id_tool ;?>" <?php echo isset($edit) ? ($v->id_tool == $result->id_tool ? 'selected' : '' ) : ''?>><?php echo $v->tool_name ;?></option>
                    <?php 
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label>Skills Name </label>
                <select name="skill" id="skill" class="form-control">
                    <option></option>
                <?php foreach($daftar as $skill){ ?>
                    <option value="<?php echo $skill->id_skill?>" <?php echo isset($edit) ? ($skill->id_skill == $result->id_skill ? 'selected' : '' ) : ''?>><?php echo $skill->skill_name ?></option>
                <?php }?>
                </select>
            </div>

            <input type="submit" class="btn btn-primary" name="submit" id="submit" value="Simpan" onClick="return confirm('Apakah anda yakin data yang anda isikan sudah benar dan sesuai?\nData yang disimpan sudah tidak dapat diubah lagi.')">
        <?php echo form_close()?>
    </div>
</div>




