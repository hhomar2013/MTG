<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class daily_ticket extends Model
{
    use HasFactory;
    use softdeletes;

    protected $guarded =[];

    public function get_customer()
    {
        return $this->belongsTo(customers::class,'customer_id');
    }



}
