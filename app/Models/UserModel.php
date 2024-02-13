<?php
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model {
    public $table = 'users';
    public $primaryKey = 'user_id';
    public $allowedFields = [ 'user_name', 'user_email', 'user_password' ];
}

?>