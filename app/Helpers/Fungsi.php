<?php
namespace App\Helpers;


class Fungsi {


  public function timer()
  {
      $time = explode(' ', microtime());
      return $time[0]+$time[1];
  }

  public function toAlpha($n,$case = 'upper'){
      $alphabet   = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
      $n = $n - 1;
      // Util::error_log('N'.$n);
      if($n <= 26){
          $alpha =  $alphabet[$n];
      } elseif($n > 26) {
          $dividend   = ($n);
          $alpha      = '';
          $modulo;
          while($dividend > 0){
              $modulo     = ($dividend - 1) % 26;
              $alpha      = $alphabet[$modulo].$alpha;
              $dividend   = floor((($dividend - $modulo) / 26));
          }
      }

      if($case=='lower'){
          $alpha = strtolower($alpha);
      }
      // Util::error_log("**************".$alpha);
      return $alpha;
  }



 public function file_get_contents_curl($url) {
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_HEADER, 0);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //Set curl to return the data instead of printing it to the browser.
      curl_setopt($ch, CURLOPT_URL, $url);
      $data = curl_exec($ch);
       if ($data === FALSE) {
        $data = NULL;
       }      
      curl_close($ch);
      return $data;
  }



 	public function get_http_response_code($url) {
    	$headers = get_headers($url);
    	return substr($headers[0], 9, 3);
	}



	public function check_url($url){
	  $array = get_headers($url);
	  $string = $array[0];
	  if(strpos($string,"200"))
	    {
	      $data = 1; //ada
	    }
	    else
	    {
	      $data = 0; //tidak ada /404
	    }  
	    return $data;
	}





	public function limit_karakter($str){
	    if(strlen($str) >=35 ){
	      $pecah_str = explode(".", $str);
	      $ekstensi =  $pecah_str[count($pecah_str) - 1];
	      $output = substr($str, 0, 35).'.'.$ekstensi;
	    }else{
	      $output = $str;
	    }
	    return $output;
	}


  

  public function filter($val = null){
    if($val != NULL){
    $str = str_replace(['\r', '\n'], '',  $val);
    $o = explode(" ", $str);
    $jml = count($o) -1;
      for($i=0;$i<=$jml;$i++){
        $o[$i] = trim($o[$i]);
      }
    $str = implode(" ", $o);
    return HTML::entities($str);
  }else{
    return NULL;
  }
  }

  public function HitungUmur($tgllhr){
     list($tgl,$bln,$thn) = explode('-',$tgllhr);
     $lahir = mktime(0, 0, 0, (int)$bln, (int)$tgl, $thn);
     $t = time();
     $umur = ($lahir < 0) ? ( $t + ($lahir * -1) ) : $t - $lahir;
     $tahun = 60 * 60 * 24 * 365;
     $tahunlahir = $umur / $tahun;
     $umursekarang = floor($tahunlahir);
     return $umursekarang;
    }



    public function umur($tgl_lahir){ // format = YYYY-mm-dd
      $thn1 = substr($tgl_lahir, 0, 4);
      $bln1 = substr($tgl_lahir, 5, 2);
      $tgl1 = substr($tgl_lahir, 8, 2);

      $thn_now = date('Y').'-08'.'-01'; // per 31 agustus date('Y')
      $thn2 = substr($thn_now, 0, 4);
      $bln2 = substr($thn_now, 5, 2);
      $tgl2 = substr($thn_now, 8, 2);

      $ge1 = gregoriantojd($bln1,$tgl1,$thn1);
      $ge2 = gregoriantojd($bln2,$tgl2,$thn2);
      $selisih_hari = abs($ge1 - $ge2);
      return substr($selisih_hari / 365, 0, 2);
    }


    
    public function random_element($array){
            if ( ! is_array($array))
            {
               return $array;
            }
            
            return $array[array_rand($array)];
	}
        
    
	/**
	 *  mengambil data dari db, 
	 * dan merubahnya jd bentuk array 
	 * untuk memudahkan saat membuat dropdown di form  
	 * @param  [type] $query         [query yg dilakukan via eloquent]
	 * @param  [type] $nama_dropdown [nama dropdown]
	 * @return [type] [array]
	 */
	public function get_dropdown($query, $nama_dropdown = NULL){
	    $data = array('' => '-pilih '.$nama_dropdown."-");
	    foreach($query as $list){
	        if(!empty($list->nama)){
	        $data[$list->id] = $list->nama;
	        }else{
	         $data[$list->id] = $list->judul;   
	        }
	    }	    
	    return $data;
	}
 
         
    public function bulan2($rrr)
	{
	if($rrr=='1' || $rrr=='01'){$ttt='Januari';}
	if($rrr=='2' || $rrr=='02'){$ttt='Februari';}
	if($rrr=='3' || $rrr=='03'){$ttt='Maret';}
	if($rrr=='4' || $rrr=='04'){$ttt='April';}
	if($rrr=='5' || $rrr=='05'){$ttt='Mei';}
	if($rrr=='6' || $rrr=='06'){$ttt='Juni';}
	if($rrr=='7' || $rrr=='07'){$ttt='Juli';}
	if($rrr=='8' || $rrr=='08'){$ttt='Agustus';}
	if($rrr=='9' || $rrr=='09'){$ttt='September';}
	if($rrr=='10'){$ttt='Oktober';}
	if($rrr=='11'){$ttt='November';}
	if($rrr=='12'){$ttt='Desember';}
	return $ttt;
	}        
        
        
    public function date_to_tgl($in)
	{
	$tgl = substr($in,8,2);
	$bln = substr($in,5,2);
	$thn = substr($in,0,4);
	if(checkdate($bln,$tgl,$thn))
	{
	   $out=substr($in,8,2)." ".  Fungsi::bulan2(substr($in,5,2))." ".substr($in,0,4);
	}
	else
	{
	   $out = "<span class='error'>N/A</span>";
	}
	return $out;
	}        
       







