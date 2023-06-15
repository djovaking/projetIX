<?php
namespace App\core;
class View{

    private $view;
    private $template;
    private $data = [];

    public function __construct(String $view, String $template = "back")
    {
        $this->setView($view);
        $this->setTemplate($template);
    }

    public function __toString(): string
    {
        return "Le template c'est ".$this->template." et la vue c'est ".$this->view;
    }

    public function setView(String $view): void
    {
        if( !file_exists("views/".$view.".php")){
            die("La vue ".$view." n'existe pas");
        }else{
            $this->view = "views/".$view.".php";
        }
    }
    public function setTemplate(String $template): void
    {
        if( !file_exists("views/".$template.".php")){
            die("Le template ".$template." n'existe pas");
        }else{
            $this->template = "views/".$template.".php";
        }
    }

    public function assign($key, $value): void
    {
        $this->data[$key] = $value;
    }

    public function modal($name, $config, $errors): void
    {
        if(!file_exists("views/modals/".$name.".modal.php")){
            die("Le modal ".$name." n'existe pas");
        }
        include "views/modals/".$name.".modal.php";
    }

    public function __destruct()
    {
        extract($this->data);
        include $this->template;
    }

    public function render()
    {
        // Récupérer le chemin complet du fichier de vue
        $viewPath = $this->getViewPath();

        // Vérifier si le fichier de vue existe
        if (file_exists($viewPath)) {
            // Extraire les données de la vue
            extract($this->data);

            // Démarrer la mise en tampon de sortie
            ob_start();

            // Inclure le fichier de vue
            include $viewPath;

            // Récupérer le contenu mis en tampon
            $content = ob_get_clean();

            // Vérifier si un layout est défini
            if ($this->layout) {
                // Récupérer le chemin complet du fichier de layout
                $layoutPath = $this->getLayoutPath();

                // Vérifier si le fichier de layout existe
                if (file_exists($layoutPath)) {
                    // Inclure le fichier de layout
                    include $layoutPath;
                } else {
                    // Gérer le cas où le fichier de layout n'existe pas
                    echo "Layout file not found.";
                }
            } else {
                // Afficher uniquement le contenu de la vue
                echo $content;
            }
        } else {
            // Gérer le cas où le fichier de vue n'existe pas
            echo "View file not found.";
        }
    }


}

