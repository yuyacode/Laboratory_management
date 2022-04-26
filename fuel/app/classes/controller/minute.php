<?php

class Controller_Minute extends Controller
{

	// 議事録一覧ページへのアクセス
	public function action_index()
	{
		echo '議事録一覧ページ';
	}

	// DBにデータを挿入する際のサンプルコード
	public function action_insert()
	{
		Model_Minute::sample_insert();
		return Response::forge(View::forge('minutes/show'));
	}

	// DBからデータを取得する際のサンプルコード
	public function action_select()
	{
		$result = DB::select('*')->from('minutes')->where('id', '>=', '6')->order_by('id', 'desc')->execute()->as_array();
		echo '<pre>';
		print_r($result);
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
