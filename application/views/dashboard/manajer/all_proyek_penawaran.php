<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
            <b> DATA  PENAWARAN PROYEK VOKASI STUDIO </b>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-data">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Proyek</th>
                                <th> Nama Staff </th>
                                <th> Status </th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                    $i=0;
                                    foreach($result as $proyek){  
                                            $i++;         
                                            ?>
                            
                
                            <tr>
                                <td><?php echo $i ?> </td>
                                <td><?php echo $proyek->project ?> </td>
                                <td><?php echo $proyek->manpro_name ?> </td>
                                <td>
                                    <?php 
                                        if($proyek->status == '0')
                                            echo '<span class="label label-warning">Menunggu Konfirmasi</span>' ;
                                        else if($proyek->status == '1')
                                            echo '<span class="label label-success">Diterima</span>' ;
                                        else
                                            echo '<span class="label label-danger">Ditolak</span>' ;
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        if($proyek->status == '-1')
                                            echo "Pilih manajer baru" ;
                                        else
                                            echo "<em>Tidak ada</em>" ;
                                    ?>
                                </td>
                            </tr>
                        
                            <?php 
                                    }
                                    ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>