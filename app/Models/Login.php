<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Login extends Model
{
  public function saveToken(Int $id, String $token)
  {
    return DB::table('users')->where('id', $id)->update(['token' => $token]);
  }

  public static function validToken(String $token)
  {
    return DB::table('users')->select('id', 'email', 'name')->where([['active' => 1], ['token' => $token]])->first();
  }
}