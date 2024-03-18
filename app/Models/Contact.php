<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'tb_contact';
    protected $primaryKey = 'contact_id';
    protected $fillable = ['firstname', 'lastname', 'email', 'phone'];
}
