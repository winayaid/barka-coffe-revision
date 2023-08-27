<?php
/** 
  * 
  */
 class User_Model extends CI_Model
 {
 	
 	function __construct()
 	{
 		parent::__construct();
 		$this->load->database();
 	} 
	
 	public function getProduct()
 	{
        return $this->db->get('produk');
 	}

    public function getProductById($id_produk)
    {
        return $this->db->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
    }

	public function getProductByCategory($kategori)
    {
        return $this->db->query("SELECT * FROM produk WHERE kategori='$kategori'");
    }

    public function order($data,$table)
 	{
 		return $this->db->insert($table,$data);
 	}

    public function getMyOrder($id_pengguna)
 	{
		{
			
			return $this->db->query("SELECT penjualan.id_penjualan as id_penjualan,pengguna.nama AS nama,produk.nama_produk AS nama_produk, produk.harga AS harga,penjualan.jumlah_beli, penjualan.total_harga AS total_harga, penjualan.alamat_pengiriman, penjualan.bukti_pembayaran, penjualan.tanggal_beli, penjualan.tanggal_selesai, penjualan.status FROM penjualan INNER JOIN pengguna ON penjualan.id_pengguna = pengguna.id_pengguna INNER JOIN produk ON penjualan.id_produk = produk.id_produk WHERE pengguna.id_pengguna = '$id_pengguna'")->result();
		}
 	}

	public function getDetailMyOrder($id_pengguna,$id_penjualan)
 	{
		{
			
			return $this->db->query("SELECT penjualan.id_penjualan as id_penjualan,pengguna.nama AS nama,produk.nama_produk AS nama_produk, produk.harga AS harga,penjualan.jumlah_beli, penjualan.total_harga AS total_harga, penjualan.alamat_pengiriman AS alamat_pengiriman, penjualan.bukti_pembayaran AS bukti_pembayaran, penjualan.tanggal_beli, penjualan.tanggal_selesai, penjualan.status, penjualan.ongkir FROM penjualan INNER JOIN pengguna ON penjualan.id_pengguna = pengguna.id_pengguna INNER JOIN produk ON penjualan.id_produk = produk.id_produk WHERE pengguna.id_pengguna = '$id_pengguna' AND penjualan.id_penjualan = '$id_penjualan'")->result();
		}
 	} 

	public function updatePayment($id_penjualan,$data)
 	{
		$this->db->where('id_penjualan', $id_penjualan);
		$this->db->update('penjualan', $data);
	
		if ($this->db->affected_rows() > 0) {
			return 'ok';
		} else {
			return 'error';
		}
 	} 

	 public function updateOrderAddress($id_penjualan,$data)
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