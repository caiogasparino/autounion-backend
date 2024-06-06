<?php

namespace App\Http\Controllers;

use App\Exceptions\CustomException;
use Illuminate\Http\Request;
use App\Models\File;

class FileController extends Controller
{

  public function save(Request $request, $id)
  {
    $model = new File();
    $path = $request->file('image')->store('public');
    $model->create($path, $id);
    return $path;
  }

  public function delete($user)
  {

  }
}