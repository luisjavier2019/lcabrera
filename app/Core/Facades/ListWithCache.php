<?php
namespace App\Core\Facades;
use Cache;
use App\Core\Eloquent\Article;
class ListWithCache{
	public function getListArticlesByServices(){
		return Cache::remember('articles',600,function(){
				return Article::with(['category'])->get();
		});
		/*
			Cache::get('key',default);
			Cache::put('key','value');
		    Cache::forget('key');
		*/
	}
}