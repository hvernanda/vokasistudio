<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
            <b> DATA PROYEK VOKASI STUDIO </b>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Proyek</th>
                                <th> Tanggal terima </th>
                                <th>Harga </th>
                                <th> Batas Waktu </th>
                                <th> Tanggal Revisi</th>
                                <th> Status </th>
                                <th> Uang Muka </th>
                                <th> Kontak Perusahan </th>
                                <th> Nama Perusahaan </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                    $i=0;
                                    foreach($result as $proyek){
                                        if($proyek->id_project){  
                                            $i++;         
                                            ?>
                            
                
                            <tr>
                                <td><?php echo $i ?> </td>
                                <td><?php echo $proyek->name ?> </td>
                                <td><?php echo $general->convertDate($proyek->dealtime); ?> </td>
                                <td><?php echo 'Rp'.number_format($proyek->price, 2, ',', '.') ?> </td>
                                <td><?php echo $general->convertDate($proyek->deadline) ?> </td>
                                <td><?php echo $general->convertDate($proyek->revision_deadline) ?> </td>
                                <td><?php echo $proyek->status ?> </td>
                                <td><?php echo 'Rp'.number_format($proyek->DP, 2, ',', '.') ?> </td>
                                <td><?php echo $proyek->name_contact ?> </td>
                                <td><?php echo $proyek->name_company ?> </td>
                            </tr>
                        
                            <?php 
                                        }
                                    }

                                    ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div