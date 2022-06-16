<?php

use Fuel\Core\Validation;

class Controller_User extends Controller
{

  // マイページ 表示
  public function action_index($user_id)
  {
    $data['user_info_list'] = Model_User::select($user_id);
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
    $val = Validation::forge();

    $val->add('username', 'ユーザー名')
    ->add_rule('required')
    ->add_rule('max_length', 15);

    $val->add('password', 'パスワード')
    ->add_rule('required')
    ->add_rule('min_length', 8)
    ->add_rule('max_length', 16);

    $val->add('email', 'メールアドレス')
    ->add_rule('required')
    ->add_rule('valid_email');

    if ($val->run()) {
      $data = array();
      $data['user_info_list'] = Model_User::insert();
      return View::forge('users/index', $data);
    } else {
      foreach ($val->error() as $value) {
        echo $value->get_message();
        echo '<br>';
      }
    }
  }


  // ログインページ 表示
  public function action_login_page()
  {
    return View::forge('users/login');
  }


  // ログイン
  public function action_login()
  {
    $val = Validation::forge();

    $val->add('username', 'ユーザー名')
    ->add_rule('required')
    ->add_rule('max_length', 15);

    $val->add('password', 'パスワード')
    ->add_rule('required')
    ->add_rule('min_length', 8)
    ->add_rule('max_length', 16);

    if ($val->run()) {
      $data = array();
      $data['user_info_list'] = Model_User::login();
      if (empty($data['user_info_list'])) {
        $data['error'] = 'ログインに失敗しました。';
        return View::forge('users/login', $data);
      } else {
        return View::forge('users/index', $data);
      }
    } else {
      foreach ($val->error() as $value) {
        echo $value->get_message();
        echo '<br>';
      }
    }
  }


  // 編集ページ 表示
  public function action_edit_page($user_id)
  {
    $data['user_info_list'] = Model_User::select($user_id);
    $data['header'] = View::forge('header');
    return View::forge('users/edit', $data);
  }


  // 編集
  public function action_edit($user_id)
  {
    $val = Validation::forge();

    $val->add('username', 'ユーザー名')
    ->add_rule('required')
    ->add_rule('max_length', 15);

    $val->add('password', 'パスワード')
    ->add_rule('required')
    ->add_rule('min_length', 8)
    ->add_rule('max_length', 16);

    $val->add('email', 'メールアドレス')
    ->add_rule('required')
    ->add_rule('valid_email');

    $val->add('university', '大学')
    ->add_rule('max_length', 20);

    $val->add('faculty', '学部')
    ->add_rule('max_length', 20);

    $val->add('department', '学科')
    ->add_rule('max_length', 20);

    $val->add('laboratory', '研究室')
    ->add_rule('max_length', 20);

    $val->add('objective', '目標')
    ->add_rule('max_length', 255);

    if ($val->run()) {
      Model_User::update($user_id);
      Response::redirect("/user/index/{$user_id}");
    } else {
      foreach ($val->error() as $value) {
        echo $value->get_message();
        echo '<br>';
      }
    }
  }


  // 削除（退会処理）
  public function action_delete($user_id)
  {
    Model_User::delete($user_id);
    return View::forge('users/create');
  }

}