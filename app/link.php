<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class link extends Model
{
  protected $table = 'links';
  protected $fillable = [
      'key', 'url'
  ];
}
