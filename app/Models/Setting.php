<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
  protected $fillable = ['name','email','phone','address','from_day','to_day','from_time','to_time','facebook','twitter','instagram','skype','linkedin'];
}
