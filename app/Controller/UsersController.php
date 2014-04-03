<?php

class UsersController extends AppController {

	// Adicionado Componente para Upload de Arquivos
	public $components = array('Arquivo');

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('add', 'logout', 'change_password', 'remember_password', 'remember_password_step_2');
	}

	public function index() {
		if (AuthComponent::user('role') != 'admin') {
			throw new ForbiddenException("Você não tem permissão para executar esta ação.");
		}
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

	public function login() {
		if ($this->request->is('post')) {
			try {
				# Retrieve user username for auth
				$this->request->data['User']['username'] = $this->User->getUsername($this->request->data['User']['email']);
			} catch (Exception $e) {
				# In case that this email dont exists in database
				$this->Session->setFlash($e->getMessage(), 'flash_fail');
				$this->redirect('/');
			}

			# Try to log in the user
			if ($this->Auth->login()) {
				if (!empty($this->request->data['User']['remember_me']) && $this->request->data['User']['remember_me'] == 'S') {
					$cookie = array();
					$cookie['username'] = $this->request->data['User']['username'];
					$cookie['password'] = $this->Auth->password($this->request->data['User']['password']);

					# Write cookie ( 30 Days )
					$this->Cookie->write('Auth.User', $cookie, true);
				}

				# Redirect to home
				$this->redirect($this->Auth->redirect());
			} else {
				$this->Session->setFlash(__('Invalid username or password, try again'), 'flash_fail');
			}
		}
	}

	public function logout() {
		# Destroy the Cookie
		$this->Cookie->delete('Auth.User');

		# Destroy the session
		$this->redirect($this->Auth->logout());
	}


	public function view($username = null) {
		if (AuthComponent::user('role') != 'admin') {
			throw new ForbiddenException("Você não tem permissão para executar esta ação.");
		}

		$user = $this->User->findByUsername($username);

		$this->User->id = $user['User']['id'];

		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->set('user', $user);
	}


	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();

			// Upload da Foto
			// Upload Novo
				if(!empty($_FILES))
				{
				$errors = array();

				// Organiza o array de multiple upload
				$files = $this->Arquivo->MultipleFiles( $_FILES['multipleFiles'] );
				
				// Abre cada array de arquivos
				foreach($files as $file) 
				{
					// Caso o arquivo seja válido
					if( $file['error'] == 0 )
					{
						// Faz o upload da foto no tamanho original
						if( $foto = $this->Arquivo->upload($file,'img/') )
						{
							// Verifica o tamanho mínimo para criar o thumbnail
							if( !$this->Arquivo->validaTamanho(
								$foto['link'],
								Configure::read('Gerenciador.photo_thumbnail_size.0'), // Width
								Configure::read('Gerenciador.photo_thumbnail_size.1'), // Height
								'min'						
								) )
							{
								array_push($errors,$foto['nome']);
							}
							else
							{							
								// Cria o thumbnail
								$thumbnail = $this->Arquivo->generateThumbnail(
									$file, // File
									'fotos/', // Pasta em que será salvo
									Configure::read('Gerenciador.photo_thumbnail_size.0'), // Width
									Configure::read('Gerenciador.photo_thumbnail_size.1'), // Height
									'crop', // Crop
									$foto['nome_no_ext']); // Nome do arquivo sem extensão

								// Salva os dados no banco
								$data = array(
									'Photo' => array(
										'nome' => $foto['nome'],
										'photo' => $foto['link'],
										'thumbnail' => $thumbnail['link'],
									)
								);
								
								// Upload da Foto
								// $foto = self::upload($this->request->data['User']['photo'], 'img/user/');

								$data = array('User' =>  
											array('name' => $this->request->data['User']['name'],
												  'username'=> $this->request->data['User']['username'],
												  'password'=> $this->request->data['User']['password'],
												  'email'=> $this->request->data['User']['email'],
												  'role'=> $this->request->data['User']['role'],
												  'photo'=> $foto['link'],
												   ) 
											);

								if ($this->User->save($data)) {

									if( AuthComponent::user('id') ) {
										# Store log
										CakeLog::info('The user '.AuthComponent::user('username').' (ID: '.AuthComponent::user('id').') registered user (ID: '.$this->User->id.')','users');
									}
									$this->Session->setFlash(__('The user has been saved'), 'flash_success');
									$this->redirect('/users');
								} else {
									# Create a loop with validation errors
									$this->Error->set($this->User->invalidFields());
								}
							}
						}

					}
				}

				$this->Session->setFlash('Fotos cadastradas com sucesso.','flash_success');

				# Verifica se alguma imagem foi inválida
				if( count($errors) > 0 )
				{
					$message = '';

					foreach ($errors as $error) 
					{
						$message .= 'A imagem <strong>'.$error.'</strong> deve ter pelo menos '.Configure::read('Gerenciador.photo_thumbnail_size.0').'x'.Configure::read('Gerenciador.photo_thumbnail_size.1').'pixels. Upload cancelado.<br/>';
					}

					$this->Session->setFlash($message,'flash_fail');
				}

				$this->redirect(array('action' => 'index'));
			}

			if ($this->User->save($data)) {

				if( AuthComponent::user('id') ) {
					# Store log
					CakeLog::info('The user '.AuthComponent::user('username').' (ID: '.AuthComponent::user('id').') registered user (ID: '.$this->User->id.')','users');
				}
				$this->Session->setFlash(__('The user has been saved'), 'flash_success');
				$this->redirect('/users');
			} else {
				# Create a loop with validation errors
				$this->Error->set($this->User->invalidFields());
			}
		}
		$this->set('label', 'Register user');
		$this->render('_form');
	}

	public function edit($id = null) {
		if (AuthComponent::user('role') != 'admin') {
			throw new ForbiddenException("Você não tem permissão para executar esta ação.");
		}

		$this->User->id = $id;

		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->set('user', $this->User->findById($id));

		if ($this->request->is('post') || $this->request->is('put')) {
			if (empty($this->request->data['User']['password'])) {
				unset($this->request->data['User']['password']);
			}

				// Upload Novo
				if(!empty($_FILES))
				{
				$errors = array();

				// Organiza o array de multiple upload
				$files = $this->Arquivo->MultipleFiles( $_FILES['multipleFiles'] );
				
				// Abre cada array de arquivos
				foreach($files as $file) 
				{
					// Caso o arquivo seja válido
					if( $file['error'] == 0 )
					{
						// Faz o upload da foto no tamanho original
						if( $foto = $this->Arquivo->upload($file,'img/') )
						{
							// Verifica o tamanho mínimo para criar o thumbnail
							if( !$this->Arquivo->validaTamanho(
								$foto['link'],
								Configure::read('Gerenciador.photo_thumbnail_size.0'), // Width
								Configure::read('Gerenciador.photo_thumbnail_size.1'), // Height
								'min'						
								) )
							{
								array_push($errors,$foto['nome']);
							}
							else
							{							
								// Cria o thumbnail
								$thumbnail = $this->Arquivo->generateThumbnail(
									$file, // File
									'fotos/', // Pasta em que será salvo
									Configure::read('Gerenciador.photo_thumbnail_size.0'), // Width
									Configure::read('Gerenciador.photo_thumbnail_size.1'), // Height
									'crop', // Crop
									$foto['nome_no_ext']); // Nome do arquivo sem extensão

								// Salva os dados no banco
								$data = array(
									'Photo' => array(
										'nome' => $foto['nome'],
										'photo' => $foto['link'],
										'thumbnail' => $thumbnail['link'],
									)
								);
								
								// Upload da Foto
								// $foto = self::upload($this->request->data['User']['photo'], 'img/user/');

								$data = array('User' =>  
											array('name' => $this->request->data['User']['name'],
												  'username'=> $this->request->data['User']['username'],
												  'password'=> $this->request->data['User']['password'],
												  'email'=> $this->request->data['User']['email'],
												  'role'=> $this->request->data['User']['role'],
												  'photo'=> $foto['link'],
												   ) 
											);

								if ($this->User->save($data)) {
								// if ($this->User->save($this->request->data)) {
									# Store log
									CakeLog::info('The user '.AuthComponent::user('username').' (ID: '.AuthComponent::user('id').') edited user (ID: '.$this->User->id.')','users');

									$this->Session->setFlash(__('The user has been saved'), 'flash_success');
									$this->redirect(array('action' => 'index'));
								} else {
									$this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'flash_fail');
								}
							}
						}

					}
				}

				$this->Session->setFlash('Fotos cadastradas com sucesso.','flash_success');

				# Verifica se alguma imagem foi inválida
				if( count($errors) > 0 )
				{
					$message = '';

					foreach ($errors as $error) 
					{
						$message .= 'A imagem <strong>'.$error.'</strong> deve ter pelo menos '.Configure::read('Gerenciador.photo_thumbnail_size.0').'x'.Configure::read('Gerenciador.photo_thumbnail_size.1').'pixels. Upload cancelado.<br/>';
					}

					$this->Session->setFlash($message,'flash_fail');
				}

				$this->redirect(array('action' => 'index'));
			}

			
		} else {
			$this->request->data = $this->User->read(null, $id);
			unset($this->request->data['User']['password']);
		}
		$this->set('label', 'Edit user');
		$this->render('_form');
	}

	public function delete($id = null) {
		if (AuthComponent::user('role') != 'admin') {
			throw new ForbiddenException("Você não tem permissão para executar esta ação.");
		}

		$this->User->id = $id;

		// Deletar Foto
		$user  = $this->User->findById($id);
		// print_r($user);
		$foto = WWW_ROOT.$user['User']['photo'];

		unlink($foto);

		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}



		CakeLog::info('Foto deletada: ' . $foto);

		if ($this->User->delete()) {
			# Store log
			CakeLog::info('The user '.AuthComponent::user('username').' (ID: '.AuthComponent::user('id').') deleted user (ID: '.$this->User->id.')','users');

			$this->Session->setFlash(__('User deleted'), 'flash_success');
			$this->redirect('/users');
		}

		$this->Session->setFlash(__('User was not deleted'), 'flash_fail');

		// $this->redirect('/home');
	}


	public function change_password() {
		$user = $this->User->read(null, AuthComponent::user('id'));
		$this->set('user', $user);

		if ($this->request->is('post')) {
			# Verify if password matches
			if ($this->request->data['User']['password'] === $this->request->data['User']['re_password']) {
				# Verify if user is logged in
				if (AuthComponent::user('id')) {
					$this->request->data['User']['id'] = AuthComponent::user('id');
				} else # Maybe hes comming from change password form
				{
					# Check the hash in database
					$user = $this->User->findByHashChangePassword($this->request->data['User']['hash']);

					if (!empty($user)) {
						$this->request->data['User']['id'] = $user['User']['id'];

						# Clean users hash in database
						$this->request->data['User']['hash_change_password'] = '';
					} else {
						throw new MethodNotAllowedException(__('Invalid action'));
					}
				}

				if ($this->User->save($this->request->data)) {
					$this->Session->setFlash('Password updated successfully!', 'flash_success');
					$this->redirect(array('/home'));
				}
			} else {
				$this->Session->setFlash('Passwords do not match.', 'flash_fail');
			}
		}
	}


	/**
	 * Email form to inform the process of remembering the password.
	 * After entering the email is checked if this email is valid and if so, a message is sent containing a link to change your password
	 */
	public function remember_password() {
		if ($this->request->is('post')) {
			$user = $this->User->findByEmail($this->request->data['User']['email']);

			if (empty($user)) {
				$this->Session->setFlash('This email does not exist in our database.', 'flash_fail');
				$this->redirect(array('action' => 'login'));
			}

			$hash = $this->User->generateHashChangePassword();

			$data = array(
				'User' => array(
					'id' => $user['User']['id'],
					'hash_change_password' => $hash
				)
			);

			$this->User->save($data);

			$email = new CakeEmail();
			$email->template('remember_password', 'default')
					->config('gmail')
					->emailFormat('html')
					->subject(__('Remember password - ' . Configure::read('Application.name')))
					->to($user['User']['email'])
					->from(Configure::read('Application.from_email'))
					->viewVars(array('hash' => $hash))
					->send();

			$this->Session->setFlash('Check your e-mail to continue the process of recovering password.', 'flash_success');

		}
	}

	/**
	 * Step 2 to change the password.
	 * This step verifies that the hash is valid, if it is, show the form to the user to inform your new password
	 */
	public function remember_password_step_2($hash = null) {

		$user = $this->User->findByHashChangePassword($hash);

		if ($user['User']['hash_change_password'] != $hash || empty($user)) {
			throw new NotFoundException(__('Link inválido'));
		}

		# Sends the hash to the form to check before changing the password
		$this->set('hash', $hash);

		$this->render('/Users/change_password');

	}
}

?>
