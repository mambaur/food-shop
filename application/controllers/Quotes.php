<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quotes extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function index()
	{
		$this->subscribe();
	}

	public function subscribe()
	{
		$this->load->view('content/site_subscribe');
	}

	public function send_message()
	{
		$message = $this->input->post('message');
		$user_id = $this->input->post('user_id');
		$content = ['en'=>$message];

		$fields = [
				'app_id'=>'fc465953-4c99-4249-a55d-3cf52305b051',
				'filters'=>[
					[
						'field'=>'tag',
						'key'=>'user_id',
						'relation'=>'=',
						'value'=>$user_id
					],
				],
				'content'=>$content
		];
		$fields = json_encode($fields);
        // print("\nJSON sent:\n");
        // print($fields);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
            'Authorization: Basic NGM0Mzk5YjMtNTQzMi00OTkwLTkyY2EtMTI1MzNhODBmZjgz'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

        $response = curl_exec($ch);
        curl_close($ch);
       return $response;
	}

}

/* End of file Quotes.php */
/* Location: ./application/controllers/Quotes.php */