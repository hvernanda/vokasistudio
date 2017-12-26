<div class="row">
    <div class="col-md-6">
        <h4>All Projects Type</h4>
    </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="panel panel-default">
      <div class="panel-heading"><b>ALL PROJECT TYPE</b></div>
      <div class="panel-body">
        <table class="table table-data">
          <thead>
            <tr>
              <th>#</th>
              <th>Tipe Proyek</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach($result as $type){ ?>
            <tr>
              <td><?php echo $type->id_type ;?></td>
              <td><?php echo $type->name ;?></td>
              <td>
                <a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit</a>
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
      <div class="panel-heading"><b>ADD NEW TYPE</b></div>
      <div class="panel-body">
        <?php echo form_open(base_url('project/add_type')) ;?>
        <?php if($this->session->flashdata('warning_type')){ ?>
          <div class="alert alert-danger">
            <?php echo $this->session->flashdata('warning_type') ;?>
          </div>
        <?php } ?>
          <div class="form-group">
            <label>Project Type</label>
            <input type="text" name="name" class="form-control" id="name" required/>
          </div>
          <div class="form-group">
            <input type="submit" name="submit" class="btn btn-success" value="Add type" />
          </div>
        <?php echo form_close() ;?>
      </div>
    </div>
  </div>
</div>