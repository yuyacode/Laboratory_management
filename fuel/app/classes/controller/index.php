<?php

class Controller_Index extends Controller
{

  // TOPページ
  public function action_index($user_id)
  {
    $id = null;
    $limit = 5;
    $progress = 'incomplete';
    $page = 'top';

    $data = array();
    $data['minutes_list'] = Model_Minute::select($id, $user_id, $limit);
    $data['tasks'] = Model_Task::select($id, $user_id, $progress, $page);
    $data['session'] = View::forge('session');
    $data['head'] = View::forge('head');
    return View::forge('index', $data);
  }

}