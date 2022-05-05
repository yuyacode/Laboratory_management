<?php

class Model_Minute extends Model
{

  // TOPページ
  public static function select_five()
  {
    $result = DB::select('*')
    ->from('minutes')
    ->order_by('created_at', 'desc')
    ->limit(5)
    ->execute()
    ->as_array();
    return $result;
  }

  // 一覧
  public static function select_all()
  {
    $result = DB::select('*')
    ->from('minutes')
    ->order_by('created_at', 'desc')
    ->execute()
    ->as_array();
    return $result;
  }

  // 詳細
  public static function select($param)
  {
    $result = DB::select('*')
    ->from('minutes')
    ->where('id', '=', $param)
    ->execute()
    ->as_array();
    return $result;
  }

  // 作成
  public static function insert()
  {
    DB::insert('minutes')
    ->set(array(
      'user_id' => Input::post('user_id'),
      'title' => Input::post('title'),
      'summary' => Input::post('summary'),
      'content' => Input::post('content'),
    ))
    ->execute();
    return;
  }

  // 編集
  public static function update($param)
  {
    DB::update('minutes')
    ->set(array(
      'title' => Input::post('title'),
      'summary' => Input::post('summary'),
      'content' => Input::post('content'),
    ))
    ->where('id', '=', $param)
    ->execute();
    return;
  }

  // 削除
  public static function delete($param)
  {
    DB::delete('minutes')
    ->where('id', '=', $param)
    ->execute();
    return;
  }

}