<?php


$configFile = file_get_contents("Config/config.json"); // Récupération du fichier de config pour en faire une variable
$config = json_decode($configFile); // Décodage du fichier .json

    spl_autoload_register(
        function ($class) use ($config) {
            // Portabilitée de la variable config avec use
            foreach($config->autoloadFolder as $folder) // Boucle pour rechercher les classes à charger selon les dossiers
            {
                if(file_exists($folder . '/' . $class . '.php')) // On vérifie que le fichier existe
                {
                    include_once $folder . '/' . $class . '.php';
                    break;
                }
            }
        }
    );

    session_start();

    try
    {
        
        $httpRequest = new HttpRequest(); // Instanciation de la class HttpRequest
        $router = new Router(); // Instanciation de la class Router
        $httpRequest->setRoute($router->findRoute($httpRequest, $config->basepath)); // Initialisation de la propriété Route de l'objet httpRequest
        $httpRequest->run($config);

    } 
    catch(Exception $e)
    {
        $httpRequest = new HttpRequest("/Error", "GET");
        $router = new Router();
        $httpRequest->setRoute($router->findRoute($httpRequest, $config->basepath));
        $httpRequest->addParam($e);
        $httpRequest->run($config);
    }