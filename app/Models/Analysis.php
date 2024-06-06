<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Analysis extends Model
{
  public function approve($id): Void
  {
    DB::table('users')->where('id', $id)->update(['active' => 1]);
  }

  public function reject($id): Void
  {
    DB::table('users')->where('id', $id)->delete();
  }
}