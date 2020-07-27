<?php namespace App\Controllers;

use App\Models\AccountModel;

class Dashboard extends BaseController
{
	public function index()
	{
		$data = [];
		$account = new AccountModel();
		$userid = session()->get('id');
		//$data['accInfo'] = $account->where('userId', session()->get('id'));
		$data['accInfo'] = $account->where('userId', $userid)->findAll();

		echo view('template/header', $data);
		echo view('dashboard', $data);
		echo view('template/footer', $data);
	}

	public function createAccount()
	{
		$data = [];
		$account = new AccountModel();

		// each user can have one or more paper trading accounts

		helper(['form']);

		if ($this->request->getMethod() == 'post')
		{
			//  se è una richiesta post allora faccio la validazione del modulo
			$rules = [
				'balance' => 'required',
			];

			if(!$this->validate($rules))
			{
				// se il form non è valido
				$data['validation'] = $this->validator;
			}
			else
			{
				// creo l'utente nel database
				$model = new AccountModel();
				$newData = [
					'userId' => session()->get('id'),
					'balance' => $this->request->getVar('balance'),
					'startingBalance' => $this->request->getVar('balance'),
				];

				$model->save($newData);

				session()->setFlashdata('success', 'You created a new account');
				return redirect()->to('/dashboard');

			}
		
		}

		// altrimenti carico le view standard

		echo view('template/header', $data);
		echo view('createaccount', $data);
		echo view('template/footer', $data);
	}

	public function deleteAccount()
	{
		$account = new AccountModel();

		$id = $this->request->getPost('accountid');
		$userid = session()->get('id');

		$account->where('id', $id);
		$account->where('userId', $userid)
				->delete();

		return redirect()->to("/dashboard");

	}
}