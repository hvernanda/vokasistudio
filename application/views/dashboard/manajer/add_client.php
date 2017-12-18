<h1>Add Client Contact</h1>
<!-- <?php echo form_open_multipart (base_url()."riwayat_pendidikan/aksi_pendidikan") ?> -->

<div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>

<form role="form" method="post" name="submit" action="<?php echo base_url ('manajer/add_client_process')?>">

                                        <!-- <div class="form-group">
                                            <label>ID KTP</label>
                                            <input class="form-control" name="" id="" value="<?php echo $_SESSION['id_ktp'] ?>" > -->
                                            <!--  <input type="hidden" name="id_ktp" id="id_ktp" value="<?php echo $_SESSION['id_ktp'] ?>"> -->
                                            <!-- </div> -->

                                            <div class="form-group">
                                                <label> Nama </label>
                                                <input class="form-control" name="nama" id="nama" value="<?php echo set_value('nama');?>" required >
                                            </div>
                                            <div class="form-group">
                                                <label> Email </label>
                                                <input class="form-control" name="email" id="email" value="<?php echo set_value('email');?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label> Password </label>
                                                <input class="form-control" name="password" id="password" value="<?php echo set_value('password');?>" required>
                                            </div>



                                            <input type="submit" class="btn btn-primary" name="submit" id="submit" value="Simpan" onClick="return confirm('Apakah anda yakin data yang anda isikan sudah benar dan sesuai?\nData yang disimpan sudah tidak dapat diubah lagi.')">
                                            <?php echo form_close()?>
                                        </form>
                                    </div>