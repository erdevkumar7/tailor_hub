<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalogue extends Model
{
    use HasFactory;

    protected $table = 'catalogue';
    protected $primaryKey = 'id';


    public function Category()
{

    return $this->belongsTo(Category::class, 'category_id', 'category_id');
}

public function vendor()
{
    return $this->belongsTo(Vendor::class, 'vendor_id', 'vendor_id');
}

}
