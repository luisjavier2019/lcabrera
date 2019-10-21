<?php
namespace App\Core\Eloquent;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class Article extends Model
{
    use Sluggable;
    protected $appends=['resource_cover'];
    public function resources(){
    	return $this->hasMany(Resource::class,'article_id','id');
    }
     public function getResourceCoverAttribute(){
      $obj= Resource::where('article_id',$this->id)
                ->first();
      return route('get-image',optional($obj)->name??'default.png') ;
    }
     public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
   protected $fillable = ['name','description','category_id'];
	public function sluggable()
	{
	    return [
	        'slug' => [
	            'source' => 'name'
	        ]
	    ];
	}
	public static function boot()
    {
        static::creating(function ($model) {
         	$model->created_user=1;
         	$model->updated_user=1;
        });
        static::updating(function($model){
        	$model->updated_user=1;
        });
        parent::boot();
    }
}