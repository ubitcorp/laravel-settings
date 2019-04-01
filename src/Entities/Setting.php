<?php

namespace ubitcorp\Settings\Entities;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $guarded = ["id"]; 

    public function __construct(array $attributes = [])
    {
        $this->table = config('settings.model'); 
        parent::__construct($attributes);
    }    

    public function model(){
        return $this->morphTo();
    }
}
