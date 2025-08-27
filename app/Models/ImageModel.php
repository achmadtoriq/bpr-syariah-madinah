<?php

namespace App\Models;

use CodeIgniter\Model;

class ImageModel extends Model
{
    protected $table = 'images';
    protected $primaryKey = 'id';
    protected $allowedFields = ['description', 'image_url', 'created_at'];
    public $timestamps = false;
}
