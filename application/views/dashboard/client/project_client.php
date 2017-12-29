<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
            <b> DATA PROYEK CLIENT</b>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Proyek</th>
                                <th>Deal Time</th>
                                <th>Deadline</th>
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
                                <td><?php echo $proyek->name?> </td>
                                <td><?php echo $general->convertDate($proyek->dealtime)?> </td>
                                <td><?php echo $general->convertDate($proyek->deadline)?> </td>
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