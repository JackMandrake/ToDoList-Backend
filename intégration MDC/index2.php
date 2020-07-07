<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <title>Todo List</title>
  </head>
  <body>
    <header>
    <nav id="nav_top" class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <a class="navbar-brand ml-auto" href="#">TodoList</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse m-auto" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link border border-primary" href="#">Toutes <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link border border-primary" href="#">Complètes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link border border-primary" href="#">Incomplètes</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle ml-5" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Toutes les catégories
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Courses</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">O'Clock</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Projet Professionnel</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="arch nav-link ml-5" href="#" tabindex="-1" aria-disabled="true">Voir les archives</a>
      </li>
    </ul>
  </div>
</nav>
    </header>


    <main class="container-fluid">
      <article class="list">
        <ul class="list-group"> 
          <!-- padding entre chaque liste ? border top right left mais pas dessous, on met la progress bar -->
          <li class="list-group-item">Acheter du Pain</li>
          <ul class="list_button">
            <li><p>Catégorie</p></li>
            <li><a href="#"><p><span class="far fa-check-square"></span></p></a></li>
            <li><a href="#"><span class="far fa-edit"></span></a></li>
            <li><a href="#"><span class="fas fa-archive"></span></a></li>
          </ul>
          <div class="progress" style="height: 5px;">
            <div class="progress-bar" role="progressbar" style="width: 1%;" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <li class="list-group-item">Réviser les objets en PHP</li>
          <ul class="list_button">
            <li><p>Catégorie</p></li>
            <li><p><span class="far fa-check-square"></span></p></li>
            <li><span class="far fa-edit"></span></li>
            <li><span class="fas fa-archive"></span></li>
          </ul>
          <div class="progress" style="height: 5px;">
            <div class="progress-bar" role="progressbar" style="width: 70%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <li class="list-group-item"><del>Revoir les évènements en JS</del></li>
          <ul class="list_button">
            <li><p>Catégorie</p></li>
            <li><p><span class="far fa-check-square"></span></p></li>
            <li><span class="far fa-edit"></span></li>
            <li><span class="fas fa-archive"></span></li>
          </ul>
          <div class="progress" style="height: 5px;">
            <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <li class="list-group-item">Apprendre à coder</li>
          <ul class="list_button">
            <li><p>Catégorie</p></li>
            <li><p><span class="far fa-check-square"></span></p></li>
            <li><span class="far fa-edit"></span></li>
            <li><span class="fas fa-archive"></span></li>
          </ul>
          <div class="progress" style="height: 5px;">
            <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <li class="list-group-item">Exemple de tâche archivée</li>
          <ul class="list_button">
            <li><p>Catégorie</p></li>
            <li><p><span class="far fa-check-square"></span></p></li>
            <li><span class="far fa-edit"></span></li>
            <li><span class="fas fa-archive"></span></li>
          </ul>
          <div class="progress" style="height: 5px;">
            <div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </ul>
      </article>
      
    
      <form id="form_add" class="border border-info row m-auto form-inline ">
        
        <div class="form-group m-auto col-6">
          <label for=""></label>
          <input type="email" class="form-control col-12" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nom de la tâche">
          <small id="emailHelp" class="form-text text-muted"></small>
        </div>
        <div class="form-group col-4 m-auto">
          <label for="categorySelect" class="text-left"></label>
          <select class="form-control col-12" id="categorySelect">
            <option>Choisir une catégorie</option>
            <option>Courses</option>
            <option>O'Clock</option>
            <option>Projet Professionel</option>
          </select>
        </div>
        <button  type="submit" class="button col-1 btn btn-primary mx-auto ">+ Ajouter</button>
      </form>
    









    </main>

    <footer>

    </footer>
    










    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>