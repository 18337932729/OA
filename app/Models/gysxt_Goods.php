<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class gysxt_Goods extends Model
{
    protected $table='gysxt_gyssp';

    public function spkfk()
    {
    	return $this->hasOne('App\Models\Spkfk','spid','spid');
    }
}
