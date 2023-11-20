<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\TeamModel;

class TeamController extends BaseController
{
  public function index()
  {
    $teamModel = new TeamModel();
    $data['teams'] = $teamModel->findAll();

    return view('admin/team/index', $data);
  }

  public function update()
  {
      $session = session();
      $teamModel = new teamModel();
      $teamId = $this->request->getVar('team_id');
      $team = $teamModel->find($teamId);
  
      if (!$team) {
          return redirect()->to('/chi-siamo')->with('error', 'Team non trovato');
      }
  
      $data = [
          'description' => $this->request->getVar('description'),
          'description_mission' => $this->request->getVar('description_mission'),
      ];
  
      $image = $this->request->getFile('image');
  
      if ($image && $image->isValid()) {
          $config = [
              'upload_path' => './uploads/',
              'allowed_types' => 'gif|jpg|jpeg|png',
              'max_size' => 2048,
              'encrypt_name' => true,
          ];
  
          if ($image->move($config['upload_path'])) {
              $imagePath = $image->getName();
              $data['image'] = $imagePath;
          } else {
              $error = $image->getErrorString();
              return redirect()->back()->with('error', 'Errore nel caricamento dell\'immagine: ' . $error);
          }
      }
  
      $teamModel->update($teamId, $data);
      $session->setFlashdata('success', 'Informazioni aggiornate.');
      return redirect()->to('/chi-siamo');
  }
  
}
