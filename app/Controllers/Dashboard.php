<?php namespace App\Controllers;

class Dashboard extends BaseController
{
	public function index()
	{
		$data = [];

	

		echo view('template/header', $data);
		echo view('dashboard', $data);
		echo view('template/footer', $data);
	}

	//--------------------------------------------------------------------

}
