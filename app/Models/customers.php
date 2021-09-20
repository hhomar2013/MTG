<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class customers extends Model
{
    use HasFactory;
    use softdeletes;

    protected $guarded = [];

    public function get_college()
    {
        return $this->belongsTo(college::class,'c_id');
    }

    public function get_area()
    {
        return $this->belongsTo(area::class,'id_e');
    }

    public function get_price_list()
    {
        return $this->belongsTo(price_list::class,'ticket_type');
    }
}
