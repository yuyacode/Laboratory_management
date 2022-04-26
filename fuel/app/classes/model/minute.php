<?php

class Model_Minute extends Model
{
  public static function sample_insert()
	{
		DB::insert('minutes')->set(array(
      // 下記はサンプルデータ
			'user_id' => 1,
			'title' => '議事録９タイトル',
			'summary' => '議事録９概要',
			'content' => '議事録９内容',
		))->execute();
	}
}