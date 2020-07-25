<?php namespace App\Controllers;

use App\Models\UserModel;


class Users extends BaseController
{
	public function index()
	{
		helper(['form']);

		$data = [];

		echo view('template/header', $data);
		echo view('login', $data);
		echo view('template/footer', $data);
	}

	public function register()
	{
		$data = [];
		helper(['form']);

		if ($this->request->getMethod() == 'post')
		{
			//  se è una richiesta post allora faccio la validazione del modulo
			$rules = [
				'firstname' => 'required|min_length[3]|max_length[20]',
				'lastname' => 'required|min_length[3]|max_length[20]',
				'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]',
				'password' => 'required|min_length[8]|max_length[255]',
				'password_confirm' => 'matches[password]'
			];

			if(!$this->validate($rules))
			{
				// se il form non è valido
				$data['validation'] = $this->validator;
			}
			else
			{
				// creo l'utente nel database
				$model = new UserModel();
				$newData = [
					'firstname' => $this->request->getVar('firstname'),
					'lastname' => $this->request->getVar('lastname'),
					'email' => $this->request->getVar('email'),
					'password' => $this->request->getVar('password')
				];

				$model->save($newData);
				$session = session();

				$session->setFlashdata('success', 'Successful Registration');
				return redirect()->to('/');

			}
		
		}

		// altrimenti carico le view standard

		echo view('template/header', $data);
		echo view('register', $data);
		echo view('template/footer', $data);
	}
}
