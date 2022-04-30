<?php

class Controller_Minute extends Controller
{

  // 一覧ページ 表示
  public function action_index()
  {
    $data = array();
    $data['minutes_list'] = Model_Minute::select_all();
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
  public function action_insert()
  {
    Model_Minute::insert();
    Response::redirect('minute');
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
    Model_Minute::update($param);
    Response::redirect("minute/show/{$param}");
  }

// 削除
  public function action_delete($param)
  {
    Model_Minute::delete($param);
    Response::redirect('minute');
  }

}
