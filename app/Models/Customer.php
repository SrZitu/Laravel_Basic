<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table="customer"; //laravel k bole dissi table name
    protected $primary_key="customer_id "; //primary key ki seta boltesi
}
