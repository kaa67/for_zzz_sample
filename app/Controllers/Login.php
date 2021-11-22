<?php

namespace App\Controllers;

class Login extends BaseController
{
	protected $email = null;
	protected $password = null;
	protected $errors = [];

	public function index()
	{
		if ($this->user) return redirect()->to('/home');

		if (!empty($_POST))
		{
			$this->email = filter_input(INPUT_POST, 'email');
			$this->password = filter_input(INPUT_POST, 'password');

			$validation = \Config\Services::validation();
			$validation->setRules($this->rules());
			$validation->withRequest($this->request)->run();
	
			if ($validation->hasError('email'))
    			$this->errors['email'] = $validation->getError('email');

			if ($validation->hasError('password'))
    			$this->errors['password'] = $validation->getError('password');

			$this->userTouch();
		}

		if (empty($_POST) OR !empty($this->errors))
		{
			$content = view('login/login_form_view', [
				'email' => $this->email,
				'password' => $this->password,
				'errors' => $this->errors,
			]);

			return $this->templateMain([
				'content' => $content
			]);
		}

		return redirect()->to('/home');
	}

	protected function rules()
	{
		return [
			'email' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'Введите email'
				]
			],
			'password'    => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'Введите пароль'
				]
			],
		];
	}

	protected function userTouch()
	{
		if (empty ($this->errors))
		{
			$user = $this->db->table('users')
				->where('email', $this->email)
				->where('password_md5', md5($this->password))
				->get()
				->getRow();
			if (empty($user))
			{
				$this->errors['email'] = 'Емайл и/или пароль неверный(е)';
				return;
			}

			$this->user = $user;
			$this->db->table('ci_sessions')
    			->where('id', session_id())
				->set('user_id', $user->id)
				->update();
		}
	}
}
