<legend><?php echo $title;?></legend>
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" />
    <?php echo validation_errors(); echo $message;?>
    <div class="form-group">
        <label class="col-lg-2 control-label">Id</label>
        <div class="col-lg-5">
            <input type="text" name="idproject" class="form-control">
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-lg-2 control-label">Nama</label>
        <div class="col-lg-5">
            <input type="text" name="nama_project" class="form-control">
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-lg-2 control-label">Status</label>
        <div class="col-lg-5">
            <select name="status" class="form-control">
				<option></option>
				<option value="L">Laki - Laki</option>
				<option value="P">Perempuan</option>
			</select>
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-lg-2 control-label">DP</label>
        <div class="col-lg-5">
            <input type="text" name="dp" class="form-control">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">Harga Project</label>
        <div class="col-lg-5">
            <input type="text" name="harga_project" class="form-control">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">Deal Time</label>
        <div class="col-lg-5">
            <input type="text" name="dealtime" class="form-control">
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-lg-2 control-label">Dateline</label>
        <div class="col-lg-5">
            <input type="text" name="dateline" class="form-control">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2 control-label">Revision Dateline</label>
        <div class="col-lg-5">
            <input type="text" name="revision_dateline" class="form-control">
        </div>
    </div>
    
    <div class="form-group well">
        <button class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>
        <a href="<?php echo site_url('Pegawai/index');?>" class="btn btn-default">Kembali</a>
    </div>
</form>