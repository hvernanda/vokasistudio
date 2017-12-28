<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
            <b>PROJECT UPDATE</b>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kru</th>
                                <th>Nama Proyek</th>
                                <th>Tugas</th>
                                <th>Lampiran</th>
                                <th>Komentar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                    $i=0;
                                    foreach($result as $proyek_update){
                                        if($proyek_update->id_activity){  
                                            $i++;         
                                            ?>                
                            <tr>
                                <td><?php echo $i ?> </td>
                                <td><?php echo $proyek_update->crew_name?> </td>
                                <td><?php echo $proyek_update->project?> </td>
                                <td><?php echo $proyek_update->crew_task?> </td>
                                <td><?php echo $proyek_update->crew_file?> </td>
                                 <td>
                                    <a href="#" class="btn btn-sm btn-info"></i>Komentar</a>
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
