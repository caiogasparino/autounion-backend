<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Exceptions\CustomException;
use App\Models\Login;

class LoginController extends Controller
{
  public function login(Request $req)
  {
    $data =  $req->all();
    $loginModel = new Login();
    $userModel = new User();

    $user = $userModel->exist($data['email']);

    if(empty($user)) throw new CustomException('Email não encontrado.', 404);
    if(!$user->active) throw new CustomException('Você ainda precisa ser aprovado pelo administrador.', 500);
    if(!password_verify($data['password'], $user->password)) throw new CustomException('Senha incorreta.', 500);

    $token = $userModel->createToken();
    $loginModel->saveToken($user->id, $token);
    unset($user->password);

    return response()->json(['user' => $user, 'token' => $token]);
  }

  public static function validToken($token)
  {
    $loginModel = new Login();
    $user = $loginModel::validToken($token);

    if(empty($user)) throw new CustomException('É necessario fazer o login.', 500);
  }
}