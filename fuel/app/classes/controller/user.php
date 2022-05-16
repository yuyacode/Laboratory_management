<?php

class Controller_User extends Controller
{

  // マイページ 表示
  public function action_index($id)
  {
    $data['user_info_list'] = Model_User::select1($id);
    return View::forge('users/index', $data);
  }


  // ログインページ 表示
  public function action_login_page()
  {
    return View::forge('users/login');
  }


  // ログイン処理
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


  // 編集処理
  public function action_edit($id)
  {
    Model_User::update($id);
    Response::redirect("/user/index/{$id}");
  }









  // 編集パスワード
  // public function action_edit($username)
  // {
  //   $data['username'] = $username;
  //   return View::forge('users/authentication', $data);
  // }



  // 新規登録ページ 表示
  // public function action_create()
  // {
  //   return View::forge('users/create');
  // }








  // 編集 認証
  // public function action_authentication($username)
  // {
  //   $data = array();
  //   $data['username'] = $username;
  //   $data['user_info_list'] = Model_User::select();
  //   if (empty($data['user_info_list'])) {
  //     $data['error'] = '認証に失敗しました。';
  //     return View::forge('users/authentication', $data);
  //   } else {
  //     return View::forge('users/edit', $data);
  //   }
  // }


  // 編集
  // public function action_update($id)
  // {
  //   Model_User::update($id);
  //   Response::redirect("/user/login");
  // }

  // public function action_auth()
  // {
  //   Session::set('id', '6');
  // }

  // public function action_auth2()
  // {
  //   Session::get('id');
  // }

}
