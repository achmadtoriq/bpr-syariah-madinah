<?php

namespace App\Models;

use CodeIgniter\Model;

class EmailAttachmentModel extends Model
{
    protected $table            = 'email_attachments';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'email_id',
        'filename',
        'saved_name',
        'file_size',
        'mime_type',
        'created_at'
    ];

    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
}
