<h1>Add proyek page</h1>
 <?php echo form_open_multipart (base_url()."riwayat_pendidikan/aksi_pendidikan") ?>

                                    <div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>

                                     <form role="form" method="post" name="submit">
                                        <!-- <div class="form-group">
                                            <label>ID KTP</label>
                                            <input class="form-control" name="" id="" value="<?php echo $_SESSION['id_ktp'] ?>" > -->
                                           <!--  <input type="hidden" name="id_ktp" id="id_ktp" value="<?php echo $_SESSION['id_ktp'] ?>"> -->
                                        <!-- </div> -->
                                     
                                        <div class="form-group">
                                            <label> Project Name</label>
                                            <input class="form-control" name="nama" id="nama" value="<?php echo set_value('nama');?>" required >
                                        </div>
                                         <div class="form-group">
                                            <label>Dealtime</label>
                                           <input type="date" class="form-control" name="Deadltime" value="<?php echo set_value('dealtime');?>" placeholder="dd-mm-yyy" required>
                                        </div>
                                         <div class="form-group">
                                            <label> Price</label>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">Rp</span>
                                            <input type="text" class="form-control" name="price" value="<?php echo set_value('price');?>" required>
                                            <span class="input-group-addon">,00</span>
                                        </div>
                                               
                                        <div class="form-group">
                                            <label>Deadline</label>
                                            <input type="date" class="form-control" name="Deadline" value="<?php echo set_value('Deadline');?>" placeholder="dd-mm-yyy" required>
                                        </div>
                                          <div class="form-group">
                                            <label>Revision Date</label>
                                            <input type="date" class="form-control" name="RevisionDate" value="<?php echo set_value('RevisionDate');?>" placeholder="dd-mm-yyy" required>
                                        </div>
                                          <div class="form-group">
                                            <label> Down Payment</label>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">Rp</span>
                                            <input type="text" class="form-control" name="price" value="<?php echo set_value('price');?>" required>
                                            <span class="input-group-addon">,00</span>
                                        </div>
                                        

                                      
                                        <input type="submit" class="btn btn-primary" name="submit" id="submit" value="Simpan" onClick="return confirm('Apakah anda yakin data yang anda isikan sudah benar dan sesuai?\nData yang disimpan sudah tidak dapat diubah lagi.')">
                                        <?php echo form_close()?>
                                    </form>
                                </div>