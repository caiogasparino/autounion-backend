<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Exceptions\CustomException;

class UserController extends Controller
{
  public function inactivate($id)
  {
    $model = new User();
    if ($id != 1) $model->inactivate($id);
  }

  public function create(Request $req)
  {
    $model = new User();
    $data = $req->all();
    $user = $model->exist($data['email']);

    if (!empty($user)) throw new CustomException('Usuário já existe.', 500);

    $hashPassword = $model->createHash($data['password']);

    return $model->create($data['name'], $data['email'], $hashPassword);
  }
}
