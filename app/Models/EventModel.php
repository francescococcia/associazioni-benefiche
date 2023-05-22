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
}
