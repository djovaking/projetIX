<?php

namespace App\controllers;

use App\core\View;
use App\core\SessionManager;
use App\core\ConnectDB;
use App\models\Categorie;
use App\models\User;
use App\models\Page;
use App\models\Recipe;
use App\models\Comment;
use App\models\Ingredient;
use App\models\Media;
use App\models\Reservation;

final class Backoffice
{
    public function index()
    {
        // 
        $sessionManager = SessionManager::getInstance();



        $view = new View("backoffice/home", "back");
        //
    }
    public function manageUsers()
    {

        // Create an instance of the ConnectDB class
        $db = ConnectDB::getInstance();

        // Validate the user data and perform necessary sanitization

        // Get all users from the "fp_user" table
        $users = $db->getAll('fp_user');

        // Pass the user data to the view
        $view = new View("backoffice/users", "back");
        $view->assign('users', $users);
    }
    public function editUser()
    {
        $view = new View("backoffice/editUser", 'back');
    }
    public function updateUser()
    {

        foreach ($_POST as $key => $value) {

            echo $key;
            echo "  ";
            echo $value;
            echo "<br>";
        }

        // Extract the user ID from the form data
        $userId = $_POST['userId'];

        // Check if the user ID is provided
        if (isset($userId)) {
            // Create a new User object
            $user = new User();

            // Set the user object's properties with form data
            $user->setId($userId);
            $user->setFirstname($_POST['firstame']);
            $user->setLastname($_POST['lastname']);
            $user->setEmail($_POST['email']);
            $user->setRole($_POST['role']);

            // Call the save() method to update the user object in the database
            $user->update();

            // Redirect to a success page or display a success message
            header("Location: users");
            exit;
        } else {
            // User ID not provided, handle the error or redirect to a different page
            die("User ID not provided");
        }
    }
    public function deleteuser()
    {
        $userId = $_POST['userId'];

        User::dropFKConstraint('fp_reservation', 'fp_user_id');
        User::deleteDatasInTheFKTable('fp_reservation','fp_user_id',$userId);

        User::dropFKConstraint('fp_page', 'fp_user_id');
        User::deleteDatasInTheFKTable('fp_page','fp_user_id',$userId);

        User::dropFKConstraint('fp_comment', 'fp_user_id');
        User::deleteDatasInTheFKTable('fp_comment','fp_user_id',$userId);

        User::deleteBy('id', $userId);

        User::restoreFKConstraint('fp_reservation','fp_user_id','fp_user_id','fp_user');
        User::restoreFKConstraint('fp_page','fp_user_id','fp_user_id','fp_user');
        User::restoreFKConstraint('fp_comment','fp_user_id','fp_user_id','fp_user');

        // Redirect 
        header("Location: users");
        exit;
    }

    public function managePages()
    {
        // Create an instance of the ConnectDB class
        $db = ConnectDB::getInstance();

        // Get all pages from the "fp_page" table
        $pages = $db->getAll('fp_page');
        // Pass the page data to the view
        $view = new View("backoffice/pages", "back");
        $view->assign('pages', $pages);
    }

    public function editPage()
    {
        $view = new View("backoffice/editPage", 'back');
    }

    public function updatePage()
    {
        foreach ($_POST as $key => $value) {
            echo $key;
            echo "  ";
            echo $value;
            echo "<br>";
        }
        // Extract the page ID from the form data
        $pageId = $_POST['pageId'];
        // Check if the page ID is provided
        if (isset($pageId)) {
            // Create a new Page object
            $page = new Page();
            // Set the page object's properties with form data
            $page->setId($pageId);
            $page->setName($_POST['name']);
            $page->setActive($_POST['active']);
            $page->setIdentifier($_POST['identifier']);
            // Call the update() method to update the page object in the database
            $page->update();
            // Redirect to a success page or display a success message
            header("Location: pages");
            // exit;
        } else {
            // page ID not provided, handle the error or redirect to a different page
            die("Page ID not provided");
        }
    }

    public function deletePage()
    {
        $pageId = $_GET['pageId'];
        Page::deleteBy('id', $pageId);

        // Redirect 
        header("Location: pages");
        exit;
    }

    public function manageRecipes()
    {
        // Create an instance of the ConnectDB class
        $db = ConnectDB::getInstance();

        // Get all recipes from the "fp_recipe" table
        $recipes = $db->getAll('fp_recipe');
        // Pass the recipe data to the view
        $view = new View("backoffice/recipes", "back");
        $view->assign('recipes', $recipes);
    }

