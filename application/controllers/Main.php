<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

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
		$this->load->model('Main_Model','MainModel');
	}
    
	// *** Modul User Homepage ***

	// page
	public function index()
	{
		if ($this->session->userdata('role')!="admin") {
            $this->session->set_flashdata('message','belum login');
            redirect('/user/login');
        }
		$data['ringkasan_penjualan'] = $this->MainModel->getSummaryOrder()->result();
		$data['total_penjualan'] = $this->MainModel->getTotalSale()->result();
		$data['total_produk'] = $this->MainModel->getTotalProduct()->result();
		$data['total_kopi_arabica'] = $this->MainModel->getTotalArabicaCoffe()->result();
		$data['total_kopi_robusta'] = $this->MainModel->getTotalRobustaCoffe()->result();

		$this->load->view('admin/index',$data);
	}
	
	// *** Modul Authentication ***

	// page
	public function login()
	{
		$this->load->view('login');
	}

    public function register()
	{
		$this->load->view('register');
	}

	// process
	public function registerProcess()
	{
		$nama		= htmlspecialchars($this->input->post('nama'));
		$email		= htmlspecialchars($this->input->post('email'));
		$password	= password_hash(htmlspecialchars($this->input->post('password')), PASSWORD_DEFAULT);
        $role	= 'admin';

		// upload foto user
		$foto 						= $_FILES['foto']['name'];
		$ekstensi = explode('.', $foto);
		$namaFileBaru = uniqid();
		$namaFileBaru .= '.';
		$namaFileBaru .= $ekstensi[1];
		if($foto=''){}else{
			$config['upload_path']			='./assets/images/user';
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
			'id_pengguna'	   	=> '',
			'nama' 	   	        => $nama,
			'email' 	   		=> $email,
			'password' 	   		=> $password,
			'role' 	   		    => $role,
			'foto' 				=> $foto, 
		);

		var_dump($data);

		$this->MainModel->register($data,'pengguna');
		redirect('/user/login');		
	}


	public function registerUserProcess()
	{
		$nama		= htmlspecialchars($this->input->post('nama'));
		$email		= htmlspecialchars($this->input->post('email'));
		$password	= password_hash(htmlspecialchars($this->input->post('password')), PASSWORD_DEFAULT);
        $role	= 'user';

		// upload foto user
		$foto 						= $_FILES['foto']['name'];
		$ekstensi = explode('.', $foto);
		$namaFileBaru = uniqid();
		$namaFileBaru .= '.';
		$namaFileBaru .= $ekstensi[1];
		if($foto=''){}else{
			$config['upload_path']			='./assets/images/user';
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
			'id_pengguna'	   	=> '',
			'nama' 	   	        => $nama,
			'email' 	   		=> $email,
			'password' 	   		=> $password,
			'role' 	   		    => $role,
			'foto' 				=> $foto, 
		);

// 		var_dump($data);

		$this->MainModel->register($data,'pengguna');
		redirect('/user/login');	
	}

    public function loginProcess()
	{
		$email	= htmlspecialchars($this->input->post('email'));
		$password	= htmlspecialchars($this->input->post('password'));
		$user			= $this->MainModel->login($email)->row_array();
		// var_dump($user['role']);
		if($user > 0 ) {
			if (password_verify($password,  $user['password'])) {
				$user_arr = array(
					'id_pengguna' => $user['id_pengguna'],
					'role'	  => $user['role'],
					 );
                // var_dump($user_arr);
				$this->session->set_userdata($user_arr);
				$this->session->set_flashdata('message','berhasil login');
				if($user['role']=='admin'){
					redirect('/admin');
				}else{
					redirect('/');
				}
				
			}else{
				$this->session->set_flashdata('message','password salah');
                // var_dump('Password Salah');
				redirect('/user/login');;
			}
		}else{
			$this->session->set_flashdata('message','tak terdaftar');
			redirect('/user/login');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
        redirect('/user/login');
	}

	// *** Modul Manage user ***
	// page
    public function users()
	{
		$data['pengguna'] = $this->MainModel->getUsers()->result(); 
		$this->load->view('admin/user-list/index', $data);
	} 
 
    public function updateUser($id_pengguna)
	{
		$detailPengguna		= $this->MainModel->getUser($id_pengguna)->result();
		$data['detail_pengguna'] 		= $detailPengguna[0];
		$this->load->view('admin/user-edit/index', $data);
	}

	// process
	public function updatePenggunaProcess()
	{
		$id_pengguna = htmlspecialchars($this->input->post('id_pengguna'));
		$foto_lama = htmlspecialchars($this->input->post('foto_lama'));
		$nama		= htmlspecialchars($this->input->post('nama'));
		$email		= htmlspecialchars($this->input->post('email'));
		$password	= password_hash(htmlspecialchars($this->input->post('password')), PASSWORD_DEFAULT);
		// $role	= htmlspecialchars($this->input->post('role'));
        $role	= 'user';

		// upload foto user
		$foto 						= $_FILES['foto']['name'];
		
		if($foto==''){
			$foto = $foto_lama;
		}else{
		    $ekstensi = explode('.', $foto);
    		$namaFileBaru = uniqid();
    		$namaFileBaru .= '.';
    		$namaFileBaru .= $ekstensi[1];
			$config['upload_path']			='./assets/images/user';
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
			'nama' 	   	        => $nama,
			'email' 	   		=> $email,
			'password' 	   		=> $password,
			'role' 	   		    => $role,
			'foto' 				=> $foto, 
		);

		// var_dump($data);

		$result = $this->MainModel->updateUser($id_pengguna,$data);
		if($result == 'ok'){
			redirect('/user');	
		}else{
			echo "error";
		}
		
	}

	public function deletePengguna($id_pengguna)
    { 
        $result = $this->MainModel->deleteUser($id_pengguna);
        if ($result) {
			redirect('/main');	
        } else {
			redirect('/main');	
        }
    }

	// *** Modul Manage Product ***
	// page
	public function produkAdmin()
	{
		$data['produk'] = $this->MainModel->getProducts()->result(); 
		$this->load->view('admin/produk-list/index',$data);
	} 


	public function produkAdminAdd()
	{
		$this->load->view('admin/produk-tambah/index');
	} 

	public function produkUpdate($id_produk)
	{
		$detailProduk		= $this->MainModel->getProduct($id_produk)->result();
		$data['detail_produk'] 		= $detailProduk[0];
		$this->load->view('admin/produk-edit/index', $data);
	}


	// process
	public function produkAddProcess()
	{
		$nama_produk		= htmlspecialchars($this->input->post('nama_produk'));
		$kategori		= htmlspecialchars($this->input->post('kategori'));
		$berat		= htmlspecialchars($this->input->post('berat'));
		$stok		= htmlspecialchars($this->input->post('stok'));
		$harga		= htmlspecialchars($this->input->post('harga'));
		$deskripsi		= htmlspecialchars($this->input->post('deskripsi'));
		$nama_produk		= htmlspecialchars($this->input->post('nama_produk'));

		// upload foto produk
		$foto 						= $_FILES['foto_produk']['name'];
		$ekstensi = explode('.', $foto);
		$namaFileBaru = uniqid();
		$namaFileBaru .= '.';
		$namaFileBaru .= $ekstensi[1];
		if($foto=''){}else{
			$config['upload_path']			='./assets/images/produk';
			$config['allowed_types'] 		='jpg|gif|png|jpeg';
			$config['encrypt_name']			=TRUE;


			$this->load->library('upload',$config);
			if(!$this->upload->do_upload('foto_produk')){
				echo"upload Gagal!";
				 die();
			}else{
				$foto=$this->upload->data('file_name');
			}
		}
		// akhir upload

		$data = array(
			'id_produk'	   				=> '',
			'nama_produk' 	   	      	=> $nama_produk,
			'kategori' 	   				=> $kategori,
			'berat' 	   				=> $berat,
			'stok' 	   					=> $stok,
			'harga' 	   				=> $harga,
			'tanggal_perubahan' 	   	=> null,
			'foto_produk' 	   		    => $foto,
			'deskripsi' 				=> $deskripsi, 
		);

// 		var_dump($data);

		$this->MainModel->addProduk($data,'produk');
		redirect('/produk');		
	}


	public function updateProdukProcess()
	{
		$id_produk 			= htmlspecialchars($this->input->post('id_produk'));
		$foto_lama 			= htmlspecialchars($this->input->post('foto_lama'));
		$nama_produk		= htmlspecialchars($this->input->post('nama_produk'));
		$kategori			= htmlspecialchars($this->input->post('kategori'));
		$berat				= htmlspecialchars($this->input->post('berat'));
		$stok				= htmlspecialchars($this->input->post('stok'));
		$harga				= htmlspecialchars($this->input->post('harga'));
		$tanggal_perubahan	= htmlspecialchars($this->input->post('tanggal_perubahan'));
		$deskripsi			= htmlspecialchars($this->input->post('deskripsi'));

		// upload foto produk
		$foto 			= $_FILES['foto']['name'];
		if($foto==''){
			$foto = $foto_lama;
		}else{
			$ekstensi 		= explode('.', $foto);
			$namaFileBaru 	= uniqid();
			$namaFileBaru 	.= '.';
			$namaFileBaru 	.= $ekstensi[1];
			$config['upload_path']			='./assets/images/produk';
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
			'nama_produk' 	   	        => $nama_produk,
			'kategori' 	   				=> $kategori,
			'berat' 	   				=> $berat,
			'stok' 	   					=> $stok,
			'harga' 	   				=> $harga,
			'tanggal_perubahan' 		=> date('Y-m-d H:i:s'), 
			'foto_produk' 				=> $foto, 
			'deskripsi' 				=> $deskripsi, 
		);

		// var_dump($data);

		$result = $this->MainModel->updateProduct($id_produk,$data);
		if($result == 'ok'){
			redirect('/produk');	
		}else{
			echo "error";
		}
	}

	public function deleteProduk($id_produk)
    { 
        $result = $this->MainModel->deleteProduct($id_produk);
        if ($result) {
			redirect('/main/ProdukAdmin');	
        } else {
            echo "Gagal menghapus data";
			redirect('/main/ProdukAdmin');	
        }
    }
    
    public function riwayatPenjualan()
	{
		$data['order'] = $this->MainModel->getOrder()->result();
		$this->load->view('admin/riwayat-penjualan/index', $data);
	}

	public function updatePaymentStatus()
	{
		$id_penjualan = htmlspecialchars($this->input->post('id_penjualan'));
		$status = htmlspecialchars($this->input->post('status'));

		$data = array(
			'status' 	=> $status, 
		);

		// var_dump($data);
		$result = $this->MainModel->updatePaymentStatus($id_penjualan,$data);
		if($result == 'ok'){
			redirect('/penjualan');	
		}else{
			echo "error";
		}
	}
}