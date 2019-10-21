<?php

namespace App\Core\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
	protected $fillable=['name','vpath','article_id'];
     public function article(){
    	return $this->belongsTo(Article::class,'article_id','id');
    }
    public function assign($uploadedFiles){
    	$arrResources=[];
    	foreach ($uploadedFiles as $key => $file) {
			$nameFile='IMG'.uniqid().'.'.$file->getClientOriginalExtension();
			
			saveFile($nameFile,$file);

    		$arrResources[]=new Resource([
    			'name'=>$nameFile,
    			'vpath'=>'/photos-articles/'
    		]);
    	}
    	return $arrResources;
    }
}