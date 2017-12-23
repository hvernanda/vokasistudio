<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
            <b> DATA  PENAWARAN PROYEK VOKASI STUDIO </b>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Proyek</th>
                                <th> Kontak Perusahan </th>
                                <th> Nama Perusahaan </th>
                                <th> Status </th>
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
                                <td><?php echo $proyek->name_contact ?> </td>
                                <td><?php echo $proyek->name_company ?> </td>
                                <td><?php echo $proyek->status ?> </td>
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
</div>