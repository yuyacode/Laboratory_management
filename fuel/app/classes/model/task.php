<?php

class Model_Task extends Model
{

  // TOPページ
  public static function select_top()
  {
    $now = date("Y-m-d H:i:s");
    $one_week_later = date('Y-m-d H:i:s', strtotime('1week'));

    $result = DB::select('*')
    ->from('tasks')
    ->where('completion_date', '=', null)
    ->where('deadline', '>=', $now)
    ->where('deadline', '<=', $one_week_later)
    ->order_by('deadline', 'asc')
    ->execute()
    ->as_array();
    return $result;
  }

  // 一覧（未完了）
  public static function select_yet()
  {
    $now = date("Y-m-d H:i:s");

    $result = DB::select('*')
    ->from('tasks')
    ->where('completion_date', '=', null)
    ->where('deadline', '>=', $now)
    ->order_by('deadline', 'asc')
    ->execute()
    ->as_array();
    return $result;
  }

  // 一覧（完了）
  public static function select_already()
  {
    $now = date("Y-m-d H:i:s");

    $result = DB::select('*')
    ->from('tasks')
    ->where('completion_date', '!=', null)
    ->where('deadline', '>=', $now)
    ->order_by('deadline', 'asc')
    ->execute()
    ->as_array();
    return $result;
  }

  // 詳細
  public static function select($param)
  {
    $result = DB::select('*')
    ->from('tasks')
    ->where('id', '=', $param)
    ->execute()
    ->as_array();
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

  // 編集 (title, content)
  public static function update($param)
  {
    DB::update('tasks')
    ->set(array(
      'title' => Input::post('title'),
      'content' => Input::post('content'),
    ))
    ->where('id', '=', $param)
    ->execute();
    return;
  }

  // 編集 (deadline)
  public static function update_deadline($param)
  {
    DB::update('tasks')
    ->set(array(
      'deadline' => Input::post('deadline'),
    ))
    ->where('id', '=', $param)
    ->execute();
    return;
  }

  // 編集 (completion_date)
  public static function update_completion_date($param)
  {
    DB::update('tasks')
    ->set(array(
      'completion_date' => Input::post('completion_date'),
    ))
    ->where('id', '=', $param)
    ->execute();
    return;
  }

  // 削除
  public static function delete($param)
  {
    DB::delete('tasks')
    ->where('id', '=', $param)
    ->execute();
    return;
  }

}