<?php

namespace App;
 use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //protected $table = ‘tasks’;
    public static function alltask(){
    	DB::enableQueryLog();
			DB::table('tasks')->where('status', 1)->where('priority', 0)->get();
		dd(DB::getQueryLog()); 
    }
}
