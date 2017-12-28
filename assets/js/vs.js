/*
* Javascript needed in Vokasi Studio
*/

$(document).ready(function(){
  $('.table-data').DataTable() ;

  $('.select2').select2() ;

  $('#ptype').hide() ;
  $('#sskill').hide() ;
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