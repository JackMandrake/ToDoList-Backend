<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Task;
use Symfony\Component\HttpFoundation\Response;

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

    /**
     * HTTP Method : POST
     * URL : /tasks
     */
    public function add(Request $request) {
        // dump($request);

        /* Voici le JSON transmis dans le corps de la requête TEST d'Insomnia
        {
            "title": "Mettre en place l'API TodoList",
            "categoryId": 3,
            "completion": 0,
            "status": 1
        }
        */

        // On commence par récupérer les données envoyées en POST
        // On s'assure que l'on reçoit au moins le titre et l'id de la catégorie
        // car ces 2 infos sont indispensables pour créer une tâche
        // completion et status sont facultatives car elles ont chacune une valeur
        // par défaut
        // https://lumen.laravel.com/docs/7.x/requests#retrieving-input
        // Pour le nom des données que l'on récupère, celui-ci provient de la doc
        // sur les endpoints de l'API => c'est nous qui l'avons choisi
        if ($request->has(['title','categoryId'])) {
            $title = $request->input('title'); // 'title' est le nom du champ envoyé dans le JSON
            $categoryId = $request->input('categoryId'); // 'categoryId' est le nom du champ envoyé dans le JSON

            // Création d'un nouvel objet de la classe Task
            $newTask = new Task();

            // On définit les valeurs des propriétés de cette nouvelle tâche
            $newTask->title = $title;
            // $newTask->category_id = $categoryId;

            // Comme completion et status ont des valeurs par défaut dans la base
            // pas besoin de préciser ces 2 informations au moment de la création
            // $newTask->completion = 0;
            // $newTask->status = 1;
            // Si plus tard, on veut faire en sorte de pouvoir ajouter une tâche
            // avec une completion différente ou un statut différent, alors il
            // faudra récupérer ces 2 informations avec $request->filter_input
            // et les assigner à la nouvelle tâche

            // Sauvegarder l'objet tâche dans la BDD
            $isInserted = $newTask->save();

            // Si l'ajout a fonctionné
            if ($isInserted) {
                // alors retourner un code de réponse HTTP 201 "Created" (aide plus bas)
                // return $this->sendJsonResponse($newTask, 201);
                return $this->sendJsonResponse($newTask, Response::HTTP_CREATED);
            } else {
                // alors retourner un code de réponse HTTP 500 "Internal Server Error"
                abort(500);
            }
        } else {
            // Si on n'a pas envoyé les informations nécessaires pour la création
            // d'une tâche
            // alors retiyrner un code de réponse HTTP 400 "Bad request"
            // https://restfulapi.net/http-status-codes/
            // abort(400);
            abort(Response::HTTP_BAD_REQUEST);
        }
    }
 /**
     * HTTP Method : PUT
     * URL : /tasks/{id}
     */
    public function update(Request $request, $id) {
        // L'id de la tâche à mettre à jour est extrait de l'url et fourni
        // directement (par Lumen) en paramètre de la méthode
        // dump($id);
        // dump($request);

        // On récupère la tâche à partir de son id
        // https://laravel.com/docs/7.x/eloquent#retrieving-single-models
        // On aurait pu utiliser find et traiter le cas où ne trouve pas le modèle
        // mais on peut aussi utiliser findOrFail puisque si le modèle n'est pas trouvé
        // on nous demande de générer une 404, c'est exactement ce que fait findOrFail
        // attention potentiellement, la ligne ci-dessous peut générer une 404
        $task = Task::findOrFail($id);

        if ($request->has(['title', 'categoryId', 'completion', 'status'])) {
            // Si les 4 informations sont présentes
            // on peut mettre à jour l'objet Task
            $task->title = $request->input('title');
            $task->category_id = $request->input('categoryId');
            $task->completion = $request->input('completion');
            $task->status = $request->input('status');

            // On valide les modifications dans la BDD
            $isUpdated = $task->save();

            // Si la modification a fonctionné
            if ($isUpdated) {
                // alors retourner un code de réponse HTTP 200 "OK" (aide plus bas)
                return $this->sendEmptyResponse();
                // on aurait pu également retourner un code HTTP 204 (méthode PUT qui ne retourne aucune réponse)
                // return $this->sendEmptyResponse(204);
                // return $this->sendEmptyResponse(Response::HTTP_NO_CONTENT);
            } else {
                // alors retourner un code de réponse HTTP 500 "Internal Server Error"
                abort(500);
            }
        } else {
            // Si on n'a pas envoyé les informations nécessaires pour la mise
            // à jour de la tâche
            // alors retourner un code de réponse HTTP 400 "Bad request"
            // https://restfulapi.net/http-status-codes/
            // abort(400);
            abort(Response::HTTP_BAD_REQUEST);
        }
    }
}
