<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keranjang extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('Keranjang_model');
		$this->load->library('cart');
		$this->load->helper(array('url'));
		if($this->session->userdata('status') != "login"){
			echo "<script>
                alert('Anda harus login terlebih dahulu');
                window.location.href = '".base_url('login')."';
            </script>";

		}
	}

	public function index(){
		$user = $this->session->userdata("iduser");
		$idpesan = $this->Keranjang_model->get_idpesan();
		$this->load->view('element/Header');
		$this->load->view('user/user-keranjang');
		$this->load->view('element/Footer');
	}

	function insert(){
		$user = $this->session->userdata("iduser");
		$idproduk = $this->input->get('id');
		$qty = $this->input->post('value');
		$data = $this->db->get_where('produk', ['id_produk' => $idproduk])->row_array();

		$data_produk= array('id' => $idproduk,
							 'name' => $data['nama_produk'],
							 'price' => $data['harga'],
							 'gambar' => $data['gambar'],
							 'stok' => $data['stok'],
							 'berat' => $data['berat'],
							 'idpesan' => $this->Keranjang_model->get_idpesan(),
							 'qty' => $qty
							);
		$this->cart->insert($data_produk);
		echo "<script>
                alert('Produk berhasil dimasukkan ke keranjang');
                window.location.href = '".base_url('user/keranjang')."';
            </script>";
	}

	public function update(){
		$cart_info = $_POST['cart'] ;
		foreach( $cart_info as $id => $cart)
		{
			$rowid = $cart['rowid'];
			$price = $cart['price'];
			$amount = $price * $cart['qty'];
			$qty = $cart['qty'];
			$data = array('rowid' => $rowid,
							'price' => $price,
							'amount' => $amount,
							'qty' => $qty);
			$this->cart->update($data);
		}
		echo "<script>
                alert('Jumlah berhasil di update');
                window.location.href = '".base_url('user/keranjang')."';
            </script>";
	}

	public function hapus($rowid){
		if ($rowid=="all")
			{
				$this->cart->destroy();
			}
		else
			{
				$data = array('rowid' => $rowid,
			  				  'qty' =>0);
				$this->cart->update($data);
			}
		redirect('user/keranjang');
	}

	function getCity($province){		

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://api.rajaongkir.com/basic/city?province=$province",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
		    "key: fbd791dbdaa5ed2f93cd83f0f68887ef"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
			$data = json_decode($response, true);
			for ($j=0; $j < count($data['rajaongkir']['results']); $j++){
			

				echo "<option value='".$data['rajaongkir']['results'][$j]['city_id']."'>".$data['rajaongkir']['results'][$j]['city_name']." (".$data['rajaongkir']['results'][$j]['type'].")"."</option>";
			}
		}
	}

	function getCost()
	{
		$idpsn = $this->input->get('idpsn');
		$origin = $this->input->get('origin');
		$destination = $this->input->get('destination');
		$berat = $this->input->get('berat');
		$courier = $this->input->get('courier');

		$data = array(	'idpsn' => $idpsn,
						'origin' => $origin,
						'destination' => $destination, 
						'berat' => $berat, 
						'courier' => $courier 

		);
		
		$this->load->view('rajaongkir/GetCost', $data);
	}

	function coba(){
		$this->load->view('V_tabel');
	}
	function coba2(){
		echo '<p>'.$coba.'</p>';
	}

}
?>