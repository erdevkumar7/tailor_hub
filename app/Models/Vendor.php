<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Authenticatable
{
    use HasFactory, SoftDeletes;

    protected $table = 'vendors'; // Specify the table name explicitly

    protected $primaryKey = 'vendor_id'; // Set the primary key column

    protected $dates = ['deleted_at']; // Specify 'deleted_at' as a date column
}