public function alphaID($in, $to_num = false, $pad_up = false, $passKey = null)
{
  $index = "abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
  if ($passKey !== null) {
      // Although this function's purpose is to just make the
      // ID short - and not so much secure,
      // with this patch by Simon Franz (http://blog.snaky.org/)
      // you can optionally supply a password to make it harder
      // to calculate the corresponding numeric ID

      for ($n = 0; $n<strlen($index); $n++) {
          $i[] = substr( $index,$n ,1);
      }

      $passhash = hash('sha256',$passKey);
      $passhash = (strlen($passhash) < strlen($index))
          ? hash('sha512',$passKey)
          : $passhash;

      for ($n=0; $n < strlen($index); $n++) {
          $p[] =  substr($passhash, $n ,1);
      }

      array_multisort($p,  SORT_DESC, $i);
      $index = implode($i);
  }

  $base  = strlen($index);

  if ($to_num) {
      // Digital number  <<--  alphabet letter code
      $in  = strrev($in);
      $out = 0;
      $len = strlen($in) - 1;
      for ($t = 0; $t <= $len; $t++) {
          $bcpow = bcpow($base, $len - $t);
          $out   = $out + strpos($index, substr($in, $t, 1)) * $bcpow;
      }

      if (is_numeric($pad_up)) {
          $pad_up--;
          if ($pad_up > 0) {
              $out -= pow($base, $pad_up);
          }
      }
      $out = sprintf('%F', $out);
      $out = substr($out, 0, strpos($out, '.'));
  } else {
      // Digital number  -->>  alphabet letter code
      if (is_numeric($pad_up)) {
          $pad_up--;
          if ($pad_up > 0) {
              $in += pow($base, $pad_up);
          }
      }

      $out = "";
      for ($t = floor(log($in, $base)); $t >= 0; $t--) {
          $bcp = bcpow($base, $t);
          $a   = floor($in / $bcp) % $base;
          $out = $out . substr($index, $a, 1);
          $in  = $in - ($a * $bcp);
      }
      $out = strrev($out); // reverse
  }

  return $out;
}



  /* Fungsi untuk memastikan nilai agar 
  *  memiliki 2 angka di belakang koma
  *  param : $nilai = angka desimal, ex : 2.312100041321
  *  digunakan untuk mengoreksi IPK atau IP mahasiswa
  */
  public function edit_angka($nilai){
    
    $na = round($nilai, 2);
    //settype($na, 'string');
    $arr = explode('.', $na);
    $n1 = $arr[0]; //angka pertama di depan koma
    if(isset($arr[1])){
      $n2 = $arr[1]; //angka di blakang koma
    }else{
      $n2 = 0; //angka di blakang koma
    }



    $jml_char = strlen($n2);
    if($jml_char == 0){ //jika bil bulat, ex: 3
      $n2 = '.00';
    }elseif($jml_char == 1){ //jika desimal tp hanya 1 angka di belakang koma
      $n2 =  $n2.'0';
    }else{
      $n2 = $n2;
    }
    return $n1.'.'.$n2;
  }
 
        
        
}