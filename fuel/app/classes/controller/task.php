<?php

use Fuel\Core\Validation;

class Controller_Task extends Controller
{

  // 一覧ページ 表示（未完了）
  public function action_index_yet($id)
  {
    $data = array();
    $data['tasks'] = Model_Task::select_yet($id);
    $data['status'] = '未完了';
    return View::forge('tasks/index', $data);
  }


  // 一覧ページ 表示（完了）
  public function action_index_already($id)
  {
    $data = array();
    $data['tasks'] = Model_Task::select_already($id);
    $data['status'] = '完了';
    return View::forge('tasks/index', $data);
  }


  // 詳細ページ 表示
  public function action_show($id)
  {
    $data = array();
    $data['tasks'] = Model_Task::select($id);
    return View::forge('tasks/show', $data);
  }


  // 作成ページ 表示
  public function action_create()
  {
    return View::forge('tasks/create');
  }


  // 作成
  public function action_insert($id)
  {
    $val = Validation::forge();

    $val->add('title', '課題名')
    ->add_rule('required')
    ->add_rule('max_length', 50);

    $val->add('content', '課題内容')
    ->add_rule('required');

    $val->add('deadline', '提出日')
    ->add_rule('required');

    if ($val->run()) {
      Model_Task::insert();
      Response::redirect("task/index_yet/{$id}");
    } else {
      foreach ($val->error() as $value) {
        echo $value->get_message();
        echo '<br>';
      }
    }
  }


  // 編集ページ 表示 (title, content)
  public function action_edit($id)
  {
    $data = array();
    $data['tasks'] = Model_Task::select($id);
    return View::forge('tasks/edit', $data);
  }


  // 編集 (title, content)
  public function action_update($id)
  {
    $val = Validation::forge();

    $val->add('title', '課題名')
    ->add_rule('required')
    ->add_rule('max_length', 50);

    $val->add('content', '課題内容')
    ->add_rule('required');

    if ($val->run()) {
      Model_Task::update($id);
      Response::redirect("task/show/{$id}");
    } else {
      foreach ($val->error() as $value) {
        echo $value->get_message();
        echo '<br>';
      }
    }
  }


  // 編集 (deadline)
  public function action_update_deadline($id)
  {
    $val = Validation::forge();

    $val->add('deadline', '提出日')
    ->add_rule('required');

    if ($val->run()) {
      Model_Task::update_deadline($id);
      Response::redirect("task/show/{$id}");
    } else {
      foreach ($val->error() as $value) {
        echo $value->get_message();
        echo '<br>';
      }
    }
  }


  // 編集 (completion_date)
  public function action_update_completion_date($id)
  {
    $val = Validation::forge();

    $val->add('completion_date', '完了日')
    ->add_rule('required');

    if ($val->run()) {
    Model_Task::update_completion_date($id);
    Response::redirect("task/show/{$id}");
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
    Model_Task::delete($id);
    Response::redirect("/task/index_yet/{$user_id}");
  }

}