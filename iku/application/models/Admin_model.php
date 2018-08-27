<?php

class Admin_model extends CI_Model 
{
	public function check_admin() {
        
        $c = $this->session->userdata('userid');
        $query = $this->db->query("SELECT * FROM users WHERE user_id='".$c."' AND user_level='1' LIMIT 1");

        if ($query->num_rows() > 0)
        {
           return true;
        } else {
            return false;
        }
    }	


	public function get_users($offset = null, $search = "", $filter = "Popular", $all = "") 
	{
		$this->db->order_by("user_name", "desc");			
		
		if (strlen($search)>1) {
			$this->db->like('user_name', $search);			
		}
			//$this->db->where('user_level', 1);
		if ($all == "all") { $query = $this->db->get('users'); } else { $query = $this->db->get('users', 10, $offset); }
		return $query->result_array();

	}

	public function get_daftar_users() 
	{
		$query = $this->db->get('users');	
		return $query->result_array();

	}
	
	function data_petugas($id) {
		$this->db->select('*');
		$this->db->from('users');
	
		$this->db->where("user_id='$id'");
		$query = $this->db->get();
	    return $query->result_array(); 
	}
	

	public function get_lokasi_udara($offset = null, $search = "", $filter = "Popular", $all = "") 
	{
		$this->db->order_by("id", "desc");			
		
		if (strlen($search)>1) {
			$this->db->like('lokasi', $search);			
		}
			#$this->db->where('user_level', 0);
			
		if ($all == "all") { $query = $this->db->get('st_air'); } else { $query = $this->db->get('st_air', 10, $offset); }
		return $query->result_array();

	}

	public function get_parameter_udara($offset = null, $search = "", $filter = "Popular", $all = "") 
	{
		$this->db->order_by("id", "desc");			
		
		if (strlen($search)>1) {
			$this->db->like('ket', $search);			
		}
			#$this->db->where('user_level', 0);
			
		if ($all == "all") { $query = $this->db->get('par_iku'); } else { $query = $this->db->get('par_iku', 10, $offset); }
		return $query->result_array();

	}
	/*
	public function get_data_udara($offset = null, $search = "", $filter = "Popular", $all = "") 
	{
		$this->db->order_by("kode_sungai", "desc");			
		
		if (strlen($search)>1) {
			$this->db->like('lokasi', $search);			
		}
			#$this->db->where('user_level', 0);
			
		if ($all == "all") { $query = $this->db->get('tbl_udara'); } else { $query = $this->db->get('tbl_udara', 10, $offset); }
		return $query->result_array();

	}
	*/
	public function get_data_udara($year) {
		$this->db->select('*');
		$this->db->from('tbl_udara');
		//$this->db->where('id_prov',$i);
		$this->db->where('year(tanggal)',$year);
		
		//$this->db->limit(1);
		$query = $this->db->get();
		 return $query->result_array();
		//var_dump($query->first_row());
	}


	public function get_kelompok_tani($offset = null, $search = "", $filter = "Popular", $all = "") 
	{
		$this->db->order_by("user_name", "desc");			
		
		if (strlen($search)>1) {
			$this->db->like('user_name', $search);			
		}
			$this->db->where('user_level', 0);
		if ($all == "all") { $query = $this->db->get('users'); } else { $query = $this->db->get('users', 10, $offset); }
		return $query->result_array();

	}

	public function get_categories($offset = null, $search = "", $filter = "Popular", $all = "") 
	{
		$this->db->order_by("category_name", "asc");			
		
		if (strlen($search)>1) {
			$this->db->like('category_name', $search);			
		}
		
		if ($all == "all") { $query = $this->db->get('categories'); } else { $query = $this->db->get('categories', 10, $offset); }
		return $query->result_array();
	}

	public function get_pages($offset = null, $search = "", $filter = "Popular", $all = "") 
	{
		$this->db->order_by("title", "asc");			
		
		if (strlen($search)>1) {
			$this->db->like('title', $search);			
		}
		
		if ($all == "all") { $query = $this->db->get('pages'); } else { $query = $this->db->get('pages', 10, $offset); }
		return $query->result_array();
	}

