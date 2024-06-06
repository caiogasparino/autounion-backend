<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class File extends Model
{
  public function create($path, $id)
  {
    return DB::table('documents')->insertGetId(['user_id' => $id, 'path' => $path]);
  }

  public function reject($id): Void
  {
    DB::table('documents')->where('id', $id)->delete();
  }
}