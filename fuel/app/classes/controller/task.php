<?php

class Controller_Task extends Controller
{

  // 一覧ページ 表示（未完了）
  public function action_index_yet()
  {
    $data = array();
    $data['tasks'] = Model_Task::select_yet();
    $data['status'] = '未完了';
    return View::forge('tasks/index', $data);
  }

  // 一覧ページ 表示（完了）
  public function action_index_already()
  {
    $data = array();
    $data['tasks'] = Model_Task::select_already();
    $data['status'] = '完了';
    return View::forge('tasks/index', $data);
  }

  // 詳細ページ 表示
  public function action_show($param = null)
  {
    $data = array();
    $data['tasks'] = Model_Task::select($param);
    return View::forge('tasks/show', $data);
  }

  // 作成ページ 表示
  public function action_create()
  {
    return View::forge('tasks/create');
  }

  // 作成
  public function action_insert()
  {
    Model_Task::insert();
    Response::redirect('task/index_yet');
  }

  // 編集ページ 表示 (title, content)
  public function action_edit($param = null)
  {
    $data = array();
    $data['tasks'] = Model_Task::select($param);
    return View::forge('tasks/edit', $data);
  }

  // 編集 (title, content)
  public function action_update($param)
  {
    Model_Task::update($param);
    Response::redirect("task/show/{$param}");
  }

  // 編集 (deadline)
  public function action_update_deadline($param)
  {
    Model_Task::update_deadline($param);
    Response::redirect("task/show/{$param}");
  }

  // 編集 (completion_date)
  public function action_update_completion_date($param)
  {
    Model_Task::update_completion_date($param);
    Response::redirect("task/show/{$param}");
  }

  // 削除
  public function action_delete($param)
  {
    Model_Task::delete($param);
    Response::redirect('/task/index_yet');
  }

}
