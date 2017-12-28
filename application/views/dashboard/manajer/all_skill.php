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
          <?php $i=0; foreach($result as $type){ $i++; ?>
            <tr>
              <td><?php echo $i ;?></td>
              <td><?php echo $type->skill_name ;?></td>
              <td>
                <a href="#" class="btn btn-info btn-xs" onclick="showEditSkill('<?php echo $type->id_skill ;?>', '<?php echo $type->skill_name ;?>')"><i class="fa fa-pencil"></i> Edit</a>
                <a href="#" class="btn btn-danger btn-xs"
                  onclick="
                  $().ready(function(e){
                    swal({
                      title : 'Are you sure?',
                      text : 'Apa Anda yakin akan menghapus skill ini?',
                      type : 'warning',
                      showCancelButton : true,
                      confirmButtonColor: '#DD6B55',
                      confirmButtonText: 'Ya,  hapus!',
                      cancelButtonText: 'Tidak, batalkan!'
                    })
                      .then((result) => {
                        if(result.value){
                          $.get('<?php echo base_url('staff/delete_skill/'.$type->id_skill) ;?>')
                            .then((res) => {
                              swal({
                                title : 'Deleted',
                                text : 'Data skill sudah terhapus',
                                type : 'success'
                              }).then(() => (location.reload())) ;
                            })
                          .catch((err) => {
                            swal({
                              title : 'Error',
                              text : 'Data skill tidak terhapus',
                              type : 'error'
                            }).then(() => (location.reload())) ;
                          })
                        }else if(result.dismiss === 'cancel'){
                          swal('Dibatalkan', 'Data skill tidak jadi dihapus', 'error') ;
                        }
                      })
                  }) ;
                  "
                ><i class="fa fa-trash"></i> Delete</a>
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