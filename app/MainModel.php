<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MainModel extends Model
{
    /**
    *	получить шаблоны документов
    */
    public static function getDocumentTpl($id){
    	$doc = DB::table('docs')->where('id',$id)->first();
    	//$doc = DB::table('docs')->find($id,['form_template','name']);
    	return $doc;
    }

    /**
    * получение списка всех документов
	*/
    public static function getAllTpl(){
    	$doc = DB::table('docs')->get();

    	return $doc;
    }
    /*
    *	получить документ пользователя
    */
    public function getUserDocument(){

    }
}
