<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rajaongkir extends CI_Controller {

	function getCost(){
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
                window.location.href = '".base_url('user/keranjang')."';
            </script>";
		}else {
			$data = [
				'origin' => $origin,
				'destination' => $destination, 
				'berat' => $berat, 
				'courier' => $courier,
				'namapengirim' => $namapengirim,
				'kecamatan' => $kecamatan,
				'desa' => $desa,
				'kodepos' => $kodepos,
				'telp' => $telp
			];
			$this->load->view('rajaongkir/GetCost', $data);
		}
	}
}