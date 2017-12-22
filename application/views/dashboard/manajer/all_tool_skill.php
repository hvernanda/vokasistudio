<?php
    print_r($result);
    
?>
<h1> SEMUA DATA STAFF </h1>

<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">
</div>
<!-- /.panel-heading -->
<div class="panel-body">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th> Skill </th>
                    <th> Tools </th>
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
                    
                </tr>
               
                   <?php 
                            }
                        }

                        ?>
            </tbody>
        </table>
    </div>
    <!-- /.table-responsive -->
</div>
<!-- /.panel-body -->
</div>
<!-- /.panel -->
</div>
<!-- /.col-lg-6 -->
</div>
<!-- /.row -->