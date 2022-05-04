<?php

class Controller_Index extends Controller
{

  // TOPページ
  public function action_index()
  {
    $data = array();
    $data['minutes_list'] = Model_Minute::select_five();
    $data['tasks'] = Model_Task::select_top();
    return View::forge('index', $data);
  }
}