<?php

namespace App\Models;

use CodeIgniter\Model;

class InboxEmailModel extends Model
{
    protected $table            = 'inbox_emails';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'msg_uid',
        'message_id',
        'sender_name',
        'sender_email',
        'subject',
        'body_text',
        'body_html',
        'has_attachments',
        'is_read',
        'received_at',
        'created_at',
        'updated_at'
    ];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
