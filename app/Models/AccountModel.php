<?php namespace App\Models;

use CodeIgniter\Model;

class AccountModel extends Model{

    protected $table = 'accounts';
    protected $allowedFields = ['id', 'userId', 'balance', 'created_at', 'startingBalance'];


    protected function beforeInsert(array $data)
    {
        
    }

    protected function beforeUpdate(array $data)
    {
        
    }

}