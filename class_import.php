<?php

class Import{

	function __construct($dt)
   	{
		$this->dt = $dt;
   	}


   	public function q($link,$sql){ 
		if($sql!=''){
			$dt=array();
			$q=@mysqli_query($link,$sql);  
			if (substr(strtolower($sql),0,6)=='select') {
				while($r=@mysqli_fetch_assoc($q)){
					$dt[]=$r;
				}
				$res=$dt;
			}else{
				$res=$q;
			}
		}else{
			$res=false;
		}
		return $res;
	}

	public function ambil_db_lama($dt){
		$dt['db_pemagang']=$this->q($dt["link_db_lama"],"select * from tb_pemagangan limit 10000");
		return $dt;
	}

	public function isi_data_kota($dt){
		$db_kota=$this->q($dt["link_db_lama"],"SELECT DISTINCT(kd_provinsi) FROM `tb_pemagangan`");
		$sql=[];
		foreach ($dt['db_pemagang'] as $k => $v) {
			$sql[]="('$v[kd_provinsi]')";
		}
		$sql_string=join(",",$sql);
		echo $sql_insert='insert into empu_onedata_regions(name) values '.$sql_string;
		$this->q($dt['link_db_baru'],$sql_insert);
		return $dt;
	}
	public function mapping_data_kota($dt){
		$db_kota=$this->q($dt["link_db_baru"],"SELECT * FROM `empu_onedata_regions`");
		foreach ($db_kota as $k => $v) {
			$kota_mapping[$v['name']]=$v['id'];
		}
		$dt['kota_mapping']=$kota_mapping;
		return $dt;
	}

	public function olah_data($dt){
		$sql_baru=[];
		foreach ($dt['db_pemagang'] as $k => $v) {
			$v['nama_pem'] = str_replace("'", "\'", $v['nama_pem']);
			$v['alamat_ktp'] = str_replace("'", "\'", $v['alamat_ktp']);
			$v['tempat_tinggal'] = str_replace("'", "\'", $v['tempat_tinggal']);
			$v['skil'] = str_replace('"', "\'", $v['skil']);
			$v['no_ktp'] = str_replace('"', "", $v['no_ktp']);
			$v['no_ktp'] = str_replace("'", "", $v['no_ktp']);
			$v['id_agama'] = str_replace("''", '\N', $v['id_agama']);
			$v['lingkar_pinggang'] = str_replace(' cm', '', $v['lingkar_pinggang']);
			$v['lingkar_pinggang'] = str_replace('cm', '', $v['lingkar_pinggang']);
			$v['lingkar_pinggang'] = str_replace(' CM', '', $v['lingkar_pinggang']);
			$v['lingkar_pinggang'] = str_replace(' Cm', '', $v['lingkar_pinggang']);
			$v['lingkar_pinggang'] = str_replace(' cM', '', $v['lingkar_pinggang']);
			$v['lingkar_pinggang'] = str_replace('-', '', $v['lingkar_pinggang']);
			$v['lingkar_pinggang'] = str_replace('/', '', $v['lingkar_pinggang']);
			$v['no_sepatu'] = str_replace('-', '', $v['no_sepatu']);
			$v['no_sepatu'] = str_replace('/', '', $v['no_sepatu']);
			$v['no_sepatu'] = str_replace('MM', '', $v['no_sepatu']);
			$v['no_hp'] = str_replace(' ', '', $v['no_hp']);
			$v['no_hp'] = str_replace('+62', '0', $v['no_hp']);
			$v['no_hp'] = str_replace('(', '', $v['no_hp']);
			$v['no_hp'] = str_replace(')', '', $v['no_hp']);
			if($v['email'] == '' || $v['email'] == 'rasibara@yahoo.com' || $v['email'] == 'tritura@ymail.com' || $v['email'] == 'Riannygranger@yahoo.com' || $v['email'] == 'kim_man92@yahoo.co.id') {
				$v['email'] = 'email'.rand(1, 999999999).'@gmail.com';
			}
			if($v['no_hp'] == '085221807310' || $v['no_hp'] == '081327748329' || $v['no_hp'] == '085319555080' || $v['no_hp'] == '081585148274' || $v['no_hp'] == '081288298948' || $v['no_hp'] == '085718484432' || $v['no_hp'] == '085781240072' || $v['no_hp'] == '0' || $v['no_hp'] == '') {
				$v['no_hp'] = rand(1, 999999999);
			}
			if ($v['kd_provinsi'] == '' || $v['kd_provinsi'] > 2) {
				$v['kd_provinsi'] = 1;
			}
			if ($v['no_sepatu'] == '' || $v['no_sepatu'] == '-') {
				$v['no_sepatu'] = 40;
			}
			if ($v['lingkar_pinggang'] == '' || $v['lingkar_pinggang'] == '-') {
				$v['lingkar_pinggang'] = 40;
			}
			if ($v['pasport'] == '' || $v['pasport'] == 'Belum' || $v['pasport'] == 'Memiliki') {
				$v['pasport'] = 1;
			}
			if($v['id_agama'] == '0' || $v['id_agama'] == '') {
				$v['id_agama'] == 1;
			}
			$sql_baru[]="('$v[kd_pemagang]','$v[nama_pem]','$v[no_hp]','$v[email]','$v[no_ktp]','$v[tanggal_lahir]','$v[kd_provinsi]','$v[alamat_ktp]','$v[kd_provinsi]','$v[kd_provinsi]','$v[kd_provinsi]','$v[kd_provinsi]','$v[id_agama]','$v[tempat_tinggal]','$v[kd_provinsi]','$v[no_hp]','$v[no_hp1]','$v[no_hp2]','$v[no_sepatu]','$v[lingkar_pinggang]','$v[bb]','$v[tb]','$v[hobi]','$v[hobi]','$v[skil]','$v[kd_provinsi]','$v[kd_provinsi]','$v[kd_provinsi]','$v[pasport]','$v[kd_provinsi]','$v[kd_provinsi]')";
		}
		$sql_string=join(",",$sql_baru);
		$sql_string = str_replace(';', ',', $sql_string);
		echo $dt['sql_insert']='insert into minori_apprentices(refcode, name, phone, email, nin, birth_date, birth_place_id, address, region_id, gender_id, marital_id, blood_type_id, religion_id, domicile_address, domicile_region_id, fixed_phone, mobile_1, mobile_2, shoe_size, waist_size, weight, height, favorite_subjects, hobbies, skills, medical_histories, smoke_per_day, drunk_per_month, is_passport_holder, has_aboard, education_degree_id) values '.$sql_string;
		return $dt;
	}

	public function insert_db_baru($dt){
		// $dt['insert_db_baru']=$this->q($dt['link_db_baru'],$dt['sql_insert']);
		return $dt;
	}


}