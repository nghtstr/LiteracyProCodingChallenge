<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table = 'albums';
  
    protected $fillable = ['name','number_of_tracks','label','producer','genre','recorded_date','release_date'];
  
  	public $timestamps = ['recorded_date', 'release_date'];
    
    public function band() {
      return $this->belongsTo(Band::class);
	}
}
