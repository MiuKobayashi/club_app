<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $dates = [
        'start_date',
        'end_date'
    ];
    
    public function desires()
    {
        return $this->hasMany(Desire::class);
    }
    
    public function getPaginateByLimit(int $limit_count = 3)
    {
        return $this->orderBy('created_at', 'DESC')->paginate($limit_count);
    }

    
}
