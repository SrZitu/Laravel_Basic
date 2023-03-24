<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = "customer"; //laravel k bole dissi table name
    protected $primaryKey = 'id'; //primary key ki seta boltesi

    //mutattor
    //dataa database a dukanor somoy modify kortesi

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucwords($value);
    }
    //accesor
    //data access er somoy change kore disse

    public function getDobAttribute($value)
    {
        return  date("d-M-Y", strtotime($value));
    }
}
