let app = {
    
    init: function() {
        console.log('Méthode init');

        // On ajoute nos écouteurs d'évènements sur nos tâches
        app.bindTasksEvents();
    },

    // Méthode chargée d'ajouter les écouteurs d'évènements sur toutes les tâches
    bindTasksEvents: function () {
        // On doit d'abord récupérer l'ensemble des tâches
        // https://developer.mozilla.org/fr/docs/Web/API/Document/querySelectorAll
        let existingTasks = document.querySelectorAll('.tasks .task');

        // On parcourt ensuite les tâches une par une
        for (let i = 0; i < existingTasks.length ; i++) {
            app.bindSingleTaskEvents(existingTasks[i]);
        }
    },

    // Méthode chargée d'ajouter les écouteurs d'évènements sur une tâche à la fois
    bindSingleTaskEvents: function(singleTaskElement) {
        // On cible le titre de la tâche
        let taskTitleElement = singleTaskElement.querySelector('.task__name-display');

        // Puis on ajoute l'écouteur d'évènement sur le clic
        // console.log('taskTitleElement : ',taskTitleElement);
        taskTitleElement.addEventListener('click',app.handleClickOnTaskTitle);

        // On ajoute l'écouteur d'évènement sur le champ input contenant le titre
        let taskInputElement = singleTaskElement.querySelector('.task__name-edit');

        // Puis on ajoute l'écouteur d'évènement sur la perte de focus (blur)
        taskInputElement.addEventListener('blur',app.handleTaskTitle);
        // Et on ajoute également l'écouteur d'évènement sur la validation avec la touche Entrée
        taskInputElement.addEventListener('keydown',app.handleTaskTitleEnterKey);
    },

    handleTaskTitleEnterKey: function(evt) {
        console.log('Je suis dans handleTaskTitleEnterKey');

        // On s'assure qu'on a bien tapé sur la touche Entrée
        if (evt.key == 'Enter') {
            // Je valide la modification du titre de la tâche
            // mais pas directement ici, j'utilise plutôt l'appel de handleTaskTitle
            // et je lui transmets l'event
            // console.log(evt.key);
            app.handleTaskTitle(evt);
        }
    },

    handleTaskTitle: function(evt) {
        console.log('Je suis dans handleTaskTitle');

        // On récupère l'élément input à l'origine de l'évènement
        let taskInputElement = evt.currentTarget;

        // On récupère la valeur de l'input
        let taskTitleValue = taskInputElement.value;

        // On cache l'input et on réaffiche le titre
        let taskElement = taskInputElement.closest('.task');
        taskElement.classList.remove('task--edit');

        // On récupère l'élément contenant le titre (balise <p>)
        // https://developer.mozilla.org/en-US/docs/Web/API/NonDocumentTypeChildNode/previousElementSibling
        let taskTitleElement = taskInputElement.previousElementSibling;
        // On modifie le contenu de la balise <p>
        taskTitleElement.textContent = taskTitleValue;
    },

    handleClickOnTaskTitle: function(evt) {
        console.log('Je suis dans handleClickOnTaskTitle');
        // On récupère l'élément à l'origine de l'évènement (click)
        let taskTitleElement = evt.currentTarget;

        console.log(evt);
        console.log(taskTitleElement);

        // On récupère l'élément tâche à partir de taskTitleElement
        // https://developer.mozilla.org/fr/docs/Web/API/Element/closest
        let taskElement = taskTitleElement.closest('.task');
        // La classe task--edit a un impact sur l'affichage d'une tâche
        // L'ajout de la classe task--edit permet de cacher l'élément <p>
        // contenant le titre de la tâche et d'afficher à la place l'élément input
        // permettant de modifier le titre de la tâche
        taskElement.classList.add('task--edit');

        // Bonus n°1 : ajout du focus pour être directement dans le champ d'édition
        let taskInputElement = taskElement.querySelector('.task__name-edit');
        // https://developer.mozilla.org/fr/docs/Web/API/HTMLElement/focus
        taskInputElement.focus();
    }
};

document.addEventListener('DOMContentLoaded',app.init);