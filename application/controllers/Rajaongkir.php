<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rajaongkir extends CI_Controller {

	public function index()
	{
		$this->load->view('cek_ongkir');
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
		$origin = $this->input->get('origin');
		$destination = $this->input->get('destination');
		$berat = $this->input->get('berat');
		$courier = $this->input->get('courier');
		$namapengirim = $this->input->get('namapengirim');
		$kecamatan = $this->input->get('kecamatan');
		$desa = $this->input->get('desa');
		$kodepos = $this->input->get('kodepos');
		$telp = $this->input->get('telp');

		if (empty($origin && $destination && $berat && $courier && $namapengirim && $kecamatan && $desa && $kodepos && $telp)) {
			echo "<script>
                alert('Lengkapi data pengiriman terlebih dahulu!');
                window.location.href = '".base_url('Keranjang')."';
            </script>";
		}else {

				$data = array(	'origin' => $origin,
								'destination' => $destination, 
								'berat' => $berat, 
								'courier' => $courier,
								'namapengirim' => $namapengirim,
								'kecamatan' => $kecamatan,
								'desa' => $desa,
								'kodepos' => $kodepos,
								'telp' => $telp
				);
				
				$this->load->view('rajaongkir/GetCost', $data);
		}

	function getResi()
			{
				$waybill = $this->input->get('waybill');

				$data = array('waybill' => $waybill

				);
				
				$this->load->view('rajaongkir/getResi', $data);
			}
		}

}