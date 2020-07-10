<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
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

    public function create(Request $request) {

        /* $validatedData = $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required',
        ]); */
        
        // Récupération des données envoyés en POST
        // $title = $request->input('title');
        // $categoryId = $request->input('category_id');

        // Nouvel Objet pour la classe Task
        $newTask = new Task;

         // Modifier les propriétés de cet objet
        $newTask->title = $request->title;
        $newTask->category_id = $request->categoryId;

        $newTask->save();



        //return response()->json(['title' => $title], ['categories' => $categoryId]);

        /* if ($validatedData) { */
            // Si l'ajout à fonctionner HTTP201
            if ($newTask->save()) {
                // On récupère la catégorie à retourner
                $taskToCreate = $newTask;
                // On retourne la réponse au format JSON
                return response()->json($taskToCreate);
            }
            // Sinon HTTP500
            else {
                // On pourrait rediriger vers l'accueil
                // return redirect()->route('main-home');
                // Ou rediriger vers la catégorie n°1
                // return redirect()->route('category-item', ['id' => 1]);

                // Mais le mieux dans ce cas, c'est de générer une 404
                Log::info('Erreur 500 pour create la task : ');
                abort(404);
            }
       // }
    }


}
