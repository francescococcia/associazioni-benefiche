<?php

namespace App\Controllers;

use App\Models\FeedbackModel;

class FeedbacksController extends BaseController
{
  public function create()
  {
    $participantId = $_GET['participant_id'];
    $data['participantId'] = $participantId;
    return view('feedbacks/index',  $data);
  }

  public function store($participantId)
  {
    // Create a new instance of the FeedbackModel
    $feedbackModel = new FeedbackModel();
    $userId = session()->get('id');
    // $participantId = $_GET['participant_id'];

    // Prepare the data to be inserted
    $data = [
      'user_id' => $userId,
      'rating' => $this->request->getPost('rating'),
      'message' => $this->request->getPost('message'),
      'participant_id' => $participantId,
      'created_at' => date('Y-m-d H:i:s')
  ];

    // Insert the data into the database
    $feedbackModel->insert($data);
    $session = session();
    $session->setFlashdata('success', 'Feedback inviato.');

    // Redirect back to the current page
    return redirect()->back();
  }
}
