<?php

class Model_Minute extends Model
{

  // 議事録の取得（TOPページ、一覧、詳細）
  public static function select($id = null, $user_id = null, $limit = null)
  {

    // TOPページ
    if (isset($limit)) {

      $result = DB::select('*')
      ->from('minutes')
      ->where('user_id', '=', $user_id)
      ->order_by('created_at', 'desc')
      ->limit($limit)
      ->execute()
      ->as_array();

      // 一覧
    } elseif (isset($user_id) && empty($limit)) {

      $result = DB::select('*')
      ->from('minutes')
      ->where('user_id', '=', $user_id)
      ->order_by('created_at', 'desc')
      ->execute()
      ->as_array();

      // 詳細
    } elseif (isset($id)) {

      $result = DB::select('*')
      ->from('minutes')
      ->where('id', '=', $id)
      ->execute()
      ->as_array();

    }
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