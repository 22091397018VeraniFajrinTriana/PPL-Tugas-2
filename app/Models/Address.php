<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $table = 'tb_address';
    protected $primaryKey = 'address_id';
    protected $fillable = ['street', 'city', 'province', 'country', 'postal_code'];
}
