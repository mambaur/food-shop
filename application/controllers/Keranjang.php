<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keranjang extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('M_pesanan');
		$this->load->library('cart');
		$this->load->helper(array('url'));
		if($this->session->userdata('status') != "login"){
			echo "<script>
                alert('Anda harus login terlebih dahulu');
                window.location.href = '".base_url('Login')."';
            </script>";//Url tujuan

		}
	}

	public function index(){
		$user = $this->session->userdata("iduser");
		$idpesan = $this->M_pesanan->get_idpesan();

		// $data['berat_total'] = $this->M_pesanan->total_berat($idpesan,$user);
		// $data['idpsn'] = $this->M_pesanan->get_idpesan($user);
		// $data['produk'] = $this->M_pesanan->tampil_barang($idpesan,$user);
		$this->load->view('element/Header');
		$this->load->view('V_pesanan');
		$this->load->view('element/Footer');
	}
	function insert1(){
		$user = $this->session->userdata("iduser");

		$data_produk= array('id' => $this->uri->segment(3),
							 'name' => $this->input->post('nama_produk'),
							 'price' => $this->uri->segment(4),
							 'gambar' => $this->input->post('gambar'),
							 'stok' => $this->input->post('stok'),
							 'berat' => $this->uri->segment(5),
							 'idpesan' => $this->M_pesanan->get_idpesan(),
							 'qty' =>$this->input->post('value')
							);
		$this->cart->insert($data_produk);
		echo "<script>
                alert('Produk berhasil dimasukkan ke keranjang');
                window.location.href = '".base_url('Keranjang')."';
            </script>";
	}

	public function update_krj(){
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
                window.location.href = '".base_url('Keranjang')."';
            </script>";
	}

	public function hapus_krj($rowid){
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
		redirect('keranjang');
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
		  //echo $response;
			$data = json_decode($response, true);
		  //echo json_encode($k['rajaongkir']['results']);

		  
		  for ($j=0; $j < count($data['rajaongkir']['results']); $j++){
		  

		    echo "<option value='".$data['rajaongkir']['results'][$j]['city_id']."'>".$data['rajaongkir']['results'][$j]['city_name']." (".$data['rajaongkir']['results'][$j]['type'].")"."</option>";
		  	 /*
		  	 if($data['rajaongkir']['results'][$j]['type']=="Kabupaten"){
		  	 	echo "Kabupaten";
		  	 }esle{
		  	 	echo "Kota";
		  	 }
		  	 */

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

	// function getResi()
	// {
	// 	$waybill = $this->input->get('waybill');

	// 	$data = array('waybill' => $waybill

	// 	);
		
	// 	$this->load->view('rajaongkir/GetResi', $data);
	// }

	function coba(){
		$this->load->view('V_tabel');
	}
	function coba2(){
		echo '<p>'.$coba.'</p>';
	}

}
?>