    public function editRecipe()
    {
        $view = new View("backoffice/editRecipe", 'back');
    }

    public function updateRecipe()
    {
        foreach ($_POST as $key => $value) {
            echo $key;
            echo "  ";
            echo $value;
            echo "<br>";
        }
        // Extract the recipe ID from the form data
        $recipeId = $_POST['recipeId'];
        // Check if the recipe ID is provided
        if (isset($recipeId)) {
            // Create a new Recipe object
            $recipe = new Recipe();
            // Set the recipe object's properties with form data
            $recipe->setId($recipeId);
            $recipe->setName($_POST['name']);
            $recipe->setTimePreparation($_POST['time_preparation']);
            $recipe->setDifficulty($_POST['difficulty']);
            $recipe->setPreparation($_POST['preparation']);
            // Call the update() method to update the recipe object in the database
            $recipe->update();
            // Redirect to a success page or display a success message
            header("Location: recipes");
            // exit;
        } else {
            // recipe ID not provided, handle the error or redirect to a different page
            die("Recipe ID not provided");
        }
    }

    public function deleteRecipe()
    {
        $recipeId = $_GET['recipeId'];
        Recipe::deleteBy('id', $recipeId);

        // Redirect 
        header("Location: recipes");
        exit;
    }

    public function manageCategories()
    {
        // Create an instance of the ConnectDB class
        $db = ConnectDB::getInstance();

        // Get all categories from the "fp_categorie" table
        $categories = $db->getAll('fp_categorie');
        // Pass the categorie data to the view
        $view = new View("backoffice/categories", "back");
        $view->assign('categories', $categories);
    }

    public function editCategorie()
    {
        $view = new View("backoffice/editCategorie", 'back');
    }

    public function updateCategorie()
    {
        foreach ($_POST as $key => $value) {
            echo $key;
            echo "  ";
            echo $value;
            echo "<br>";
        }
        // Extract the categorie ID from the form data
        $categorieId = $_POST['categorieId'];
        // Check if the categorie ID is provided
        if (isset($categorieId)) {
            // Create a new Categorie object
            $categorie = new Categorie();
            // Set the categorie object's properties with form data
            $categorie->setId($categorieId);
            $categorie->setName($_POST['name']);
            // Call the update() method to update the categorie object in the database
            $categorie->update();
            // Redirect to a success page or display a success message
            header("Location: categories");
            // exit;
        } else {
            // categorie ID not provided, handle the error or redirect to a different page
            die("Categorie ID not provided");
        }
    }

    public function deleteCategorie()
    {
        $categorieId = $_GET['categorieId'];
        Categorie::deleteBy('id', $categorieId);

        // Redirect 
        header("Location: categories");
        exit;
    }

    public function manageComments()
    {
        // Create an instance of the ConnectDB class
        $db = ConnectDB::getInstance();

        // Get all comments from the "fp_comment" table
        $comments = $db->getAll('fp_comment');
        // Pass the comment data to the view
        $view = new View("backoffice/comments", "back");
        $view->assign('comments', $comments);
    }

    public function editComment()
    {
        $view = new View("backoffice/editComment", 'back');
    }

    public function updateComment()
    {
        foreach ($_POST as $key => $value) {
            echo $key;
            echo "  ";
            echo $value;
            echo "<br>";
        }
        // Extract the comment ID from the form data
        $commentId = $_POST['commentId'];
        // Check if the comment ID is provided
        if (isset($commentId)) {
            // Create a new Comment object
            $comment = new Comment();
            // Set the comment object's properties with form data
            $comment->setId($commentId);
            $comment->setText($_POST['text']);
            // Call the update() method to update the comment object in the database
            $comment->update();
            // Redirect to a success page or display a success message
            header("Location: comments");
            // exit;
        } else {
            // comment ID not provided, handle the error or redirect to a different page
            die("Comment ID not provided");
        }
    }

    public function deleteComment()
    {
        $commentId = $_GET['commentId'];
        Comment::deleteBy('id', $commentId);

        // Redirect 
        header("Location: comments");
        exit;
    }

    public function manageIngredients()
    {
        // Create an instance of the ConnectDB class
        $db = ConnectDB::getInstance();

        // Get all ingredients from the "fp_ingredient" table
        $ingredients = $db->getAll('fp_ingredient');
        // Pass the ingredient data to the view
        $view = new View("backoffice/ingredients", "back");
        $view->assign('ingredients', $ingredients);
    }

