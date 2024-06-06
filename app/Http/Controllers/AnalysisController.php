<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Analysis;
use App\Exceptions\CustomException;

class AnalysisController extends Controller
{

  public function get()
  {
    $userModel = new User();
    return $userModel->get();
  }

  public function approve($id)
  {
    $model = new Analysis();
    return $model->approve($id);
  }

  public function reject($id)
  {
    $model = new Analysis();
    return $model->reject($id);
  }
}