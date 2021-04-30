<?php

/**
 * The Entries Controller.
 *
 * A controller which displays kintore entries.
 *
 * @package  app
 * @extends  Controller
 */
class Controller_Entries extends Controller_Template
{
	private function check_active_session() {
		// If there's no active user in the session, check if there's a cookie login hash
		if(!Session::get('user_id')) {
			$login_hash = Cookie::get('login_hash');
			if($login_hash) {
				$user = Model_User::query()
					->where('login_hash', '=', $login_hash)
					->get_one();
				Session::set('username', $user->username);
				Session::set('user_id', $user->id);
				return true;
			} else {
				return false;
			}
		}
	}

	private function display_index($view=null) {
		$this->check_active_session();

		// If not logged in, redirect to login page.
		if(!Session::get('user_id')) {
			return Response::redirect('auth/login');
		}

		if(!$view) {
			$view = Presenter::forge('entries/index');
		}
		$this->template->title = "Let's 筋トレ!";
		$this->template->content = Response::forge($view);
	}

	/**
	 * Shows all entries
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_index()
	{
		$this->display_index();
	}

	/**
	 * Add a new entry
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_add()
	{
		if($this->check_active_session()) {
			if(Input::post('weight')) {
				$weight = Input::post('weight');
				$frequency = Input::post('frequency');

				if (!(is_numeric($weight) && is_numeric($frequency))) {
					Session::set_flash('error', '数字を入力してください。');
					$this->display_index();
					return;
				}

				$total = $weight*$frequency;

				$entry = new Model_Entry();
				$entry->exercise_id = Input::post('exercise');
				$entry->date = date("Y-m-d");
				$entry->weight = $weight;
				$entry->frequency = $frequency;
				$entry->total = $total;
				$entry->notes = Input::post('notes');
				$entry->user_id = Session::get('user_id');
				$entry->save();
				
				Session::set_flash('success', '記入は完成しました。');
				$this->display_index();
				return;
			}
			else {
				$this->display_index();
				return;
			}	
		} else {
			return Response::redirect('auth/login');
		}
	}

	public function action_delete() {
		$id = Input::post('id');
		if(!$id) {
			die(json_encode(array('is_success' => false, 'message' => 'No ID given.')));
		}

		$entry = Model_Entry::find($id);
		if(!$entry) {
			die(json_encode(array('is_success' => false, 'message' => 'ID does not exist.')));
		}
		$entry->delete();
		die(json_encode(array('is_success' => true)));
	}

	public function action_view($id=null) {
		if($this->check_active_session()) {
			if(!$id) {
				$this->display_index();
				return;
			}

			$view = Presenter::forge('entries/index', 'view_exercise');
			$view->set('exercise_id', $id);
			$this->display_index($view);
			return;
		} else {
			return Response::redirect('auth/login');
		}
	}

	public function action_exercise() {
		if($this->check_active_session()) {
			$name = Input::post('name');

			if($name) {
				$unit = Input::post('unit');

				if($unit == '') {
					$unit = '回';
				}

				$exercise = new Model_Exercise();
				$exercise->name = $name;
				$exercise->unit = $unit;
				$exercise->user_id = Session::get('user_id');
				$exercise->save();

				Session::set_flash('success', '記入は完成しました。');
			} 
			$this->display_index();
			return;
		} else {
			return Response::redirect('auth/login');
		}
	}

	public function action_404() {
		Session::set_flash('error', '<b>Error 404: </b>ページが見つかりませんでした。');
		$this->template->title = "Let's 筋トレ!"; 
		$this->template->is_bg_hidden = true;
		$this->template->content = View::forge('entries/404');
		return; 
	}
}
