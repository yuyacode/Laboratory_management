<?php

class Controller_Index extends Controller
{

  // TOPページ
  public function action_index($id)
  {
    $data = array();
    $data['minutes_list'] = Model_Minute::select_five($id);
    $data['tasks'] = Model_Task::select_top($id);
    return View::forge('index', $data);
  }
}