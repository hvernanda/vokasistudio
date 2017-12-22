<h1> SEMUA DATA KONTAK PERUSAHAAN </h1>
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
                    <th>Phone </th>
                    <th> Email </th>
                    <th> Project </th>
                    <th> Status Project </th>
                    <th> Company </th>
                </tr>
            </thead>
            <tbody>
            	  <?php
                        $i=0;
                        foreach($result as $contact){
                            //if($contact->id_user){  
                                $i++;         
                                ?>
            	
	
                <tr>
                    <td><?php echo $i ?> </td>
                    <td><?php echo $contact->nama ?> </td>
                    <td><?php echo $contact->phone ?> </td>
                    <td><?php echo $contact->email ?> </td>
                    <td><?php echo $contact->nampro ?> </td>
                    <td><?php echo $contact->status ?> </td>
                    <td><?php echo $contact->company ?> </td>
                </tr>
               
                   <?php 
                            }
                        //}

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