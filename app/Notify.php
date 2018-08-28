<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notify extends Model
{
    protected $guarded = ['id'];
    
    public function scopeCreateNotify ($query, $data)
    {
        $notify = Notify::create($data);
        
        return $notify;
    }
}
