<?php

namespace App\controllers;

use App\core\View;
use App\core\SessionManager;
use App\core\ConnectDB;
use App\models\User;
use App\models\Page;
use App\models\Recipe;

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
}
