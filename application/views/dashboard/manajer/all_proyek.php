<div class="row">
    <div class="col-md-6">
        <h4>All Projects</h4>
    </div>
    <div class="col-md-3 pull-right text-right">
        <a href="<?php echo base_url('project/add') ;?>" class="btn btn-info"><i class="fa fa-plus"></i> Add new project</a>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
            <b> DATA PROYEK VOKASI STUDIO </b>
            </div>
            <div class="panel-body">
                <table class="table table-data">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Proyek</th>
                            <th>Manajer Proyek</th>
                            <th>Nama Perusahaan</th>
                            <th>Kontak</th>
                            <th>Progress</th>
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
                            <td><?php echo $proyek->pm_name ? $proyek->pm_name : "NULL" ?> </td>
                            <td><?php echo $proyek->name_company ?> </td>
                            <td><?php echo $proyek->name_contact ?> </td>
                            <td>
                                <div class="clearfix"><span class="small pull-right">90%</span></div>
                                <div class="progress xs">
                                    <div class="progress-bar progress-bar-green" style="width:90%"></div>
                                </div>
                            </td>
                            <td><?php 
                                if($proyek->status == 'on_process')
                                    echo '<span class="label label-warning">On Process</span>' ;
                                elseif($proyek->status == 'done')
                                    echo '<span class="label label-success">Finished</span>' ;
                                else
                                    echo '<span class="label label-danger">Canceled</span>' ;
                            ?></td>
                            <td>
                                <a href="#" class="btn btn-sm btn-info btn-xs"><i class="fa fa-eye"></i> View</a>
                                <a href="<?php echo base_url('/project/edit/'.$proyek->id_project)?>" class="btn btn-sm btn-success btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                                <a href="<?php echo base_url('/project/delete/'.$proyek->id_project) ;?>" onclick="return showDeleteProyekAlert(event, '<?php echo $proyek->id_project ?>')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>
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
</div