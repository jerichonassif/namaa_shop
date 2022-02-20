<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded=[];
    /**
     * @var string
     */
    private $image;
    private $title;
    private $description;
    private $Stock;
}
