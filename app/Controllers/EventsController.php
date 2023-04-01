<?php

namespace App\Controllers;

use App\Models\EventModel;
use App\Models\UserModel;
use CodeIgniter\Controller;

class EventsController extends Controller
{
    public function index()
    {
        $model = new EventModel();
        $data['events'] = $model->getEvents();
        $userId = session()->get('id'); // get the ID of the currently logged-in user from the session
        // Load the user model
        $user_model = new UserModel();
        // Get the user record with the association relationship
        $user = $user_model->with('association')->find($user_id);

        // Get the association ID from the user record
        $association_id = $user->association->id;
        $data['session'] = $association_id;
        return view('events/index', $data);
    }

    public function new()
    {
        helper(['form']);
        echo view('events/new');
    }
    
    public function create()
    {
        // helper('form');
        $data = [];
        $session = session();

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'title' => 'required|min_length[3]|max_length[255]',
                'description' => 'required',
                // 'date' => 'required',
                // 'time' => 'required'
            ];

            if ($this->validate($rules)) {
                $model = new EventModel();
                // $associationModel = new AssociationModel();

                $data = [
                    'association_id' => session('id'),
                    'title' => $this->request->getPost('title'),
                    'description' => $this->request->getPost('description'),
                    'date' => $this->request->getPost('date'),
                    'location' => $this->request->getPost('location'),
                ];

                $model->save($data);
                $session->setFlashdata('message', 'Event created successfully!');
                return redirect()->to('/events');
            } else {
                $data['validation'] = $this->validator;
            }
        }
        $data = $session->get();
        $session->setFlashdata('msg', 'Errors.');
    //   return redirect()->to('/events/new');
        return view('events/new', $data);
    }

    // public function create()
    // {
        // $data = [];

        // if ($this->request->getMethod() == 'post') {
        //     $rules = [
        //         'title' => 'required|min_length[3]|max_length[255]',
        //         'description' => 'required',
        //         'start_date' => 'required|valid_date',
        //         'end_date' => 'required|valid_date'
        //     ];

        //     if ($this->validate($rules)) {
        //         $model = new EventModel();

        //         $model->save([
        //             'title' => $this->request->getVar('title'),
        //             'description' => $this->request->getVar('description'),
        //             'start_date' => $this->request->getVar('start_date'),
        //             'end_date' => $this->request->getVar('end_date')
        //         ]);

        //         return redirect()->to('/events');
        //     } else {
        //         $data['validation'] = $this->validator;
        //     }
        // }

    //     return view('events/createe', $data);
    // }

    public function view($id = null)
    {
        $model = new EventModel();
        $data['event'] = $model->getEventById($id);

        if (empty($data['event']))
        {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the event item: ' . $id);
        }

        return view('events/view', $data);
    }

    // public function create()
    // {
    //     $model = new EventModel();

    //     if ($this->request->getMethod() === 'post' && $this->validate([
    //         'association_id' => 'required',
    //         'title' => 'required|min_length[5]|max_length[255]',
    //         'description' => 'required',
    //         'date' => 'required|valid_date',
    //         'location' => 'required|min_length[5]|max_length[255]'
    //     ]))
    //     {
    //         $model->insertEvent([
    //             'association_id' => $this->request->getPost('association_id'),
    //             'title' => $this->request->getPost('title'),
    //             'description' => $this->request->getPost('description'),
    //             'date' => $this->request->getPost('date'),
    //             'location' => $this->request->getPost('location')
    //         ]);

    //         return redirect()->to('/events');
    //     }

    //     return view('events/createe');
    // }

    public function edit($id)
{
    $event = Event::find($id);

    if (!$event) {
        return redirect()->back()->with('error', 'Event not found.');
    }

    return view('events.edit', compact('event'));
}
}
