<?php

namespace App\Models;

use CodeIgniter\Model;

class FeedbackModel extends Model
{
    protected $table = 'feedbacks';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'user_id',
        'message',
        'created_at',
        'rating',
        'participant_id',
    ];

    public function getAllFeedbacks()
    {
        return $this->findAll();
    }
}