	public function get_subscribers($offset = null, $search = "", $filter = "Popular", $all = "") 
	{
		$this->db->order_by("firstname", "asc");			
		
		if (strlen($search)>1) {
			$this->db->like('email', $search);			
		}
		
		if ($all == "all") { $query = $this->db->get('newsletter_subscribers'); } else { $query = $this->db->get('newsletter_subscribers', 10, $offset); }
		return $query->result_array();
	}
	
	
	public function get_stories($offset = null, $search = "", $filter = "Popular", $all = "") 
	{
        
		//$this->db->where('post_by', $userid);
		$this->db->select('posts.*, users.*, COUNT(post_comments.posts_id) AS numbercomments');
		$this->db->join('users', 'posts.post_by = users.user_id', 'left');
		$this->db->join('post_comments', 'posts.post_id = post_comments.posts_id', 'left');
		//$this->db->order_by("post_date", "desc"); 
		$this->db->group_by("posts.post_id");		
		
		if ($filter == "Recent") {
			$this->db->order_by("post_date", "desc");
		} else if ($filter == "Most Comment") {
			$this->db->order_by("numbercomments", "desc");
		} else {
			$this->db->order_by("post_upvote", "desc");			
		}

		if (strlen($search)>1) {
			$this->db->like('posts.post_subject', $search);			
		}

		$this->db->not_like('posts.approved', 2);
		
		//$query = $this->db->get(); 
		if ($all == "all") { $query = $this->db->get('posts'); } else { $query = $this->db->get('posts', 10, $offset); }
		//$this->output->enable_profiler(TRUE);		
		return $query->result_array();

	}


	public function getdesa($offset = null, $search = "", $filter = "Popular", $all = "") 
	{
        
		//$this->db->where('post_by', $userid);
		$this->db->select('desa.id, desa.nama, kecamatan.nama as kecamatan,');
		$this->db->join('kecamatan', 'desa.kecamatan = kecamatan.id', 'left');
		
		$this->db->group_by("desa.id");		
		
		
		if ($all == "all") { $query = $this->db->get('desa'); } else { $query = $this->db->get('desa', 10, $offset); }
		//$this->output->enable_profiler(TRUE);		
		return $query->result_array();

	}

	public function getkecamatan($offset = null, $search = "", $filter = "Popular", $all = "") 
	{
        
		//$this->db->where('post_by', $userid);
		$this->db->select('kecamatan.*');

		$this->db->group_by("kecamatan.id");		
		
		
		if ($all == "all") { $query = $this->db->get('kecamatan'); } else { $query = $this->db->get('kecamatan', 10, $offset); }
		//$this->output->enable_profiler(TRUE);		
		return $query->result_array();

	}

	function get_specific_story($i) {
		$this->db->join('categories_posts', 'categories_posts.post_id = posts.post_id', 'left');
		$this->db->where('posts.post_id', $i);
		$this->db->limit(1);
		$query = $this->db->get('posts');
		return $query->result_array();
	}

	function get_specific_page($i) {
		$this->db->where('id_page', $i);
		$this->db->limit(1);
		$query = $this->db->get('pages');
		return $query->result_array();
	}

	function get_specific_cat($i) {
		$this->db->where('id_category', $i);
		$this->db->limit(1);
		$query = $this->db->get('categories');
		return $query->result_array();
	}

	function get_specific_user($i) {
		$this->db->where('user_id', $i);			
		$query = $this->db->get('users');
		return $query->result_array();
	}
	function get_specific_sungai($i) {
		$this->db->where('id', $i);			
		$query = $this->db->get('st_air');
		return $query->result_array();
	}

	function get_nama_wilayah($i) {
		$this->db->where('kode', $i);
		$this->db->select('nama');			
		$query = $this->db->get('wilayah');
		return $query->result_array();
	}

	function get_peruntukan($i) {
		switch ($i) {
			case 1:
				$r = "Transportasi";
				break;
			case 2:
				$r = "Industri";
				break;
			case 3:
				$r = "Perkantoran";
				break;
			case 4:
				$r = "Perumahan";
				break;
			case 0:
				$r = "BLANK";
				break;	
		}

		return $r;
	}

	public function data_lokasi()
	{
		$query = $this->db->query("SELECT * FROM `st_air`");
	    return $query->result_array(); 
	}

