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
                                <th>id_project </th>
                                <th>Nama Proyek</th>
                                <th> Manajer Proyek </th>
                                <th> Status </th>
                                <th> Kontak Perusahan </th>
                                <th> Nama Perusahaan </th>
                                <th> Action </th>
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
                                <td><?php echo $proyek->id_project ?> </td>
                                <td><?php echo $proyek->name ?> </td>
                                <td>  </td>
                                <td><?php echo $proyek->status ?> </td>
                                <td><?php echo $proyek->name_contact ?> </td>
                                <td><?php echo $proyek->name_company ?> </td>
                                <td> </td>
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