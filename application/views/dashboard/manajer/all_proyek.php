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
                                <th>Manajer Proyek</th>
                                <th>Nama Perusahaan</th>
                                <th>Kontak</th>
                                <th>Status</th>
                                <th>Aksi</th>
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
                                <td><?php echo "NULL" ?> </td>
                                <td><?php echo $proyek->name_company ?> </td>
                                <td><?php echo $proyek->name_contact ?> </td>
                                <td><?php 
                                    if($proyek->status == 'on_process')
                                        echo '<span class="label label-warning">On Process</span>' ;
                                    elseif($proyek->status == 'done')
                                        echo '<span class="label label-success">Finished</span>' ;
                                    else
                                        echo '<span class="label label-danger">Canceled</span>' ;
                                ?></td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-info"><i class="fa fa-eye"></i> View</a>
                                    <a href="#" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i> Edit</a>
                                </td>
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