	public function data_kabupaten()
	{
		$query = $this->db->query("SELECT kode as id_kab, LEFT(kode,2) as id_prov, nama as kab FROM `wilayah` WHERE LENGTH(kode)>2");
	    return $query->result_array(); 
	}

	public function data_provinsi()
	{
		$query = $this->db->query("SELECT kode as id_prov, nama as prov FROM `wilayah` WHERE LENGTH(kode)=2");
	    return $query->result_array(); 
	}

	

	public function get_comments($offset = null, $search = "", $all = "") 
	{
        
		//$this->db->where('post_by', $userid);
		//$this->db->select('posts.*, users.*, COUNT(post_comments.posts_id) AS numbercomments');
		//$this->db->join('post_comments', 'posts.post_id = post_comments.posts_id', 'left');
		//$this->db->order_by("post_date", "desc"); 
		//$this->db->group_by("posts.post_id");		

		$this->db->join('users', 'users.user_id = post_comments.users_id', 'left');
		$this->db->join('posts', 'posts.post_id = post_comments.posts_id', 'left');

		/*if ($filter == "Recent") {
			$this->db->order_by("post_date", "desc");
		} else if ($filter == "Most Comment") {
			$this->db->order_by("numbercomments", "desc");
		} else {
			$this->db->order_by("post_upvote", "desc");			
		}

		if (strlen($search)>1) {
			$this->db->like('posts.post_subject', $search);			
		}*/
		
		//$query = $this->db->get(); 
		if ($all == "all") { $query = $this->db->get('post_comments'); } else { $query = $this->db->get('post_comments', 10, $offset); }	
		return $query->result_array();

	}
	public function check_category($c) {
        
        $query = $this->db->query("SELECT * FROM categories WHERE category_name='".$c."'");

        if ($query->num_rows() > 0)
        {
           return true;
        } else {
            return false;
        }
    }
    public function verifyexists_title($i) 
    {        
        $query = $this->db->query("SELECT * FROM posts WHERE post_subject='".$i."'");

        if ($query->num_rows() > 0)
        {
           return true;
        } else {
            return false;
        }
    }


    function get_num_users() 
	{		
		return $this->db->count_all_results('users');
	}

	 function get_num_pengumuman() 
	{		
		return $this->db->count_all_results('pengumuman');
	}

	function get_num_kelompok_tani() 
	{		
		$this->db->where('user_level', 0);
		return $this->db->count_all_results('users');
	}

	public function stat_hibah()
	{
		$this->db->select('jumlah');
		$query = $this->db->get('hibah');
		$jumlah = 0;
	    $data =  $query->result_array(); 
	    foreach ($data as $key => $value) {
	    	$jumlah= $jumlah  + $value['jumlah'];
	    }
	    return $jumlah;
	}

	function stat_aktivitas() 
	{		
		
		return $this->db->count_all_results('aktivitas');
	}
	function get_num_gapoktan() 
	{		
		$this->db->where('user_level', 2);
		return $this->db->count_all_results('users');
	}
	function get_num_stories() 
	{		
		return $this->db->count_all_results('posts');
	}
	function get_num_comments() 
	{		
		return $this->db->count_all_results('post_comments');
	}
	function get_num_subscribers() 
	{		
		
	}

	function get_recent_stories()
    {    
    	$this->db->order_by("post_date", "desc");    	
    	$query = $this->db->get('posts', 20);		
		return $query->result_array();
    }

    function get_recent_comments()
    {
    	$this->db->order_by("date", "desc");
    	$this->db->join('posts', 'post_comments.posts_id = posts.post_id', 'left');
    	$this->db->join('users', 'posts.post_by = users.user_id', 'left');
    	$query = $this->db->get('post_comments', 20);

		return $query->result_array();
    }

    function get_recent_users()
    {
    	$this->db->order_by("user_date", "desc");    	
    	$query = $this->db->get('users', 20);

		return $query->result_array();
    }

	function pengumuman() {
		$this->db->select('*');
		$this->db->from('pengumuman');
		$query = $this->db->get();
		 return $query->result_array();
	}

	public function get_par_iku() {
		$this->db->select('*');
		$this->db->from('par_iku');
		$this->db->order_by('id','desc');
		$this->db->limit(1);
		$query = $this->db->get();
		 return $query->result_array();
	}

