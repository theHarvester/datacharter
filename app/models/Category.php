<?php

// class Category extends Eloquent {
// 	protected $guarded = array();

// 	public static $rules = array();
// }

 
use LaravelBook\Ardent\Ardent;
 
class Category extends Ardent {
 
    /**
     * Table
     */
    protected $table = 'categories';
 
    /**
     * Ardent validation rules
     */
    public static $rules = array(
        'name' => 'required|alpha_dash',              // Post tittle
        'label' => 'required|alpha_dash',    // Post Url
        'user_id' => 'required|numeric'  // Author id
    );
 
    /**
     * Array used by FactoryMuff to create Test objects
     */
    public static $factory = array(
        'name' => 'string',
        'label' => 'string',
        'user_id' => 'factory|User' // Will be the id of an existent User.
    );
 
    /**
     * Belongs to user
     */
    public function author()
    {
        return $this->belongsTo('User', 'user_id');
    }
 
    /**
     * Get formatted post date
     *
     * @return string
     */
    public function postedAt()
    {
        $date_obj =  $this->created_at;
 
        if (is_string($this->created_at))
            $date_obj =  DateTime::createFromFormat('Y-m-d H:i:s', $date_obj);
 
        return $date_obj->format('d/m/Y');
    }
}