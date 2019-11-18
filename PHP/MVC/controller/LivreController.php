<?php

class LivreController extends Controller {

    public function index(){

        /**
         * du code...
         */
        $livres = [
            ['id'=>1, 'nom'=>'Nom du livre'],
            ['id'=>2, 'nom'=>'Nom du livre 2'],
            ['id'=>3, 'nom'=>'Nom du livre 3'],
        ];

        $this->set(['livres'=>$livres]);
        $this->render('display_livres');

    }

    public function detail(){

        $livres_detail = [
            ['
                id'=>1,
                'nom'=>'Nom du livre',
                'description' => 'Livre sur les animaux',
                'type' => 'roman'

            ],
            ['
                id'=>2,
                'nom'=>'Nom du livre 2',
                'description' => 'Livre sur l\'environnement',
                'type' => 'étude'

            ],
            ['
                id'=>3,
                'nom'=>'Nom du livre 3',
                'description' => 'Livre sur les pays',
                'type' => 'roman'

            ],
        ];

        if (isset($_GET['id_livre'])){
            $id_livre = ($_GET['id_livre']);
            $this->set(['livre_detail'=> $livres_detail[$id_livre-1]]);
        }

        $this->render('detail_livre');

    }

}