	public function get_pengamatan_sungai($i) {
		$this->db->select('*');
		$this->db->from('tbl_udara');
		$this->db->where('id_udara',$i);
		$this->db->where('validated',1);
		$this->db->limit(1);
		$query = $this->db->get();
		 return $query->result_array();
		//var_dump($query->first_row());
	}
	public function get_pengamatan_udara($i) {
		$this->db->select('*');
		$this->db->from('tbl_udara');
		$this->db->where('id_udara',$i);
		$this->db->where('validated',1);
		$this->db->limit(1);
		$query = $this->db->get();
		 return $query->result_array();
		//var_dump($query->first_row());
	}

	public function get_pengamatan_sungai_years($i, $year) {
		//$where = "year(tanggal)='".$year."'";
		$this->db->select('*');
		$this->db->from('tbl_udara');
		$this->db->where('id_udara',$i);
		$this->db->where('year(tanggal)',$year);
		$this->db->where('validated',1);
		$this->db->limit(1);
		$query = $this->db->get();
		 return $query->result_array();
		//var_dump($query->first_row());
	}

	public function get_data_udara_prov($i) {
		$this->db->select('*');
		$this->db->from('tbl_udara');
		$this->db->where('id_prov',$i);
		$this->db->where('validated',1);
		//$this->db->limit(1);
		$query = $this->db->get();
		 return $query->result_array();
		//var_dump($query->first_row());
	}

	public function get_data_udara_prov_years($i,$year) {
		$this->db->select('*');
		$this->db->from('tbl_udara');
		$this->db->where('id_prov',$i);
		$this->db->where('validated',1);
		$this->db->where('year(tanggal)',$year);
		//$this->db->limit(1);
		$query = $this->db->get();
		 return $query->result_array();
		//var_dump($query->first_row());
	}

	public function perbaikan_log($a){
		if ($a > 1){
			$a = 1+5*log10($a);
		}
		return $a;
	}

