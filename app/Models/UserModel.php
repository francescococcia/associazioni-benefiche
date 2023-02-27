<?php 

namespace App\Models;  
use CodeIgniter\Model;

  
class UserModel extends Model{

    protected $table = 'users';
    
    protected $allowedFields = [
        'first_name',
        'last_name',
        'email',
        'password',
        'head_office',
        'tax_code',
        'is_responsible',
        'is_admin',
        'created_at'
    ];

}