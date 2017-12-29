<div class="row">
    <div class="col-md-6">
        <h4>Penawaran Proyek</h4>
    </div>
    <div class="col-md-3 pull-right text-right">
        <a href="<?php echo base_url('project/add_penawaran') ;?>" class="btn btn-info"><i class="fa fa-plus"></i> Add new penawaran</a>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
            <b> DATA  PENAWARAN PROYEK VOKASI STUDIO </b>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table class="table table-data">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Proyek</th>
                            <th> Nama Staff </th>
                            <th> Status </th>
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