<?php namespace App\Controllers;

class Users extends BaseController
{
	public function index()
	{
		echo view('template/header');
		echo view('login');
		echo view('template/footer');
	}

	//--------------------------------------------------------------------

}
