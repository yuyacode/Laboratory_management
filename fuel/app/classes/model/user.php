<?php

class Model_User extends Model
{

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


  //
  public static function select()
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


  //
  public static function select1($id)
  {
    $result = DB::select('*')
    ->from('users')
    ->where('id', '=', $id)
    ->execute()
    ->as_array();
    return $result;
  }


  //
  public static function update($id)
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
    ->where('id', '=', $id)
    ->execute();
    return;
  }

}