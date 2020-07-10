<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;

class CategoryController  extends Controller {

    /**
     * HTTP Method : GET
     * URL : /categories
     */
    public function list() {
        $categoriesList = [
            1 => [
              'id' => 1,
              'name' => 'Chemin vers O\'clock',
              'status' => 1
            ],
            2 => [
              'id' => 2,
              'name' => 'Courses',
              'status' => 1
            ],
            3 => [
              'id' => 3,
              'name' => 'O\'clock',
              'status' => 1
            ],
            4 => [
              'id' => 4,
              'name' => 'Titre Professionnel',
              'status' => 1
            ]
        ];

        // On renvoie le tableau des catégories en JSON
        return response()->json($categoriesList);
    }

    /**
     * HTTP Method : GET
     * URL : /categories/{id}
     */
    public function item($id) {

        $categoriesList = [
            1 => [
              'id' => 1,
              'name' => 'Chemin vers O\'clock',
              'status' => 1
            ],
            2 => [
              'id' => 2,
              'name' => 'Courses',
              'status' => 1
            ],
            3 => [
              'id' => 3,
              'name' => 'O\'clock',
              'status' => 1
            ],
            4 => [
              'id' => 4,
              'name' => 'Titre Professionnel',
              'status' => 1
            ]
        ];

        // Avant de récupérer la catégorie pour l'id fourni
        // on peut vérifier que cette id existe comme clé du tableau
        if (array_key_exists($id, $categoriesList)) {
            // On récupère la catégorie à retourner
            $categoryToReturn = $categoriesList[$id];
            // On retourne la réponse au format JSON
            return response()->json($categoryToReturn);

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
