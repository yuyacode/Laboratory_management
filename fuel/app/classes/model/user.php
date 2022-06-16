<?php

class Model_User extends Model
{

  // ユーザー情報取得
  public static function select($user_id)
  {
    $result = DB::select('*')
    ->from('users')
    ->where('id', '=', $user_id)
    ->execute()
    ->as_array();
    return $result;
  }


  // 新規登録
  public static function insert()
  {
    $username = Input::post('username');
    $password = Input::post('password');
    $email = Input::post('email');

    DB::insert('users')
    ->set(array(
      'username' => $username,
      'password' => $password,
      'email' => $email,
    ))
    ->execute();

    $result = DB::select('*')
    ->from('users')
    ->where('username', '=', $username)
    ->where('password', '=', $password)
    ->where('email', '=', $email)
    ->execute()
    ->as_array();

    return $result;
  }


  // ログイン
  public static function login()
  {
    $username = Input::post('username');
    $password = Input::post('password');

    $result = DB::select('*')
    ->from('users')
    ->where('username', '=', $username)
    ->where('password', '=', $password)
    ->execute()
    ->as_array();
    return $result;
  }


  // 編集（ユーザー情報更新）
  public static function update($user_id)
  {
    DB::update('users')
    ->set(array(
      'username' => Input::post('username'),
      'password' => Input::post('password'),
      'email' => Input::post('email'),
      'university' => Input::post('university'),
      'faculty' => Input::post('faculty'),
      'department' => Input::post('department'),
      'laboratory' => Input::post('laboratory'),
      'objective' => Input::post('objective'),
    ))
    ->where('id', '=', $user_id)
    ->execute();
    return;
  }


  // 削除（退会処理）
  public static function delete($user_id)
  {
    DB::delete('users')
    ->where('id', '=', $user_id)
    ->execute();
    return;
  }

}