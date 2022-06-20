<?php

class Model_Minute extends Model
{

  // 議事録の取得（TOPページ、一覧、詳細）
  public static function select($id = null, $user_id = null, $limit = null)
  {

    $query = DB::select('*')->from('minutes');

    if (!empty($id)) :
      $query->where('id', '=', $id);
    endif;

    if (!empty($user_id)) :
      $query->where('user_id', '=', $user_id)->order_by('created_at', 'desc');
    endif;

    if (!empty($limit)) :
      $query->limit($limit);
    endif;

    $result = $query->execute()->as_array();

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