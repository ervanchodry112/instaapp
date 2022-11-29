<?php

namespace App\Models;

use CodeIgniter\Model;

class LikeModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'likes';
    protected $primaryKey       = 'id_like';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_post', 'id_user', 'tanggal'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}
