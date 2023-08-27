<?php
/** 
  * 
  */
 class Main_Model extends CI_Model
 {
 	
 	function __construct()
 	{
 		parent::__construct();
 		$this->load->database();
 	} 
	
 	public function register($data,$table)
 	{
 		return $this->db->insert($table,$data);
 	}

 	public function login($email)
 	{
 		return $this->db->query("SELECT * FROM pengguna WHERE email='$email'");
 	}

 	public function getUsers()
 	{
 		return $this->db->query("SELECT * FROM pengguna");
 	}

	public function getUser($id_pengguna)
 	{
 		return $this->db->query("SELECT * FROM pengguna WHERE id_pengguna='$id_pengguna'");
 	}

	public function updateUser($id_pengguna,$data)
 	{
		$this->db->where('id_pengguna', $id_pengguna);
		$this->db->update('pengguna', $data);
	
		if ($this->db->affected_rows() > 0) {
			return 'ok';
		} else {
			return 'error';
		}
 	}

	public function deleteUser($id_pengguna)
 	{
		{
			$this->db->where('id_pengguna', $id_pengguna);
			$this->db->delete('pengguna');
	
			return $this->db->affected_rows() > 0;
		}
 	}

	public function addProduk($data,$table)
 	{
 		return $this->db->insert($table,$data);
 	}

	public function getProducts()
 	{
 		return $this->db->query("SELECT * FROM produk");
 	}

	public function getProduct($id_produk)
 	{
 		return $this->db->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
 	}

	public function updateProduct($id_produk,$data)
 	{
		$this->db->where('id_produk', $id_produk);
		$this->db->update('produk', $data);
	
		if ($this->db->affected_rows() > 0) {
			return 'ok';
		} else {
			return 'error';
		}
 	}

	public function deleteProduct($id_produk)
 	{
		{
			$this->db->where('id_produk', $id_produk);
			$this->db->delete('produk');
	
			return $this->db->affected_rows() > 0;
		}
 	}
	 
	public function getAllOrder()
 	{
		{
			
			return $this->db->query("SELECT pengguna.nama AS nama,produk.nama_produk AS nama_produk, produk.harga AS harga, penjualan.total_harga AS total_harga, penjualan.alamat_pengiriman, penjualan.bukti_pembayaran, penjualan.tanggal_beli, penjualan.tanggal_selesai, penjualan.status FROM penjualan INNER JOIN pengguna ON penjualan.id_pengguna = pengguna.id_pengguna INNER JOIN produk ON penjualan.id_produk = produk.id_produk");
		}
 	}
 	
 	public function getOrder()
 	{
		{
			
			return $this->db->query("SELECT penjualan.id_penjualan as id_penjualan,pengguna.nama AS nama,produk.nama_produk AS nama_produk, produk.harga AS harga, penjualan.total_harga AS total_harga, penjualan.alamat_pengiriman, penjualan.bukti_pembayaran, penjualan.tanggal_beli, penjualan.tanggal_selesai, penjualan.status FROM penjualan INNER JOIN pengguna ON penjualan.id_pengguna = pengguna.id_pengguna INNER JOIN produk ON penjualan.id_produk = produk.id_produk");
		}
 	}

	public function updatePaymentStatus($id_penjualan,$data)
 	{
		$this->db->where('id_penjualan', $id_penjualan);
		$this->db->update('penjualan', $data);
	
		if ($this->db->affected_rows() > 0) {
			return 'ok';
		} else {
			return 'error';
		}
 	}
 	
 	public function getTotalSale()
 	{
		{
			
			return $this->db->query("SELECT SUM(total_harga) AS total_penjualan FROM penjualan");
		}
 	}


	public function getTotalProduct()
 	{
		{
			
			return $this->db->query("SELECT COUNT(id_produk) AS total_produk FROM produk");
		}
 	}


	public function getTotalArabicaCoffe()
 	{
		{
			
			return $this->db->query("SELECT COUNT(id_produk) AS total_kopi_arabica FROM produk WHERE kategori='arabica'");
		}
 	}


	public function getTotalRobustaCoffe()
 	{
		{
			
			return $this->db->query("SELECT COUNT(id_produk) AS total_kopi_robusta FROM produk WHERE kategori='robusta'");
		}
 	}

	public function getSummaryOrder()
 	{
		{
			
			return $this->db->query("SELECT penjualan.id_penjualan as id_penjualan,pengguna.nama AS nama,produk.nama_produk AS nama_produk, produk.harga AS harga, penjualan.total_harga AS total_harga, penjualan.alamat_pengiriman, penjualan.bukti_pembayaran, penjualan.tanggal_beli, penjualan.tanggal_selesai, penjualan.status FROM penjualan INNER JOIN pengguna ON penjualan.id_pengguna = pengguna.id_pengguna INNER JOIN produk ON penjualan.id_produk = produk.id_produk ORDER BY id_penjualan DESC LIMIT 5");
		}
 	}

	public function getDetailOrder($id_penjualan)
 	{
		{
			
			return $this->db->query("SELECT penjualan.id_penjualan as id_penjualan,penjualan.ongkir as ongkir ,pengguna.nama AS nama,produk.nama_produk AS nama_produk, produk.harga AS harga,penjualan.jumlah_beli, penjualan.total_harga AS total_harga, penjualan.alamat_pengiriman AS alamat_pengiriman, penjualan.bukti_pembayaran AS bukti_pembayaran, penjualan.tanggal_beli, penjualan.tanggal_selesai, penjualan.status FROM penjualan INNER JOIN pengguna ON penjualan.id_pengguna = pengguna.id_pengguna INNER JOIN produk ON penjualan.id_produk = produk.id_produk WHERE penjualan.id_penjualan = '$id_penjualan'");
		}
 	} 

	public function updateOngkir($id_penjualan,$data)
 	{
		$this->db->where('id_penjualan', $id_penjualan);
		$this->db->update('penjualan', $data);
	
		if ($this->db->affected_rows() > 0) {
			return 'ok';
		} else {
			return 'error';
		}
 	}

 } 
?>