<h1> SEMUA DATA COMPANY </h1>
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
                    <th> Phone </th>
                    <th> Email </th>
                    <th> Alamat </th>
                </tr>
            </thead>
            <tbody>
            	  <?php
                        $i=0;
                        foreach($result as $company){
                            if($company->id_company){  
                                $i++;         
                                ?>
            	
	
                <tr>
                    <td><?php echo $i ?> </td>
                    <td><?php echo $company->name ?> </td>
                    <td><?php echo $company->phone ?> </td>
                    <td><?php echo $company->email ?> </td>
                    <td><?php echo $company->address ?> </td>
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