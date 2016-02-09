<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Produkter extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'produkter';
    
    protected $fillable = [
          'name',
          'short_desc',
          'long_desc',
          'article_number',
          'type',
          'price',
          'variation'
    ];
    

    public static function boot()
    {
        parent::boot();

        Produkter::observe(new UserActionsObserver);
    }
    
    
    
    
}