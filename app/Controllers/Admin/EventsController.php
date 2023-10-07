<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\EventModel;
use App\Models\ParticipantModel;

class EventsController extends BaseController
{
  public function index()
  {
    $eventModel = new EventModel();
    $data['events'] = $eventModel->findAll();

    return view('admin/events/index', $data);
  }

  public function delete($eventId)
  {
    // Create instances of the EventModel and ParticipantModel
    $eventModel = new EventModel();
    $participantModel = new ParticipantModel();

    // Find the event by its ID
    $event = $eventModel->find($eventId);

    // Check if the event exists
    if (!$event) {
        // Event not found, redirect or show an error message
        return redirect()->back()->with('error', 'Evento non trovato.');
    }

    // Delete the associated participants
    $participantModel->where('event_id', $eventId)->delete();

    // Delete the event
    $eventModel->delete($eventId);

    // Redirect or show a success message
    return redirect()->back()->with('success', 'Evento cancellato.');
  }
}