	public function hitung_iku($i)
	{
		//$year = date("Y");
		//$data = $this->get_pengamatan_sungai_years($i, $year);
		$data = $this->get_pengamatan_udara($i);
		if(count($data)!=0){
		$par = $this->get_par_iku();
		
		$cal = array('id_udara' => $data[0]['id_udara'],
					 'id_par' => $par[0]['id'],
					 'so2'    => $data[0]['so2']/$par[0]['so2'],
					 'no2' 	  =>$data[0]['no2']/$par[0]['no2']);

		//$cal['so2'] = $this->perbaikan_log($cal['so2'] );
		//$cal['no2'] = $this->perbaikan_log($cal['no2'] );
		
		$cal['avg']	  = ($cal['so2']+$cal['no2'])/2;
		$cal['max']   = max($cal['so2'],$cal['no2']);
		$cal['avg2'] 	= $cal['avg']*$cal['avg'];
		$cal['max2'] 	= $cal['max']*$cal['max'];
		$cal['Pij'] 	= sqrt(($cal['avg2']+$cal['max2'])/2);

		$cal['iku'] = round(100-(50/0.9*($cal['avg']-0.1)),2);
		//iku=100-(50/0.9*(AVERAGE(D4:E4)-0.1))
		}
		else{
			$cal['iku'] = 0;
		}
		//var_dump($cal);
		return $cal;
	}
/*
	public function get_ika() 
	{

		$r_prov = $this->data_provinsi();
		$m = 0;
		foreach ($r_prov as $prov){
			$r_sungai = $this->get_data_udara_prov($prov['id_prov']);
			$ika = 0; $n = 0;
				foreach ($r_sungai as $sungai){
				
				//	print_r($this->hitung_iku($sungai['id_udara']));
					$ika = $ika + $this->hitung_iku($sungai['id_udara'])['iku'];
					$n = $n+1;
				}
				$result[$m] = array('id_prov' => $prov['id_prov'],
							'provinsi' => $prov['prov'],
							'iku'	=>	$ika/$n);
			//print_r($result);
			$m++;
		}
		//print_r($result);
	
		return $result;
	}

*/
public function hitung_iku_year($i,$year)
{
	//$year = date("Y");
	$data = $this->get_pengamatan_sungai_years($i, $year);
	if(count($data)!=0){
	$par = $this->get_par_iku();
	
	$cal = array('id_udara' => $data[0]['id_udara'],
				 'id_par' => $par[0]['id'],
				 'so2'    => $data[0]['so2']/$par[0]['so2'],
				 'no2'  	  => $par[0]['no2']/$data[0]['no2'],
				 'bod' 	  => $data[0]['bod']/$par[0]['bod'],
				 'cod' 	  => $data[0]['cod']/$par[0]['cod'],
				 'tf'	  => $data[0]['tf']/$par[0]['tf'],
				 'fcoli'  => $data[0]['fcoli']/$par[0]['fcoli'],
				 'tcoli'  => $data[0]['tcoli']/$par[0]['tcoli']);

	$cal['so2'] 	= $this->perbaikan_log($cal['so2'] );
	$cal['no2'] 		= $this->perbaikan_log($cal['no2'] );
	$cal['bod'] 	= $this->perbaikan_log($cal['bod'] );
	$cal['cod'] 	= $this->perbaikan_log($cal['cod'] );
	$cal['tf'] 		= $this->perbaikan_log($cal['tf'] );
	$cal['fcoli'] 	= $this->perbaikan_log($cal['fcoli'] );
	$cal['tcoli'] 	= $this->perbaikan_log($cal['tcoli'] );
							 
	$cal['avg']	  	= ($cal['so2']+$cal['no2']+$cal['bod']+$cal['cod']+$cal['tf']+$cal['fcoli']+$cal['tcoli'])/7;
	$cal['max']   	= max($cal['so2'],$cal['no2'],$cal['bod'],$cal['cod'],$cal['tf'],$cal['fcoli'],$cal['tcoli']);
	$cal['avg2'] 	= $cal['avg']*$cal['avg'];
	$cal['max2'] 	= $cal['max']*$cal['max'];
	$cal['Pij'] 	= sqrt(($cal['avg2']+$cal['max2'])/2);
	
	switch (true) {
		case $cal['Pij'] <=1 :
			$cal['iku'] = 100;
			break;
		case $cal['Pij'] <=4.67:
			$cal['iku'] = 80;
			break;
		case $cal['Pij'] <=6.32:
			$cal['iku'] = 60;
			break;
		case $cal['Pij'] <=6.88:
			$cal['iku'] = 40;
			break;
		case $cal['Pij'] >=6.88:
			$cal['iku'] = 20;
			break;
		}
	//var_dump($cal);
	}
	else{
		$cal['iku'] = 0;
	}
	return $cal;
}

public function get_ika_dashboard() 
	{

		$r_prov = $this->data_provinsi();
		$m = 0;
		foreach ($r_prov as $prov){
			$r_sungai0 = $this->get_data_udara_prov_years($prov['id_prov'],date("Y"));
			$r_sungai1 = $this->get_data_udara_prov_years($prov['id_prov'],date("Y",strtotime("-1 year")));
			$r_sungai2 = $this->get_data_udara_prov_years($prov['id_prov'],date("Y",strtotime("-2 year")));
			$ika = 0; $n = 0;
			$ika1 = 0; $n1 = 0;
			$ika2 = 0; $n2 = 0;
				foreach ($r_sungai0 as $sungai){
				//	print_r($this->hitung_iku($sungai['id_udara']));
					$ika = $ika + $this->hitung_iku($sungai['id_udara'])['iku'];
					$n = $n+1;
				}
				foreach ($r_sungai1 as $sungai){
					$ika1 = $ika1 + $this->hitung_iku($sungai['id_udara'])['iku'];
					$n1 = $n1+1;
				}
				foreach ($r_sungai2 as $sungai){
					$ika2 = $ika2 + $this->hitung_iku($sungai['id_udara'])['iku'];
					$n2 = $n2+1;
				}

				$result[$m] = array('id_prov' => $prov['id_prov'],
							'provinsi' => $prov['prov'],
							'iku'	=>	$ika/$n,
							'iku1'	=>	$ika1/$n1,
							'iku2'	=>	$ika2/$n2);
			//print_r($result);
			$m++;
		}
		//print_r($result);
	
		return $result;
	}
    
}

?>
