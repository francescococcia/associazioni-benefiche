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
        [
          'name' => "Ciao Vinny",
          'legal_address' => 'Bari',
          'tax_code' => 'cdsafasdfa',
          'user_id' => 2,
          'description' => "La Fondazione Ciao Vinny è impegnata dal 2002 nella sensibilizzazione sul tema della sicurezza stradale in tutta la regione, con particolare riferimento per alcune attività alla Provincia di Bari, dove ha sede.
          La Fondazione è nata in memoria di Vincenzo Moretti, che perse la vita in un incidente stradale.",
          'image' => 'CIAOVINNY-slide-2022.jpg',
        ],
        [
          'name' => "LILT",
          'legal_address' => 'Bari',
          'tax_code' => 'cdsafasdfa',
          'user_id' => 3,
          'description' => "LILT di Bari nasce con il compito di informare e divulgare la cultura della prevenzione, per far aumentare la consapevolezza che è la vera arma vincente per sconfiggere il cancro. Scopo principale è la sensibilizzazione alla prevenzione della malattia oncologica attraverso corretti stili di vita (prevenzione primaria) e diagnosi precoce (prevenzione secondaria).",
          'image' => 'image-AMBULATORI.jpg',
        ],
        [
          'name' => "Retake",
          'legal_address' => 'Foggia',
          'tax_code' => 'cdsafasdfa',
          'user_id' => 4,
          'description' => "Retake Bari è impegnata nella lotta contro il degrado, nella valorizzazione dei beni pubblici e nella diffusione del senso civico sul territorio. È un movimento spontaneo di cittadini, no-profit e apartitico, che promuove la qualità, la vivibilità e la cura della città, mediante un insieme di eventi di mobilitazione civica, progetti educativi e partenariati pubblico-privati.",
          'image' => 'dcm_logo-retake.svg',
        ],
        [
          'name' => "Seconda mamma",
          'legal_address' => 'Lecce',
          'tax_code' => 'cdsafasdfa',
          'user_id' => 5,
          'description' => "Seconda Mamma è nata per rispondere ai bisogni sempre più pressanti del territorio barese che vede molte famiglie con minori che versano in una condizione di disagio economico e/o sociale.
          Opera tramite supporto psico-sociologico alle famiglie, bambini e persone in difficoltà; incontri socio-culturali; organizzazione di eventi benefici e tanto altro.",
          'image' => 'boy-1300136_1280-min.png',
        ],
      ];

      $this->db->table('associations')->insertBatch($data);
    }
}
