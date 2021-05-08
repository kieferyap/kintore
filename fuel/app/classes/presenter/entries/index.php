<?php

class Presenter_Entries_Index extends Presenter
{
	private function find_entries($id=null){
		// Exercise list
		$exercise_query = Model_Exercise::find('all', array(
			'where' => array(
				array('user_id', Session::get('user_id')),
			),
			'order_by' => array('name' => 'desc'),
		));
		$exercises = array();

		foreach($exercise_query as $exercise) {
			$exercises[$exercise->id] = array(
				'name'=>$exercise->name,
				'unit'=>$exercise->unit);
		}

		// Entry list
		$entries = array();
		if($id) {
			$entry_query = Model_Entry::query()
				->where('exercise_id', $id)
				->where('user_id', Session::get('user_id'))
				->order_by('date', 'desc')
				->get();
			$date_exercise_name = '日付';
		} else {
			$entry_query = Model_Entry::find('all', array(
				'where' => array(
					array('user_id', Session::get('user_id')),
				),
				'order_by' => array('date' => 'desc'),
			));
			$date_exercise_name = '運動名';
		}

		foreach($entry_query as $entry) {
			$exercise_name = $exercises[$entry->exercise_id]['name'];
			$date_format = date("Y年m月d日", strtotime($entry->date)); 
			$key = '';

			if($id) {
				$key = $exercise_name;
				$date_exercise = $date_format;
			} else {
				$key = $date_format;
				$date_exercise = $exercise_name;
			}

			if (!array_key_exists($key, $entries)) {
				$entries[$key] = array();
			}

			array_push($entries[$key], array(
				'id'=>$entry->id,
				'date_exercise' => $date_exercise,
				'calculation'=>floatval($entry->weight.$exercises[$entry->exercise_id]['unit']).'x'.$entry->frequency.'回',
				'total'=>floatval($entry->total.$exercises[$entry->exercise_id]['unit']),
				'notes'=>$entry->notes,
			));
		}

		return array(
			'entries'=>$entries,
			'exercises'=>$exercises,
			'date_exercise_name'=>$date_exercise_name
		);
	}

	public function view()
	{
		$data = $this->find_entries();
		$this->exercises = $data['exercises'];
		$this->entries = $data['entries'];
		$this->date_exercise_name = $data['date_exercise_name'];
	}

	public function view_exercise() {
		$data = $this->find_entries($this->exercise_id);
		$this->exercises = $data['exercises'];
		$this->entries = $data['entries'];
		$this->date_exercise_name = $data['date_exercise_name'];
	}
}