    public function editIngredient()
    {
        $view = new View("backoffice/editIngredient", 'back');
    }

    public function updateIngredient()
    {
        foreach ($_POST as $key => $value) {
            echo $key;
            echo "  ";
            echo $value;
            echo "<br>";
        }
        // Extract the ingredient ID from the form data
        $ingredientId = $_POST['ingredientId'];
        // Check if the ingredient ID is provided
        if (isset($ingredientId)) {
            // Create a new Ingredient object
            $ingredient = new Ingredient();
            // Set the ingredient object's properties with form data
            $ingredient->setId($ingredientId);
            $ingredient->setName($_POST['name']);
            // Call the update() method to update the ingredient object in the database
            $ingredient->update();
            // Redirect to a success page or display a success message
            header("Location: ingredients");
            // exit;
        } else {
            // ingredient ID not provided, handle the error or redirect to a different page
            die("Ingredient ID not provided");
        }
    }

    public function deleteIngredient()
    {
        $ingredientId = $_GET['ingredientId'];
        Ingredient::deleteBy('id', $ingredientId);

        // Redirect 
        header("Location: ingredients");
        exit;
    }

    public function manageMedias()
     {
        // Create an instance of the ConnectDB class
        $db = ConnectDB::getInstance();

        // Get all medias from the "fp_media" table
        $medias = $db->getAll('fp_media');
        // Pass the media data to the view
        $view = new View("backoffice/medias", "back");
        $view->assign('medias', $medias);
    }

    public function editMedia()
    {
        $view = new View("backoffice/editMedia", 'back');
    }

    public function updateMedia()
    {
        foreach ($_POST as $key => $value) {
            echo $key;
            echo "  ";
            echo $value;
            echo "<br>";
        }
        // Extract the media ID from the form data
        $mediaId = $_POST['mediaId'];
        // Check if the media ID is provided
        if (isset($mediaId)) {
            // Create a new Media object
            $media = new Media();
            // Set the media object's properties with form data
            $media->setId($mediaId);
            $media->setName($_POST['name']);
            $media->setDescription($_POST['description']);
            // Call the update() method to update the media object in the database
            $media->update();
            // Redirect to a success page or display a success message
            header("Location: medias");
            // exit;
        } else {
            // media ID not provided, handle the error or redirect to a different page
            die("Media ID not provided");
        }
    }

    public function deleteMedia()
    {
        $mediaId = $_GET['mediaId'];
        Media::deleteBy('id', $mediaId);

        // Redirect 
        header("Location: medias");
        exit;
    }

    public function manageReservations()
     {
        // Create an instance of the ConnectDB class
        $db = ConnectDB::getInstance();

        // Get all reservations from the "fp_reservation" table
        $reservations = $db->getAll('fp_reservation');
        // Pass the reservation data to the view
        $view = new View("backoffice/reservations", "back");
        $view->assign('reservations', $reservations);
    }

    public function editReservation()
    {
        $view = new View("backoffice/editReservation", 'back');
    }

    public function updateReservation()
    {
        foreach ($_POST as $key => $value) {
            echo $key;
            echo "  ";
            echo $value;
            echo "<br>";
        }
        // Extract the reservation ID from the form data
        $reservationId = $_POST['reservationId'];
        // Check if the reservation ID is provided
        if (isset($reservationId)) {
            // Create a new Reservation object
            $reservation = new Reservation();
            // Set the reservation object's properties with form data
            $reservation->setId($reservationId);
            $reservation->setDate($_POST['date']);
            $reservation->setTime($_POST['time']);
            $reservation->setNbPerson($_POST['nb_person']);
            $reservation->setFirstname($_POST['firstname']);
            $reservation->setLastname($_POST['lastname']);
            $reservation->setPhone($_POST['phone']);
            // Call the update() method to update the reservation object in the database
            $reservation->update();
            // Redirect to a success page or display a success message
            header("Location: reservations");
            // exit;
        } else {
            // reservation ID not provided, handle the error or redirect to a different page
            die("Reservation ID not provided");
        }
    }

    public function deleteReservation()
    {
        $reservationId = $_GET['reservationId'];
        Reservation::deleteBy('id', $reservationId);

        // Redirect 
        header("Location: reservations");
        exit;
    }
}
