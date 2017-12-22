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
                    <th>Nama</th>
                    <th> Alamat </th>
                    <th>No.HP </th>
                    <th> Status </th>
                </tr>
            </thead>
            <tbody>
            	  <?php
                        $i=0;
                        foreach($result as $staff){
                            if($staff->id_staff){  
                                $i++;         
                                ?>
            	
	
                <tr>
                    <td><?php echo $i ?> </td>
                    <td><?php echo $staff->name ?> </td>
                    <td><?php echo $staff->address ?> </td>
                    <td><?php echo $staff->phone ?> </td>
                    <td><?php echo $staff->status_account ?> </td>
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