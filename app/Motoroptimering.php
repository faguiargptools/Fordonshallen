<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Motoroptimering extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'motoroptimering';
    
    protected $fillable = [
          'type',
          'brand',
          'model',
          'engine',
          'fuel',
          'prefx',
          'postfx',
          'prenm',
          'postnm'
    ];
    

    public static function boot()
    {
        parent::boot();

        Motoroptimering::observe(new UserActionsObserver);
    }
    
    
    
    
}