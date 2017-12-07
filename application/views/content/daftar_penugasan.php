<script type="text/javascript">
  function confirmSubmit(){
    var agree = confirm("Hapus?");
    if (agree)
      return true;
    else
      return false;
  }
</script>
<style type="text/css">
  
.bg-danger{
  /*color: #c94c4c;*/
  /*opacity: 1;*/
}
</style>

<!-- jQuery 2.2.0 -->
<script src="http://localhost:81/vokasistudioss/plugins/jQuery/jQuery-2.2.0.min.js"></script>
<section class="content-header">
  <h1>
    Penugasan
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
    <li class="active">Penugasan</li>
  </ol>
</section>
<div class="box-body btn-normal">
  <a href="<?php echo site_url('Daftar_penugasan/penugasan')?>">
            <button type="button" class="btn btn-primary">Penugasan</button>
    </a>
          
</div>
<section class="content">
      <div class="row">
        <div class="col-md-12">
         <div class="box">
         <?php echo $this->session->flashdata('msgfalseproject');?>
          <?php echo $this->session->flashdata('msgtrueproject');?>
            <div class="box-header">
              <h3 class="box-title">Penugasan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="tabel" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Status</th>
                  <th>Tugas</th>
                  <th>Detail Penugasan</th>
                  <th>Nama Kru</th>
                  <th>Waktu Diterima</th>
                  <th>Waktu Selesai</th>
                  <th>Nilai</th>
                </tr>
                  
                <tbody>
      
          <?php
            // print_r($crew);
            $no = 1;
            // var_dump($isi);
              foreach ($isi as $row){

          ?>
          <?php
            $waktuSkrg = date_create(); // waktu sekarang
            $batasAkhir  = date_create($row->deadline);
            // $diff  = date_diff($waktuSkrg, $batasAkhir );
            $diff  = date_diff($batasAkhir,$waktuSkrg);
            // print_r($diff)
            // print_r($waktuSkrg);
          ?>
               <!-- <?php if($diff->d == 0) echo '<tr class>' ?>  -->
                <tr>
                  <!-- <td> -->
                    <?php if ($row->deadline == 0): echo "<td class='btn-danger'> <center>Non-deadline</center> "; ?>
                    <?php elseif ($batasAkhir < $waktuSkrg): echo "<td class='btn-danger'> <center>lewat</center> "; ?>
                    <?php elseif ($batasAkhir > $waktuSkrg &&  $diff->m >=1 && $diff->y >= 0 ): echo "<td class='btn-success'><center>jauh</center> "; ?>
                    <?php elseif ($batasAkhir > $waktuSkrg  && $diff->m <1): echo "<td class='btn-warning'><center>dekat</center> "; ?>

                    <?php endif; ?>
                  </td>
                  <td><?php echo $row->jobname;?></td>
                  <td><?php echo $row->name;?></td>
                  <td>
                    <!-- <center> -->
                      <button type="button" class="btn btn-primary form-control " data-name= "<?php echo $row->name ?>" data-toggle="modal" data-target="#modalKru"
                      ><i class="fa fa-users" aria-hidden="true"></i></button>
                    <!-- </center> -->
                  </td>
                  <td><?php $tgl = date('d F Y',strtotime($row->acceptanceDate)); echo $tgl ;?></td>
                  <?php if ($row->deadline == 0): echo "<td>Tidak ada deadline</td> "; ?>
                  <?php elseif ($row->deadline != 0):  $tgld = date('d F Y',strtotime($row->deadline)); echo "<td>".$tgld."</td> "; ?>
                   
                  <?php endif; ?>
                  <td>
                    <button type="button" class="btn btn-primary form-control" data-score= "<?php echo $row->name ?>" data-toggle="modal" data-target="#myModal"
                    ><span class="fa fa-fw fa-star"></span></button>
                  </td>                
                </tr>

          <?php 
            }
          ?>

                  </tbody>        
                </thead>
              </table>
              <!-- <tbody>
              <tr>
                <p>jauh : waktu selesai >= 1 bulan</p>
                <p>dekat : waktu selesai < 1 bulan</p>
                <p>lewat : waktu pengerjaan melebihi waktu selesai</p>
                <p>non-deadline : penugasan tidak memiliki batasan waktu</p>
              </tr>
              </tbody> -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
    </div>
    <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Score</h4>
        </div>
        <div class="modal-body">
          <table class="table table-bordered table-striped">
            <thead>
              <th>Nama Kru</th>
              <th>Score</th>
              <th></th>
            </thead>
          <tbody id="appendRating">
            <tr>
              <form>
                <td>test</td>
                <td><input type="text" class="form-control" value="xrating"></td>
                <td><button class="btn btn-danger"> Edit Score</button></td>
              </form>
            </tr>
            <tr>
                <td>test</td>
                <td></td>
                <td>test</td>
              </tr>
          </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      </div>
      </div>


    <div class="modal fade" id="modalKru" role="dialog">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Kru</h4>
        </div>
        <div class="modal-body"> 
          <table class="table table-bordered table-striped">
            <thead>
              <td>Nama Kru</td>
              <td>Upah</td>
              <td></td>
            </thead>
            <tbody id='appendCrew'>
              <tr>
                <form>
                  <td>test</td>
                  <td><input type="text" class="form-control" value="somefee"> </td>
                  <td><button class="btn btn-success"> Edit Upah</button></td>
                </form>
              </tr>
              <tr>
                <td>test</td>
                <td></td>
                <td>test</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </div>
        </div>
        </div>
        
