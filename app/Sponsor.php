<?php

namespace CareCats;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    public function animals(){
        # With timetsamps() will ensure the pivot table has its created_at/updated_at fields automatically maintained
        return $this->belongsToMany('\CareCats\Animal')->withTimestamps();;
    }
}
