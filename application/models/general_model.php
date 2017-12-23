<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  class general_model extends CI_Model{
    public function convertDate($date){
      $tgl = substr($date, 8, 2) ;
      $bln = intval(substr($date, 5, 2)) ;
      $thn = substr($date, 0, 4) ;

      switch($bln){
        case 1: $bb = 'Januari';
        case 2: $bb = 'Februari';
        case 3: $bb = 'Maret';
        case 4: $bb = 'April';
        case 5: $bb = 'Mei';
        case 6: $bb = 'Juni';
        case 7: $bb = 'Juli';
        case 8: $bb = 'Agustus';
        case 9: $bb = 'September';
        case 10: $bb = 'Oktober';
        case 11: $bb = 'November';
        default: $bb = 'Desember';
      }

      return $tgl.' '.$bb.' '.$thn;
    }
  }

?>