<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Models\Task;

class TaskController extends Controller {

    /**
     * HTTP Method : GET
     * URL : /categories
     */
    public function list() {

        $tasksList = Task::all();
        // dump($categoriesList);

        // On renvoie le tableau des catégories en JSON
        // avec un code de retour HTTP à 200
        return $this->sendJsonResponse($tasksList, 200);
    }

    /**
     * HTTP Method : GET
     * URL : /categories/{id}
     */
    public function item($id) {

        $tasksList = [
/*
id;title;completion;status;created_at;updated_at;category_id
1;Passer les tests du chemin vers O'clock;100;2;2020-07-10 11:26:49;;1
2;Contacter Pole Emploi;100;2;2020-07-10 11:26:49;;1
3;Acheter du pain;0;1;2020-07-10 11:26:49;;2
4;Survivre à la première saison;100;1;2020-07-10 11:26:49;;3
5;Maitriser les bases de la programmation informatique;100;1;2020-07-10 11:26:49;;3
6;Rédiger mes dossiers de Titre Professionnel;0;1;2020-07-10 11:26:49;;4
7;Présenter mon projet au jury bienveillant;0;1;2020-07-10 11:26:49;;4
8;Mon premier MCD;100;1;2020-07-10 11:26:49;;3
*/
            1 => [
                'id' => 1,
                'title' => 'Passer les tests du chemin vers O\'clock',
                'completion' => 100,
                'status' => 2,
                'category_id' => 1
            ],
            2 => [
                'id' => 2,
                'title' => 'Contacter Pole Emploi',
                'completion' => 100,
                'status' => 2,
                'category_id' => 1
            ],
            3 => [
                'id' => 3,
                'title' => 'Acheter du pain',
                'completion' => 0,
                'status' => 1,
                'category_id' => 2
            ],
            4 => [
                'id' => 4,
                'title' => 'Survivre à la première saison',
                'completion' => 100,
                'status' => 1,
                'category_id' => 3
            ],
            5 => [
                'id' => 5,
                'title' => 'Maitriser les bases de la programmation informatique',
                'completion' => 100,
                'status' => 1,
                'category_id' => 3
            ],
            6 => [
                'id' => 6,
                'title' => 'Rédiger mes dossiers de Titre Professionnel',
                'completion' => 0,
                'status' => 1,
                'category_id' => 4
            ],
            7 => [
                'id' => 7,
                'title' => 'Présenter mon projet au jury bienveillant',
                'completion' => 0,
                'status' => 1,
                'category_id' => 4
            ],
            8 => [
                'id' => 8,
                'title' => 'Mon premier MCD',
                'completion' => 100,
                'status' => 1,
                'category_id' => 3
            ],
        ];

        // Avant de récupérer la catégorie pour l'id fourni
        // on peut vérifier que cette id existe comme clé du tableau
        if (array_key_exists($id, $tasksList)) {
            // On récupère la catégorie à retourner
            $taskToReturn = $tasksList[$id];
            // On retourne la réponse au format JSON
            return response()->json($taskToReturn);

        }
        // Sinon, c'est que l'id ne correspond à aucune catégorie
        else {
            // On pourrait rediriger vers l'accueil
            // return redirect()->route('main-home');
            // Ou rediriger vers la catégorie n°1
            // return redirect()->route('category-item', ['id' => 1]);

            // Mais le mieux dans ce cas, c'est de générer une 404
            Log::info('Erreur 404 pour afficher la catégorie '.$id);
            abort(404);
        }
    }
}
