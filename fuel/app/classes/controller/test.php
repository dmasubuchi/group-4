<?php

class Controller_Test extends Controller_Rest {
	
	public function get_read() {
		$id = null;
		$resttest = null;
		if (Input::get('id')){
			$id = Input::get('id');
			$resttest = Model_Resttest::find($id);
		}
		
		$data = array(
			'id' => $id,
			'resttest' => $resttest,
		);
		
		$this->response($data);
	} 
	
	public function get_save(){
		
		//Insert
		// http://192/168.33.10/test/save?title=[title]&body=[body]
		
		//Update
		// http://192/168.33.10/test/save?id=[ID]&title=[title]&body=[body]
		
		$data = array();
		
		$title = null;
		$body = null;
		
		// title, body
		if(Input::get()){
			$title = Input::get('title');
			$body = Input::get('body');
		}
		
		
		
		
		$resttest = Model_Resttest::forge();
		
		if(Input::get('id')){
			$resttest = Model_Resttest::find(Input::get('id'));
		}
		
		$resttest->title = $title;
		$resttest->body = $body;
		
		if($resttest->save()){
			$data['result'] = 'success';
			$data['resttest'] = $resttest;
		} else {
			$data['result'] = 'failed';
		}
		
		$this->response($data);
	}
}