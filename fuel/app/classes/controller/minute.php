<?php

use Fuel\Core\Validation;

class Controller_Minute extends Controller
{

  // 一覧ページ 表示
  public function action_index($user_id)
  {
    $data = array();
    $data['minutes_list'] = Model_Minute::select($id = null, $user_id, $limit = null);
    return View::forge('minutes/index', $data);
  }


  // 詳細ページ 表示
  public function action_show($id)
  {
    $data = array();
    $data['minutes_list'] = Model_Minute::select($id, $user_id = null, $limit = null);
    return View::forge('minutes/show', $data);
  }


  // 作成ページ 表示
  public function action_create()
  {
    return View::forge('minutes/create');
  }


  // 作成
  public function action_insert($user_id)
  {
    $val = Validation::forge();

    $val->add('title', 'タイトル')
    ->add_rule('required')
    ->add_rule('max_length', 50);

    $val->add('summary', '概要')
    ->add_rule('required')
    ->add_rule('max_length', 255);

    $val->add('content', '内容')
    ->add_rule('required');

    if ($val->run()) {
      Model_Minute::insert();
      Response::redirect("minute/index/{$user_id}");
    } else {
      foreach ($val->error() as $value) {
        echo $value->get_message();
        echo '<br>';
      }
    }
  }


  // 編集ページ 表示
  public function action_edit($id)
  {
    $data = array();
    $data['minutes_list'] = Model_Minute::select($id);
    return View::forge('minutes/edit', $data);
  }


  // 編集
  public function action_update($id)
  {
    $val = Validation::forge();

    $val->add('title', 'タイトル')
    ->add_rule('required')
    ->add_rule('max_length', 50);

    $val->add('summary', '概要')
    ->add_rule('required')
    ->add_rule('max_length', 255);

    $val->add('content', '内容')
    ->add_rule('required');

    if ($val->run()) {
      Model_Minute::update($id);
      Response::redirect("minute/show/{$id}");
    } else {
      foreach ($val->error() as $value) {
        echo $value->get_message();
        echo '<br>';
      }
    }
  }


  // 削除
  public function action_delete($id, $user_id)
  {
    Model_Minute::delete($id);
    Response::redirect("minute/index/$user_id");
  }

}