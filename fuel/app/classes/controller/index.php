<?php

class Controller_Index extends Controller
{

  // TOPページ
  public function action_index($user_id)
  {
    $data = array();
    $data['minutes_list'] = Model_Minute::select($id = null, $user_id, 5);
    $data['tasks'] = Model_Task::select_top($user_id);
    $data['session'] = View::forge('session');
    $data['head'] = View::forge('head');
    return View::forge('index', $data);
  }

}