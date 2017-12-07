      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box box-solid">
                    
                    <div>
                        <?php echo $this->session->flashdata('message') ; ?>
                        <?php echo $this->session->flashdata('message1') ; ?>
                    </div>

                    <div class="box-header with-border">
                    <h5 class="box-title">Edit Profil</h5>
                    </div>
            </div>
                <div class="row">
                <div class="col-xs-12">
                <div class="box-body box-profile">
                <?php foreach ($result as $row) :?>
                <form class="form-horizontal" action="<?php echo site_url('profil/editProfil') ?>" method="POST" id="formEditUser">  
                    <div class="form-group">
                        <label for="inputName" class="col-sm-3 control-label">Nama</label>
                        <div class="col-sm-8">
                            <input id="nama" type="text" class="form-control" name="nama" placeholder="Nama Lengkap" value="<?php echo $row->name ?>" required/>

                            <input id="id" type="hidden" class="form-control" name="id" value="<?php echo $row->id_company ?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="col-sm-3 control-label">Alamat</label>
                        <div class="col-sm-8">
                            <input id="address" type="textarea" class="form-control" name="address" placeholder="Alamat" value="<?php echo $row->address ?>" required></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="col-sm-3 control-label">No. HP</label>
                        <div class="col-sm-8">
                            <input id="phone" type="text" class="form-control" name="phone" placeholder="No. HP" value="<?php echo $row->phone ?>" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-8">
                            <input id="email" type="text" class="form-control" name="email" placeholder="Email" value="<?php echo $row->email ?>" required/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputName" class="col-sm-3 control-label">Password</label>
                        <div class="col-sm-8">
                            <input id="password1" type="password" class="form-control" name="password1" placeholder="Password" value="<?php echo $row->password ?>" required/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputName" class="col-sm-3 control-label">Konfirmasi Password</label>
                        <div class="col-sm-8">
                            <input id="password2" type="password" class="form-control" name="konfirmasi" placeholder="Password" value="<?php echo $row->password ?>" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-5 col-sm-2">
                            <button type="submit" class="btn btn-default btn-block">Simpan</button>
                        </div>
                    </div>
                </form>   
          <?php endforeach; ?>

        </div>
              <!-- /.box -->
        </div>
        </div>
    </div>
    </div>
    </div>
  <script>

  $('#formEditUser').submit(function(ev) {
    ev.preventDefault(); // to stop the form from submitting
    /* Validations go here */
    if($('#password1').val()==$('#password2').val()){
    this.submit(); // If all the validations succeeded
}else{
    alert('Konfirmasi password tidak cocok');
}
});
</script>