<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class AdblueText extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'adbluetext';
    
    protected $fillable = ['text'];
    

    public static function boot()
    {
        parent::boot();

        AdblueText::observe(new UserActionsObserver);
    }
    
    
    
    
}