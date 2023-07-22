<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AssociationsSeeder extends Seeder
{
    public function run()
    {
      $data = [
        [
          'name' => "Famiglia d'Africa",
          'legal_address' => 'Bari',
          'tax_code' => 'cdsafasdfa',
          'user_id' => 1,
          'description' => "Famiglia d'Africa aiuta i bambini bisognosi dalla primissima infanzia fino all'età adulta. Li supporta sopperendo alla mancanza di risorse parentali o familiari. Non gode al momento di sponsorizzazioni pubbliche, ma si basa totalmente su aiuti e fondi privati. Il cuore della missione è l'Uganda, in modo particolare Kampala.",
          'image' => 'ug_classe_bambini_1.jpg',
        ],
      ];

      $this->db->table('associations')->insertBatch($data);
    }
}
