<div class="row">
    <div class="col-md-6">
        <h4>All Tool Skill</h4>
    </div>
    <div class="col-md-3 pull-right text-right">
        <a href="<?php echo base_url('staff/add_tool_skill') ;?>" class="btn btn-info"><i class="fa fa-plus"></i> Add new Skill and Tools</a>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <b>TOOLS & SKILLS</b>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-data">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th> Skill </th>
                                <th> Tools </th>
                                <th> Aksi </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                    $i=0;
                                    foreach($result as $ts){
                                        if($ts->id_toolskill){  
                                            $i++;         
                                            ?>
                            
                
                            <tr>
                                <td><?php echo $i ?> </td>
                                <td><?php echo $ts->skill_name ?> </td>
                                <td><?php echo $ts->tool_name ?> </td>
                                <td>
                                    <a href="<?php echo base_url('staff/edit_tool_skill/'.$ts->id_toolskill) ;?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                                    <a href="#" class="btn btn-danger btn-xs"
                                      onclick="
                                      $().ready(function(e){
                                        swal({
                                        title : 'Are you sure?',
                                        text : 'Apa Anda yakin akan menghapus tool skill ini?',
                                        type : 'warning',
                                        showCancelButton : true,
                                        confirmButtonColor: '#DD6B55',
                                        confirmButtonText: 'Ya,  hapus!',
                                        cancelButtonText: 'Tidak, batalkan!'
                                        })
                                        .then((result) => {
                                            if(result.value){
                                            $.get('<?php echo base_url('staff/delete_tool_skill/'.$ts->id_toolskill) ;?>')
                                                .then((res) => {
                                                swal({
                                                    title : 'Deleted',
                                                    text : 'Data tool skill sudah terhapus',
                                                    type : 'success'
                                                }).then(() => (location.reload())) ;
                                                })
                                            .catch((err) => {
                                                swal({
                                                title : 'Error',
                                                text : 'Data tool skill tidak terhapus',
                                                type : 'error'
                                                }) ;
                                            })
                                            }else if(result.dismiss === 'cancel'){
                                            swal('Dibatalkan', 'Data skill tidak jadi dihapus', 'error') ;
                                            }
                                        })
                                    }) ;
                                      "
                                    ><i class="fa fa-trash"></i> Delete</a>
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