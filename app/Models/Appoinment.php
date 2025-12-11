<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appoinment extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function depart(){
        return $this->belongsTo(Department::class,'depart_id','id');
    }

    public function doctor(){
        return $this->belongsTo(Doctor::class,'doctor_id','id');
    }

}
