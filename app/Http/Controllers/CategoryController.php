<?php

namespace App\Http\Controllers;

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
}
