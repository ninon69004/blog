********************* Symfony ***********************

Installation

    https://symfony.com/download
    https://getcomposer.org/download/


Creating project
    doc : 
        https://symfony.com/doc/current/setup.html

    creation 
        composer create-project symfony/website-skeleton my_project_name // complet (acces base de données)
        symfony new <nom de ton projet> //leger

    demarrer server 
        aller ds directory 
        symfony server:start -d

    ajouter plugins
        chercher ds https://flex.symfony.com/
            ex : maker-bundle
                composer require symfony/maker-bundle
            ex: composer require sensio/framework-extra-bundle || composer req annotations (alias de sensio)

            composer require orm // database
            composer req orm-fixtures
            composer req fzaninotto/faker
            composer req joshtronic/php-loremipsum
                symfony console doctrine:fixtures:load
            
            composer req admin
                symfony console make:admin:dashboard
                symfony console make:admin:crud
                * Configure your Dashboard at "src/Controller/Admin/AdminController.php"
                 * Run "make:admin:crud" to generate CRUD controllers and link them from the Dashboard.

            composer req mime
                permet de reconnaitre les fichier (leur extensions)
                //problem import image avec ImageField de EasyAdmin
            
            composer require symfony/security-bundle



    creer controller
        ds src/controller
            Toujours finir file par "Controller.php"
                <?php
                    namespace App\Controller;

                    use Symfony\Component\HttpFoundation\Response;
                    class HelloController {
                        public function hello() {
                            // echo "Hello world!";
                            return new Response("Hello World!");
                        }
                    }


                ?>
        ds config/routes.yaml
            index:
                path: /hello
                controller: App\Controller\HelloController::hello

        shortcut avec sensio
        symfony console make:controller HomeController

    css
        https://bootswatch.com/

    data base
        symfony console make:entity 


        symfony console doctrine:database:create -> Créer la base de donnée
        symfony console make:migration -> Préparer la "migration" en vue de persister le schema sur la BDD
        symfony console doctrine:migrations:migrate -> Migrer la BDD vers la nouvelle version
        symfony console doctrine:migrations:sync-metadata-storage -> update

        symfony console make:user
        symfony console make:entity
        symfony console make:auth
        symfony console make:admin:crud
    
    







