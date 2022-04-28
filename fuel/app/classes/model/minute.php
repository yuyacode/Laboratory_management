<?php

class Model_Minute extends Model
{

  public static function sample_insert()
	{
    // データ挿入
		DB::insert('minutes')->set(array(
      // 下記はサンプルデータ
			'user_id' => 1,
			'title' => '議事録１１タイトル',
			'summary' => '議事録１１概要',
			'content' => '議事録１１内容',
		))->execute();
	}

  // データ取得
  public static function sample_select()
  {
    $result = DB::select('*')->from('minutes')->execute()->as_array();
    return $result;
  }
}