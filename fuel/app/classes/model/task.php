<?php

class Model_Task extends Model
{

  // TOPページ
  public static function select_top()
  {
    // $today = date("Y-m-d H:i:s");
    // var_dump($today);
    $result = DB::select('*')->from('tasks')->where('completion_date', '=', null)->order_by('deadline', 'asc')->execute()->as_array();
    return $result;
  }

  // 一覧（未完了）
  public static function select_yet()
  {
    $result = DB::select('*')->from('tasks')->where('completion_date', '=', null)->order_by('deadline', 'asc')->execute()->as_array();
    return $result;
  }

  // 一覧（完了）
  public static function select_already()
  {
    $result = DB::select('*')->from('tasks')->where('completion_date', '!=', null)->order_by('deadline', 'asc')->execute()->as_array();
    return $result;
  }

  // 詳細
  public static function select($param)
  {
    $result = DB::select('*')->from('tasks')->where('id', '=', $param)->execute()->as_array();
    return $result;
  }

  // 作成
  public static function insert()
  {
    DB::insert('tasks')->set(array(
      'user_id' => Input::post('user_id'),
      'title' => Input::post('title'),
      'content' => Input::post('content'),
      'deadline' => Input::post('deadline'),
    ))->execute();
    return;
  }

  // 編集 (title, content)
  public static function update($param)
  {
    DB::update('tasks')->set(array(
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
    DB::update('tasks')->set(array(
      'deadline' => Input::post('deadline'),
    ))
    ->where('id', '=', $param)
    ->execute();
    return;
  }

  // 編集 (completion_date)
  public static function update_completion_date($param)
  {
    DB::update('tasks')->set(array(
      'completion_date' => Input::post('completion_date'),
    ))
    ->where('id', '=', $param)
    ->execute();
    return;
  }

  // 削除
  public static function delete($param)
  {
    DB::delete('tasks')->where('id', '=', $param)->execute();
    return;
  }









  // TOPページ
  // public static function select_five()
  // {
  //   $result = DB::select('*')->from('minutes')->order_by('created_at', 'desc')->limit(5)->execute()->as_array();
  //   return $result;
  // }


}