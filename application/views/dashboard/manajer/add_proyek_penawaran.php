<h1 class="text-center">
  Add Proyek Penawaran
</h1>

<div class="row">
  <div class="col-md-4 col-md-offset-4">
    <?php 
      if(validation_errors()){
    ?>
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

        <h4><i class="fa fa-ban"></i> Warning</h4>
        <?php echo validation_errors() ;?>
      </div>
    <?php } ?>
    <?php echo form_open(base_url('project/add_penawaran')) ;?>
      <div class="form-group">
        <label>Proyek Name</label>
        <select name="proyek" class="form-control" required="required">
          <option></option>
          <?php foreach($projects as $project) { ?>
            <option value="<?php echo $project->id_project?>"><?php echo $project->name?></option>
          <?php } ?>
        </select>
      </div>
      <div class="form-group">
        <label>Staff Name</label>
        <select name="staff" class="form-control" required="required">
          <option></option>
          <?php foreach($staffs as $staff){ ?>
            <option value="<?php echo $staff->id_staff?>"><?php echo $staff->name?></option>
          <?php } ?>
        </select>
      </div>
      <div class="form-group">
        <input type="submit" name="submit" value="Add Penawaran Proyek" class="btn btn-primary" />
      </div>
    <?php echo form_close() ;?>
  </div>
</div>