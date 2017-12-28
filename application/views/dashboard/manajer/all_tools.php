<div class="row">
    <div class="col-md-6">
        <h4>All Tools</h4>
    </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="panel panel-default">
      <div class="panel-heading"><b>ALL TOOLS</b></div>
      <div class="panel-body">
        <table class="table table-data">
          <thead>
            <tr>
              <th>#</th>
              <th>Tools Name</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach($result as $type){ ?>
            <tr>
              <td><?php echo $type->id_tool ;?></td>
              <td><?php echo $type->tool_name ;?></td>
              <td>
                <a href="#" class="btn btn-info btn-xs" onclick="showEdit('<?php echo $type->id_tool ;?>', '<?php echo $type->tool_name ;?>')"><i class="fa fa-pencil"></i> Edit</a>
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
      <div class="panel-heading"><b>ADD NEW TOOLS</b></div>
      <div class="panel-body">
        <?php echo form_open(base_url('staff/add_tool')) ;?>
        <?php if($this->session->flashdata('warning_type')){ ?>
          <div class="alert alert-danger">
            <?php echo $this->session->flashdata('warning_type') ;?>
          </div>
        <?php } ?>
          <div class="form-group">
            <label> TOOL NAME</label>
            <input type="text" name="name" class="form-control" id="name" required/>
          </div>
          <div class="form-group">
            <input type="submit" name="submit" class="btn btn-success" value="Add Tool" />
          </div>
        <?php echo form_close() ;?>
      </div>
    </div>

    <div id="ptype" class="panel panel-default">
      <div class="panel-heading"><b>EDIT TOOLS</b></div>
      <div class="panel-body">
          <?php echo form_open('staff/edit_tool') ;?>
          <?php if($this->session->flashdata('warning_edit_tools')){ ?>
            <div class="alert alert-danger">
              <?php echo $this->session->flashdata('warning_edit_tools') ;?>
            </div>
          <?php } ?>
            <div class="form-group">
              <label>TOOL NAME</label>
              <input type="text" name="name" class="form-control" id="name_edit" required/>
            </div>
            <div class="form-group">
              <input type="hidden" name="id_tool" id="id_type_edit"/>
              <input type="submit" name="submit" class="btn btn-warning" value="Edit Tool" />
            </div>
          <?php echo form_close() ;?>
      </div>
    </div>
  </div>
</div>