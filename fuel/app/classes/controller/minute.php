<?php
/**
 * Fuel is a fast, lightweight, community driven PHP 5.4+ framework.
 *
 * @package    Fuel
 * @version    1.8.2
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2019 Fuel Development Team
 * @link       https://fuelphp.com
 */

/**
 * The Welcome Controller.
 *
 * A basic controller example.  Has examples of how to set the
 * response body and status.
 *
 * @package  app
 * @extends  Controller
 */

class Controller_Minute extends Controller
{
	/**
	 * The basic welcome message
	 *
	 * @access  public
	 * @return  Response
	 */

	public function action_index()
	{
		echo '議事録一覧ページ';
	}

	// DBにデータを挿入する際のサンプルコード
	public function action_insert()
	{
		DB::insert('minutes')->set(array(
			'user_id' => 1,
			'title' => '議事録７',
			'summary' => '議事録７の概要です。',
			'content' => '議事録７の内容・コンテンツです。',
		))->execute();
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
