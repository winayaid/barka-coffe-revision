<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
    public function __construct()
	{
		parent::__construct();
		$this->load->model('User_Model','UserModel');
	}
    
	// *** Modul User Homepage ***

	// page
	public function index()
	{
		$data['product'] = $this->UserModel->getProduct()->result(); 
        $this->load->view('templates/user/header');
		$this->load->view('user/index', $data);
        $this->load->view('templates/user/footer');
	}

	public function aboutProduct()
	{
        $this->load->view('templates/user/header');
		$this->load->view('user/about-product');
        $this->load->view('templates/user/footer');
	}

	public function arabicaCoffe()
	{
		$data['product'] = $this->UserModel->getProductByCategory('arabica')->result();
        $this->load->view('templates/user/header');
		$this->load->view('user/arabica-coffe',$data);
        $this->load->view('templates/user/footer');
	}

	public function robustaCoffe()
	{
		$data['product'] = $this->UserModel->getProductByCategory('robusta')->result();
        $this->load->view('templates/user/header');
		$this->load->view('user/robusta-coffe',$data);
        $this->load->view('templates/user/footer');
	}
	
	public function login()
	{
		$this->load->view('login-user');
	}

	public function orderProduct($id_produk)
	{ 
		if ($this->session->userdata('role')=='') {
            $this->session->set_flashdata('message','belum login');
            redirect('/user/login');
        }
		$data['product_detail'] = $this->UserModel->getProductById($id_produk)->result()[0]; 
        $this->load->view('templates/user/header');
		$this->load->view('user/order-product', $data);
        $this->load->view('templates/user/footer');
	}

	public function orderProcess()
	{ 
		$id_pengguna		= htmlspecialchars($this->input->post('id_pengguna'));
		$id_produk			= htmlspecialchars($this->input->post('id_produk'));
		$jumlah_beli		= htmlspecialchars($this->input->post('jumlah_beli'));
		$harga				= htmlspecialchars($this->input->post('harga'));

		$data = array(
			'id_penjualan'	   		=> '',
			'id_pengguna' 	   	    => $id_pengguna,
			'id_produk' 	   		=> $id_produk,
			'alamat_pengiriman' 	=> '',
			'jumlah_beli' 	   		=> $jumlah_beli,
			'total_harga' 			=> $jumlah_beli * $harga, 
			'bukti_pembayaran'		=> '',
			'tanggal_beli'			=> date('Y-m-d'),
			'tanggal_selesai'		=> '',
			'status'				=> 'onprocess'
		);

		$this->UserModel->order($data,'penjualan'); 
		
		redirect('/user/myOrder');	
	}

	public function myOrder()
	{
        $data['my_order'] = $this->UserModel->getMyOrder($this->session->userdata('id_pengguna'));
		$this->load->view('templates/user/header');
		$this->load->view('user/my-order',$data);
        $this->load->view('templates/user/footer');
	}

	public function detailOrder($id_penjualan)
	{
		$data['my_detail_order'] = $this->UserModel->getDetailMyOrder($this->session->userdata('id_pengguna'),$id_penjualan)[0];
        $this->load->view('templates/user/header');
		$this->load->view('user/detail-order',$data);
        $this->load->view('templates/user/footer');
	}
 
	public function payment($id_penjualan)
	{
		$data['my_detail_order'] = $this->UserModel->getDetailMyOrder($this->session->userdata('id_pengguna'),$id_penjualan)[0];
        $this->load->view('templates/user/header');
		$this->load->view('user/payment',$data);
        $this->load->view('templates/user/footer');
	}

	public function uploadPaymentProcess()
	{
		$id_penjualan = htmlspecialchars($this->input->post('id_penjualan'));

		$foto 						= $_FILES['foto']['name'];
		$ekstensi = explode('.', $foto);
		$namaFileBaru = uniqid();
		$namaFileBaru .= '.';
		$namaFileBaru .= $ekstensi[1];
		if($foto==''){
			$foto = $foto_lama;
		}else{
			$config['upload_path']			='./assets/images/payment';
			$config['allowed_types'] 		='jpg|gif|png|jpeg';
			$config['encrypt_name']			=TRUE;


			$this->load->library('upload',$config);
			if(!$this->upload->do_upload('foto')){
				echo"upload Gagal!";
				 die();
			}else{
				$foto=$this->upload->data('file_name');
			}
		}
		// akhir upload

		$data = array(
			'bukti_pembayaran' 	=> $foto, 
		);

		// var_dump($data);
		$result = $this->UserModel->updatePayment($id_penjualan,$data);
		if($result == 'ok'){
			redirect('/user/myOrder');	
		}else{
			echo "error";
		}
	}
	
	
	public function updateOrderProcess()
	{
		$id_penjualan = htmlspecialchars($this->input->post('id_penjualan'));
		$alamat_pengiriman = htmlspecialchars($this->input->post('alamat_pengiriman'));


		$data = array(
			'alamat_pengiriman' 	=> $alamat_pengiriman, 
		);

		// var_dump($data);
		$result = $this->UserModel->updateOrderAddress($id_penjualan,$data);
		if($result == 'ok'){
			redirect('/user/myOrder');	
		}else{
			echo "error";
		}
	}
}