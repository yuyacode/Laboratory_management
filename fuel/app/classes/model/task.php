<?php

class Model_Task extends Model
{

  // 課題の取得 (TOPページ, 一覧(未完了, 完了), 詳細)
  public static function select($id = null, $user_id = null, $progress = null, $page = null)
  {
    $now = date("Y-m-d H:i:s");
    $one_week_later = date('Y-m-d H:i:s', strtotime('1week'));

    $query = DB::select('*')->from('tasks');

    if (!empty($id)) :
      $query->where('id', '=', $id);
    endif;

    if (!empty($user_id)) :
      $query->where('user_id', '=', $user_id)->where('deadline', '>=', $now);

      if ($progress == 'incomplete') :
        $query->where('completion_date', '=', null);

        if ($page == 'top') :
          $query->where('deadline', '<=', $one_week_later);
        endif;

      endif;

      if ($progress == 'completion') :
        $query->where('completion_date', '!=', null);
      endif;

      $query->order_by('deadline', 'asc');

    endif;

    $result = $query->execute()->as_array();

    return $result;
  }


  // 作成
  public static function insert()
  {
    DB::insert('tasks')
    ->set(array(
      'user_id' => Input::post('user_id'),
      'title' => Input::post('title'),
      'content' => Input::post('content'),
      'deadline' => Input::post('deadline'),
    ))
    ->execute();
    return;
  }


  // 編集
  public static function update($id, $item)
  {
    if ($item == 'title,content') :
      $array = array(
        'title' => Input::post('title'),
        'content' => Input::post('content'),
      );
    endif;

    if ($item == 'deadline') :
      $array = array(
        'deadline' => Input::post('deadline'),
      );
    endif;

    if ($item == 'completion_date') :
      $array = array(
        'completion_date' => Input::post('completion_date'),
      );
    endif;

    DB::update('tasks')
      ->set($array)
      ->where('id', '=', $id)
      ->execute();

    return;
  }


  // 削除
  public static function delete($id)
  {
    DB::delete('tasks')
    ->where('id', '=', $id)
    ->execute();
    return;
  }

}