</section>

<script type="text/javascript">
$(document).ready(function(){

  $('#modalKru').on('show.bs.modal',function(event){
    var button = $(event.relatedTarget);

      $('#appendCrew').empty();
      var taskName = button.data('name');
      console.log(taskName);
      $.ajax({
        url     : "<?php echo site_url('Daftar_penugasan/getFee') ?>",
        type    :'post',
        dataType : 'json',
        data    :{
          _name : taskName
        },
        success : function(result){
          console.log(result);
          // e.length;
          if (result=='fail') {
              console.log('gagal')
          } else{

            $.each(result,function(key,value){

              var unique = result[key]['id_jobassignment'];
              var fee    = result[key]['fee'];
              var name   = result[key]['nama']; 

              $('#appendCrew').append(' \
                  <tr> \
                    <form id="'+unique+'"> \
                      <td> '+name+'</td> \
                      <td> <input type="number" class="form-control"  value="'+fee+'" id="fee-'+unique+'"> </td> \
                      <td> <button class="btn btn-success btn-save-fee" data-uniq='+unique+' >  Ubah Upah </button> </td> \
                    </form>\
                  </tr> \
              ')

            });

          };
        },
        error    : function(e){
          console.log(e);;
        }
      });

  }); 

}) 
</script>

<script type="text/javascript">
$(document).ready(function(){

  $('#myModal').on('show.bs.modal',function(event){
    var button = $(event.relatedTarget);

      $('#appendRating').empty();
      var taskName = button.data('score');
      console.log(taskName);
      $.ajax({
        url     : "<?php echo site_url('Daftar_penugasan/getScore') ?>",
        type    :'post',
        dataType : 'json',
        data    :{
          _score : taskName
        },
        success : function(result){
          console.log(result);
          // e.length;
          if (result=='fail') {
              console.log('gagal')
          } else{

            $.each(result,function(key,value){

              var unique = result[key]['id_jobassignment'];
              var rating    = result[key]['rating'];
              var name   = result[key]['nama']; 
          
            $('#appendRating').append(' \
            <tr> \
              <form id="'+unique+'"> \
                <td> '+name+'</td> \
                <td> <input type="number" class="form-control" value="'+rating+'" id="score-'+unique+'"> </td> \
                <td> <button class="btn btn-primary btn-save-score" data-uniq='+unique+'> Simpan Score </button> </td> \
              </form> \
            </tr> \
          ')

            });

          };
        },
        error    : function(e){
          console.log(e);;
        }
      });

  }); 

}) 
</script>
<script type="text/javascript">
  $(document).on('click','.btn-save-score',function(){
    var id  = $(this).data('uniq');
    var val = $('#score-'+id).val();
    // console.log(val);
    $.ajax({
      url       :"<?php echo site_url('Daftar_penugasan/setScore') ?>",
      type      :'post',
      // dataType  : 'json',
      data      :{
        _id   : id,
        _val  : val,
      },
      success  : function(e){
        // console.log(e)
        if (e!='fail') {
          alert('score berhasil dimasukkan ke sistem.');
        }else{
          alert('score gagal dimasukkan ke dalam sistem');
        };
      },
      error   : function(e){
        console.log(e);
      }
    });
  });
</script>

<script type="text/javascript">
  $(document).on('click', '.btn-save-fee',function(){
    var id = $(this).data('uniq');
    var val = $('#fee-'+id).val();
    $.ajax({
      url   :"<?php echo site_url('Daftar_penugasan/setFee') ?>",
      type  :'post',
      data    :{
        _id   : id,
        _val  : val,
      },
      success   : function(e){
        if (e!='fail') {
          alert('upah berhasil dimasukan ke sistem.');
        }else{
          alert('upah gagal dimasukkan ke dalam sistem');
        };
      },
      error   : function(e){
        console.log(e);
      }
    });
  });
</script>