<?php

namespace App\Models;

use CodeIgniter\Model;

class EventModel extends Model
{
  protected $table = 'events';
  protected $primaryKey = 'id';
  protected $allowedFields = [
      'association_id',
      'title',
      'category',
      'description',
      'date',
      'location'
  ];

  public function getEvents()
  {
    return $this->findAll();
  }

  public function getEventById($id)
  {
    return $this->find($id);
  }

  public function insertEvent($data)
  {
    return $this->insert($data);
  }

  public function updateEvent($id, $data)
  {
    return $this->update($id, $data);
  }

  public function deleteEvent($id)
  {
    return $this->delete($id);
  }

  public function getIdParticipant($eventId)
  {
    $builder =
      $this
        ->db
        ->table('participants')
        ->select('participants.id')
        ->where('participants.event_id',$eventId);

    $query = $builder->get();
    $result = $query->getRow();

    return $result;
  }

  public function getAllEventsByPlatformManager($userId) {
    $builder = $this->db->table('events');
    $builder->select('events.*');
    $builder->join('associations', 'events.association_id = associations.id');
    $builder->where('associations.user_id', $userId);
    $query = $builder->get();

    $result = $query->getResultArray();

    if (!empty($result)) {
        return $result;
    } else {
        return []; // Return an empty array if no results are found
    }
  }

  public function getJoinedEventsByUserId($userId)
  {
    $builder = $this->db->table('participants');
    $builder->select('events.*');
    $builder->join('events', 'events.id = participants.event_id');
    $builder->where('participants.user_id', $userId);
    $builder->orderBy('events.date', 'desc');

    return $builder->get()->getResultArray();
  }
}
