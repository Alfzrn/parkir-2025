<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = ['vehicle_id', 'entry_time', 'exit_time', 'fee', 'method'];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
