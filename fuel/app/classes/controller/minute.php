<?php

class Controller_Minute extends Controller
{

  // 一覧ページ 表示
  public function action_index($id)
  {
    $data = array();
    $data['minutes_list'] = Model_Minute::select_all($id);
    return View::forge('minutes/index', $data);
  }


  // 詳細ページ 表示
  public function action_show($param = null)
  {
    $data = array();
    $data['minutes_list'] = Model_Minute::select($param);
    return View::forge('minutes/show', $data);
  }


  // 作成ページ 表示
  public function action_create()
  {
    return View::forge('minutes/create');
  }


  // 作成
  public function action_insert($id)
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
      Response::redirect("minute/index/{$id}");
    } else {
      foreach ($val->error() as $value) {
        echo $value->get_message();
        echo '<br>';
      }
    }
  }


  // 編集ページ 表示
  public function action_edit($param = null)
  {
    $data = array();
    $data['minutes_list'] = Model_Minute::select($param);
    return View::forge('minutes/edit', $data);
  }


  // 編集
  public function action_update($param)
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
      Model_Minute::update($param);
      Response::redirect("minute/show/{$param}");
    } else {
      foreach ($val->error() as $value) {
        echo $value->get_message();
        echo '<br>';
      }
    }
  }


  // 削除
  public function action_delete($param1, $param2)
  {
    Model_Minute::delete($param1);
    Response::redirect("minute/index/$param2");
  }

}
