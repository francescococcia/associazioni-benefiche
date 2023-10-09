<?php

namespace App\Models;

use CodeIgniter\Model;

class ParticipantModel extends Model
{
  protected $table = 'participants';
  protected $primaryKey = 'id';
  protected $allowedFields = ['event_id', 'user_id', 'created_at', 'updated_at', 'deleted_at'];

  public function signUpUserToEvent($eventId, $userId)
  {
    $builder = $this->db->table('participants');

    $data = [
      'event_id' => $eventId,
      'user_id' => $userId
    ];

    $builder->insert($data);

    return $this->db->insertID();
  }
  
  public function signUpUserToEvents()
  {
    $builder = $this->db->table('users');
    $builder->select('users.*,associations.*');
    $builder->join('associations', 'users.id = associations.user_id');
    $builder->where('users.is_platform_manager', true);
    $query = $builder->get();
    return $query->getResultArray();
  }
}
