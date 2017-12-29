/*
* Javascript needed in Vokasi Studio
*/

$(document).ready(function(){
  $('.table-data').DataTable() ;

  $('.select2').select2() ;

  $('#ptype').hide() ;
  $('#sskill').hide() ;
  $('#form-hutang').hide() ;
  $('#hide-form-debt').hide() ;
})

function showEdit(id_type, type){
  $('#ptype').fadeIn()
  $('#name_edit').val(type)
  $('#id_type_edit').val(id_type)
}

function showEditSkill(id_type, type){
  $('#sskill').fadeIn()
  $('#name_edit').val(type)
  $('#id_skill_edit').val(id_type)
}

function showDeleteProyekAlert(event, id){
  event.preventDefault() ;
  swal({
    title : 'Are you sure?',
    text : 'Apa Anda yakin akan menghapus data ini?',
    type : 'warning',
    showCancelButton : true,
    confirmButtonColor: '#DD6B55',
    confirmButtonText: 'Ya,  hapus!',
    cancelButtonText: 'Tidak, batalkan!'
  })
    .then((result) => {
      if(result.value){
        location.href = 'delete/' + id
        return true ;
      }else if(result.dismiss === 'cancel'){
        swal('Dibatalkan', 'Data tidak jadi dihapus', 'error') ;
        return false ;
      }
    })
}

function showForm(){
  $('#form-hutang').fadeIn() ;
  $('#hide-form-debt').fadeIn().prop("checked", false) ;
  $('#show-form-debt').fadeOut() ;
}
function hideForm(){
  $('#form-hutang').fadeOut() ;
  $('#show-form-debt').fadeIn().prop("checked", false) ;
  $('#hide-form-debt').fadeOut() ;
}