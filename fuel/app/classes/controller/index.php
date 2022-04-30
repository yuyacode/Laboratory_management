<?php

class Controller_Index extends Controller
{
  public function action_index()
  {
    $data = array();
    $data['minutes_list'] = Model_Minute::select_five();
    return View::forge('index', $data);
  }
}