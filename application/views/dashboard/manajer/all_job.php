<div class="row">
    <div class="col-md-6">
        <h4>All Job Type</h4>
    </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="panel panel-default">
      <div class="panel-heading"><b>ALL JOB TYPE</b></div>
      <div class="panel-body">
        <table class="table table-data">
          <thead>
            <tr>
              <th>#</th>
              <th>Tipe Job</th>
              <th>Fee</th>
               <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach($result as $job){ ?>
            <tr>
              <td><?php echo $job->id_job ;?></td>
              <td><?php echo $job->name ;?></td>
               <td><?php echo $job->fee ;?></td>
               <td>
                <a href="#" class="btn btn-info btn-xs" onclick="showEdit('<?php echo $job->id_job ;?>', '<?php echo $job->name ;?>')"><i class="fa fa-pencil"></i> Edit</a>
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
      <div class="panel-heading"><b>ADD NEW JOB</b></div>
      <div class="panel-body">
        <?php echo form_open(base_url('project/add_job')) ;?>
        <?php if($this->session->flashdata('warning_type')){ ?>
          <div class="alert alert-danger">
            <?php echo $this->session->flashdata('warning_type') ;?>
          </div>
        <?php } ?>
          <div class="form-group">
            <label>Job Type</label>
            <input type="text" name="name" class="form-control" id="name" required/>
            <label>Fee</label>
             <input type="text" name="fee" class="form-control" id="fee" required/>
          </div>
          <div class="form-group">
            <input type="submit" name="submit" class="btn btn-success" value="Add fee" />
          </div>
        <?php echo form_close() ;?>
      </div>
    </div>

    <div id="ptype" class="panel panel-default">
      <div class="panel-heading"><b>EDIT JOB TYPE</b></div>
      <div class="panel-body">
          <?php echo form_open('project/edit_job') ;?>
          <?php if($this->session->flashdata('warning_edit_type')){ ?>
            <div class="alert alert-danger">
              <?php echo $this->session->flashdata('warning_edit_type') ;?>
            </div>
          <?php } ?>
            <div class="form-group">
              <label>Job Type</label>
              <input type="text" name="name" class="form-control" id="name_edit" required/>
            </div>
            <div class="form-group">
              <label> Fee Job Type</label>
              <input type="text" name="fee" class="form-control" id="fee_edit" required/>
            </div>
            <div class="form-group">
              <input type="hidden" name="id_job" id="id_job_edit"/>
              <input type="submit" name="submit" class="btn btn-warning" value="Edit Job" />
            </div>
          <?php echo form_close() ;?>
      </div>
    </div>
  </div>
</div>