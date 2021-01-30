<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use Searchable;

    protected $table = 'products';

    public $asYouType = true;

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        $array = $this->toArray();

        // Customize array...

        return $array;
    }

    public function category()
    {
    	return $this->belongsTo('App\Category', 'category_id');
    }

    public function company()
    {
        return $this->belongsTo('App\Company', 'company_id');
    }

    public function modes()
    {
        return $this->belongsToMany('App\Mode', 'product_mode', 'product_id', 'mode_id');
    }

    public function options()
    {
        return $this->belongsToMany('App\Option', 'product_option', 'product_id', 'option_id');
    }

    public function orders()
    {
        return $this->belongsToMany('App\Order', 'product_order', 'product_id', 'order_id');
    }

    public function comments()
    {
        return $this->morphMany('App\Comment', 'parent');
    }
}
