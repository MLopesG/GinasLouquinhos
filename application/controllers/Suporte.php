<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suporte extends CI_Controller {
	public function index()
	{
		redirect('https://api.whatsapp.com/send?phone=5567998343255&text=Suporte%20para%20sistema%20ginas%20louquinhos');
	}
}