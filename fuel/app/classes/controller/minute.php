<?php

class Controller_Minute extends Controller
{

	// データ取得
	public function action_index()
	{
		$data = array();
		$data['rows'] = Model_Minute::sample_select();
		return View::forge('minutes/index', $data);
	}

	// データ挿入
	public function action_insert()
	{
		Model_Minute::sample_insert();
		return Response::forge(View::forge('minutes/show'));
	}

	// DBのデータを更新する際のサンプルコード
	public function action_update()
	{
		// 1つのカラムのデータを変更する場合
		DB::update('minutes')->value('summary', '議事録７概要')->where('id', '=', '7')->execute();

		// 複数のカラムのデータを変更する場合
		DB::update('minutes')
		->set(array(
			'title' => '議事録７タイトル',
			'summary' => '議事録７概要',
			'content' => '議事録７内容',
		))
		->where('id', '=', '7')
		->execute();
	}

	// DBのデータを削除する際のサンプルコード
	public function action_delete()
	{
		DB::delete('minutes')->where('id', '=', '1')->execute();
	}

}
