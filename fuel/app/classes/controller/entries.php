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
	private function display_index() {
		// Select distinct dates
		// Query entries for that date
		$entry_query = Model_Entry::find('all', 
			array('order_by' => array('date' => 'desc')));
		$exercise_query = Model_Exercise::find('all');
		
		$exercises = array();
		$entries = array();

		foreach($exercise_query as $exercise) {
			$exercises[$exercise->id] = array(
				'name'=>$exercise->name,
				'unit'=>$exercise->unit);
		}

		foreach($entry_query as $entry) {
			$date_format = date("Y年m月d日", strtotime($entry->date)); 
			if (!array_key_exists($date_format, $entries)) {
				$entries[$date_format] = array();
			}

			array_push($entries[$date_format], array(
				'id'=>$entry->id,
				'exercise_name'=>$exercises[$entry->exercise_id]['name'],
				'calculation'=>$entry->weight.$exercises[$entry->exercise_id]['unit'].'x'.$entry->frequency.'回',
				'total'=>$entry->total.$exercises[$entry->exercise_id]['unit']
				)); 
				
		}

		$data = array(
				'entries'=>$entries,
				'exercises'=>$exercises
			);
		$this->template->title = "Let's 筋トレ!";
		$this->template->content = View::forge('entries/index', $data);
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
		$entry->save();

		Session::set_flash('success', '記入は完成しました。');
		$this->display_index();
	}

	public function action_delete($id) {
		$entry = Model_Entry::find($id);
		if(!$entry) {
			Response::redirect('/');
		}
		$entry->delete();

		Session::set_flash('success', '削除は完成しました。');
		$this->display_index();
	}

}
