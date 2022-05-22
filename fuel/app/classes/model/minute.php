<?php

class Model_Minute extends Model
{

  // TOPページ
  public static function select_five($id)
  {
    $result = DB::select('*')
    ->from('minutes')
    ->where('user_id', '=', $id)
    ->order_by('created_at', 'desc')
    ->limit(5)
    ->execute()
    ->as_array();
    return $result;
  }


  // 一覧
  public static function select_all($id)
  {
    $result = DB::select('*')
    ->from('minutes')
    ->where('user_id', '=', $id)
    ->order_by('created_at', 'desc')
    ->execute()
    ->as_array();
    return $result;
  }


  // 詳細
  public static function select($id)
  {
    $result = DB::select('*')
    ->from('minutes')
    ->where('id', '=', $id)
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
  public static function update($id)
  {
    DB::update('minutes')
    ->set(array(
      'title' => Input::post('title'),
      'summary' => Input::post('summary'),
      'content' => Input::post('content'),
    ))
    ->where('id', '=', $id)
    ->execute();
    return;
  }


  // 削除
  public static function delete($id)
  {
    DB::delete('minutes')
    ->where('id', '=', $id)
    ->execute();
    return;
  }

}