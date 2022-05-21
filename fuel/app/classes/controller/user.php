<?php

class Controller_User extends Controller
{

  // マイページ 表示
  public function action_index($id)
  {
    $data['user_info_list'] = Model_User::select1($id);
    return View::forge('users/index', $data);
  }


  // 新規登録ページ 表示
  public function action_create_page()
  {
    return View::forge('users/create');
  }


  // 新規登録
  public function action_create_user()
  {
    $data = array();
    $data['user_info_list'] = Model_User::insert();
    return View::forge('users/index', $data);
  }


  // ログインページ 表示
  public function action_login_page()
  {
    return View::forge('users/login');
  }


  // ログイン
  public function action_login()
  {
    $data = array();
    $data['user_info_list'] = Model_User::select();
    if (empty($data['user_info_list'])) {
      $data['error'] = 'ログインに失敗しました。';
      return View::forge('users/login', $data);
    } else {
      return View::forge('users/index', $data);
    }
  }


  // 編集ページ 表示
  public function action_edit_page($id)
  {
    $data['user_info_list'] = Model_User::select1($id);
    return View::forge('users/edit', $data);
  }


  // 編集
  public function action_edit($id)
  {
    Model_User::update($id);
    Response::redirect("/user/index/{$id}");
  }


  // 削除（退会処理）
  public function action_delete($id)
  {
    Model_User::delete($id);
    return View::forge('users/create');
  }

}
