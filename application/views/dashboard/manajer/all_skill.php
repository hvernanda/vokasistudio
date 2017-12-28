<div class="row">
    <div class="col-md-6">
        <h4>All Skills</h4>
    </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="panel panel-default">
      <div class="panel-heading"><b>ALL SKILLS</b></div>
      <div class="panel-body">
        <table class="table table-data">
          <thead>
            <tr>
              <th>#</th>
              <th>Skills Name</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach($result as $type){ ?>
            <tr>
              <td><?php echo $type->id_skill ;?></td>
              <td><?php echo $type->skill_name ;?></td>
              <td>
                <a href="#" class="btn btn-info btn-xs" onclick="showEditSkill('<?php echo $type->id_skill ;?>', '<?php echo $type->skill_name ;?>')"><i class="fa fa-pencil"></i> Edit</a>
              </td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="panel panel-default">
      <div class="panel-heading"><b>ADD NEW SKILLS </b></div>
      <div class="panel-body">
        <?php echo form_open(base_url('staff/add_skill')) ;?>
        <?php if($this->session->flashdata('warning_skill')){ ?>
          <div class="alert alert-danger">
            <?php echo $this->session->flashdata('warning_skill') ;?>
          </div>
        <?php } ?>
          <div class="form-group">
            <label> SKILL NAME</label>
            <input type="text" name="name" class="form-control" id="name" required/>
          </div>
          <div class="form-group">
            <input type="submit" name="submit" class="btn btn-success" value="Add Skill" />
          </div>
        <?php echo form_close() ;?>
      </div>
    </div>

    <div id="sskill" class="panel panel-default">
      <div class="panel-heading"><b>EDIT SKILL</b></div>
      <div class="panel-body">
          <?php echo form_open('staff/edit_skill') ;?>
          <?php if($this->session->flashdata('warning_edit_skill')){ ?>
            <div class="alert alert-danger">
              <?php echo $this->session->flashdata('warning_edit_skill') ;?>
            </div>
          <?php } ?>
            <div class="form-group">
              <label>SKILL NAME</label>
              <input type="text" name="name" class="form-control" id="name_edit" required/>
            </div>
            <div class="form-group">
              <input type="hidden" name="id_skill" id="id_skill_edit"/>
              <input type="submit" name="submit" class="btn btn-warning" value="Edit skill" />
            </div>
          <?php echo form_close() ;?>
      </div>
    </div>
  </div>
</div>