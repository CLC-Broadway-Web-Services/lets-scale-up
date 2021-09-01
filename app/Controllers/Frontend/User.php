<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use App\Models\Globals\UserModel;

class User extends BaseController
{
	public function login()
	{
		$data = [];

		if ($this->request->getMethod() == 'post') {

			$rules = [
				'email' => 'required|min_length[6]|max_length[50]|valid_email',
				'password' => 'required|min_length[8]|max_length[255]|validateUser[email,password]',
			];

			$errors = [
				'password' => [
					'validateUser' => "Email or Password don't match",
				],
			];

			if (!$this->validate($rules, $errors)) {
				if ($this->request->getVar('type') == 'ajax') {
					return json_encode(['success' => false, 'message' => $this->validator->listErrors()]);
				}

				return view('login', [
					"validation" => $this->validator,
				]);
			} else {
				$model = new UserModel();

				$user = $model->where('email', $this->request->getVar('email'))->first();

				// Stroing session values
				$this->setUserSession($user);
				if ($this->request->getVar('type') == 'ajax') {
					return json_encode(['success' => true, 'message' => 'Successfully Login.']);
				}
				// Redirecting to dashboard after login
				if ($this->request->getVar('history_url')) {
					return redirect()->to($this->request->getVar('history_url'));
				} else {
					return redirect('home_page');
				}
			}
		}
		return view('login');
	}

	private function setUserSession($user)
	{
		$user = [
			'id' => $user->id,
			'name' => $user->name,
			'phone_no' => $user->phone_no,
			'email' => $user->email,
		];
		$data = [
			'user' => $user,
			'isUserLoggedin' => true,
		];

		session()->set($data);
		return true;
	}

	public function register()
	{
		$data = [];

		if ($this->request->getMethod() == 'post') {
			$rules = [
				'name' => 'required|min_length[3]|max_length[20]',
				'phone_no' => 'required|min_length[9]|max_length[20]',
				'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]',
				'password' => 'required|min_length[8]|max_length[255]',
				'password_confirm' => 'matches[password]',
			];
			$errors = [
				'email' => [
					'is_unique' => "Email is already registered.",
				],
			];

			if (!$this->validate($rules, $errors)) {
				if ($this->request->getVar('type') == 'ajax') {
					return json_encode(['success' => false, 'message' => $this->validator->listErrors()]);
				}

				return view('register', [
					"validation" => $this->validator,
				]);
			} else {
				$model = new UserModel();

				$newData = [
					'name' => $this->request->getVar('name'),
					'phone_no' => $this->request->getVar('phone_no'),
					'email' => $this->request->getVar('email'),
					'password' => $this->request->getVar('password'),
				];
				$model->save($newData);
				if ($this->request->getVar('type') == 'ajax') {
					return json_encode(['success' => true, 'message' => 'Successful Registration']);
				}
				$session = session();
				$session->setFlashdata('success', 'Successful Registration');
				return redirect()->to(base_url('login'));
			}
		}
		return view('register');
	}

	public function profile()
	{
		$data = [];
		$model = new UserModel();

		$data['user'] = $model->where('id', session()->get('id'))->first();
		return view('profile', $data);
	}

	public function logout()
	{
		session()->destroy();
		return redirect('home_page');
	}
}
