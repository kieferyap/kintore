<?
/**
 * The Entries Controller.
 *
 * A controller which displays kintore entries.
 *
 * @package  app
 * @extends  Controller
 */
class Controller_Auth extends Controller_Template
{
	private function hash_password($password)
	{
		return base64_encode(hash_pbkdf2('sha256', $password, Config::get('token_salt'), Config::get('iterations', 10000), 32, true));
	}

	private function login($username='', $password='') {
		$username = trim($username);
		$password = trim($password);

		if (empty($username) or empty($password)) {
			return false;
		}

		$password = $this->hash_password($password);

		// and do a lookup of this user
		$user = Model_User::query()
					->where('username', '=', $username)
					->where('password', '=', $password)
					->get_one();

		if(!$user) {
			return false;
		}

		Session::set('username', $username);
		Session::set('user_id', $user->id);
		return $user;
	}

	public function action_login() {
		if(Session::get('user_id')) {
			Session::set_flash('success', Session::get('username').'としてログインしています。');
			return Response::redirect('/');
		}
		if(Input::method() == 'POST') {
			if($this->login(Input::param('username'), Input::param('password'))) {
				Session::set_flash('success', Session::get('username').'としてログインしてます。');
				return Response::redirect('/');
			} else {
				Session::set_flash('error', 'ユーザー名またはパスワードが間違います。');
			}
		}
		
		$form = Fieldset::forge('loginform');
		$form->form()->add_csrf();

		$view = View::forge('auth/login');
		$view->set('form', $form, false);

		$this->template->title = "ログイン- Let's 筋トレ!";
		$this->template->content = Response::forge($view);
	}

	public function action_logout() {
		Session::delete('username');
		Session::delete('user_id');
		Session::set_flash('success', 'ログアウトしました。');
		return Response::redirect('auth/login');
	}

	public function action_register() {
		$form = Fieldset::forge('registerform');
		$form->form()->add_csrf();

		$form->add_model('Model_User');
		
		$form->add_after(
			'confirm',
			'確認', 
			array('type'=>'password'), 
			array(), 
			'password')->add_rule('required');

		if(Input::method() == 'POST') {
			$form->validation()->run();
			if(!$form->validation()->error()) {
				try {
					$username = $form->validated('username');
					$password = $form->validated('password');

					$username = trim($username);
					$password = trim($password);

					if (empty($username) or empty($password)) {
						Session::set_flash('error', 'ユーザー名またはパスワードが空です。');
						throw new Exception('Username or password is empty.');
					}

					$duplicate = Model_User::query()
						->where('username', '=', $username)
						->get_one();

					if($duplicate) {
						Session::set_flash('error', 'ユーザー名が存在しています。');
						throw new Exception('Username exists.');
					}

					$user = Model_User::forge(array(
						'username' => (string) $username,
						'password' => $this->hash_password((string) $password),
						'login_hash' => '',
					));
					$user->save();

					$exercise = new Model_Exercise();
					$exercise->name = 'ベンチプレス';
					$exercise->unit = 'kg';
					$exercise->user_id = $user->id;
					$exercise->save();

					Session::set_flash('success', 'アカウントを作成しました。');
				} catch (Exception $e) {
					$form->repopulate();
				}
			} else {
				Session::set_flash('error', 'エラーが発生しました。ユーザー名とパスワードをご確認ください。');
			}
		}
		$view = View::forge('auth/register');
		$view->set('form', $form, false);

		$this->template->title = "登録- Let's 筋トレ!";
		$this->template->content = Response::forge($view);
	}
}
