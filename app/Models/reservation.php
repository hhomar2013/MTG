<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class reservation extends Model
{
    use HasFactory;
    use softdeletes;

    protected $guarded =[];

    public function get_customer()
    {
        return $this->belongsTo(customers::class,'c_id');
    }
    public function get_price_list()
    {
        return $this->belongsTo(price_list::class,'p_id');
    }

}
