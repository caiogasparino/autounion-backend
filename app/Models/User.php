<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User extends Model
{
    protected $table;
    private String $chars = '0123456789abcdefghijklmnopqrstuvxwyzABCDEFGHIJKLMNOPQRSTUVXWYZ!@#$%&';

    public function get()
    {
        return DB::table('users')
            ->leftJoin('documents AS dc', 'users.id', '=', 'dc.user_id')
            ->select('users.id', 'dc.path', 'users.name', 'users.email')
            ->where(['active' => 0])
            ->get();
    }

    public function createToken(): String
    {
        return substr(str_shuffle($this->chars), 0, 100);
    }

    public function exist(String $email)
    {
        return DB::table('users')->where(['email' => $email])->first();
    }

    public function create(String $name, String $email, String $password)
    {
        return DB::table('users')->insertGetId(['name' => $name, 'email' => $email, 'password' => $password]);
    }

    public function createHash(String $password): String
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public function inactivate($id)
    {
        DB::table('users')->where('id', $id)->delete();
    }
}
