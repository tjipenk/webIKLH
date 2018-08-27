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
	

	public function get_lokasi_sungai($offset = null, $search = "", $filter = "Popular", $all = "") 
	{
		$this->db->order_by("id", "desc");			
		
		if (strlen($search)>1) {
			$this->db->like('lokasi', $search);			
		}
			#$this->db->where('user_level', 0);
			
		if ($all == "all") { $query = $this->db->get('st_air'); } else { $query = $this->db->get('st_air', 10, $offset); }
		return $query->result_array();

	}

	public function get_parameter_sungai($offset = null, $search = "", $filter = "Popular", $all = "") 
	{
		$this->db->order_by("id", "desc");			
		
		if (strlen($search)>1) {
			$this->db->like('ket', $search);			
		}
			#$this->db->where('user_level', 0);
			
		if ($all == "all") { $query = $this->db->get('par_ika'); } else { $query = $this->db->get('par_ika', 10, $offset); }
		return $query->result_array();

	}

	public function get_data_sungai($offset = null, $search = "", $filter = "Popular", $all = "") 
	{
		$this->db->order_by("kode_sungai", "desc");			
		
		if (strlen($search)>1) {
			$this->db->like('lokasi', $search);			
		}
			#$this->db->where('user_level', 0);
			
		if ($all == "all") { $query = $this->db->get('tbl_sungai'); } else { $query = $this->db->get('tbl_sungai', 10, $offset); }
		return $query->result_array();

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

	function get_specific_tutupan($i) {
		$this->db->where('id', $i);			
		$query = $this->db->get('tbl_tutupan');
		return $query->result_array();
	}


	public function get_data_tutupan()
	{
		$query = $this->db->query("SELECT *, year(tanggal) tahun FROM `tbl_tutupan`");
	    return $query->result_array(); 
	}

	function unzip($location,$new_location){
		if(exec("unzip $location",$arr)){
			mkdir($new_location);
			for($i = 1;$i< count($arr);$i++){
				$file = trim(preg_replace("~inflating: ~","",$arr[$i]));
						copy($location."/".$file,$new_location."/".$file);
						unlink($location."/".$file);
				}
			return true;
		}
		return false;      
	}
	 

	function get_nama_wilayah($i) {
		$this->db->where('kode', $i);
		$this->db->select('nama');			
		$query = $this->db->get('wilayah');
		return $query->result_array();
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

	public function get_par_ika() {
		$this->db->select('*');
		$this->db->from('par_ika');
		$this->db->order_by('id','desc');
		$this->db->limit(1);
		$query = $this->db->get();
		 return $query->result_array();
	}

	public function get_pengamatan_sungai($i) {
		$this->db->select('*');
		$this->db->from('tbl_sungai');
		$this->db->where('id_sungai',$i);
		$this->db->limit(1);
		$query = $this->db->get();
		 return $query->result_array();
		//var_dump($query->first_row());
	}

	public function get_data_sungai_prov($i) {
		$this->db->select('*');
		$this->db->from('tbl_sungai');
		$this->db->where('id_prov',$i);
		$this->db->where('validated',1);
		//$this->db->limit(1);
		$query = $this->db->get();
		 return $query->result_array();
		//var_dump($query->first_row());
	}

	public function get_rekap_iktl($year) {
		$this->db->select('*');
		$this->db->from('rekap');
		$this->db->where('tahun',$year);
		//$this->db->where('validated',1);
		//$this->db->limit(1);
		$query = $this->db->get();
		 return $query->result_array();
		//var_dump($query->first_row());
	}

	public function get_data_dashboard() {
		$y = date("Y");
		$y1 = date("Y",strtotime("-1 year"));
		$y2 = date("Y",strtotime("-2 year"));
		$sql = "SELECT n.kode, a.iktl iktl, b.iktl iktl1, c.iktl iktl2
		FROM wilayah n
		LEFT JOIN (SELECT id_prov, iktl
					FROM rekap WHERE tahun =$y) a on n.kode = a.id_prov
		LEFT JOIN (SELECT id_prov, iktl
					FROM rekap WHERE tahun =$y1) b on n.kode = b.id_prov
		LEFT JOIN (SELECT id_prov, iktl
					FROM rekap WHERE tahun =$y2) c on n.kode = c.id_prov
		WHERE LENGTH(kode) = 2
		";
		
		$query = $this->db->query($sql);
		 return $query->result_array();
		//var_dump($query->first_row());
	}





	
}

?>
