<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Band extends Model
{
    protected $table = 'bands';
    
    protected $fillable = ['name','website','start_date','still_active'];
    
    protected $with = ['albums'];
    
    public $timestamps = ['start_date'];
    
    public function albums() {
      return $this->hasMany(Album::class);
	}
}
