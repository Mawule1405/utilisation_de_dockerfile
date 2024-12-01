
Commandes nécessaires
1. Construire l'image Docker
Pour créer une image à partir de ce Dockerfile, utilisez la commande suivante (à exécuter dans le répertoire où se trouve le Dockerfile) :

docker build -t my_php_app .
-t my_php_app : Nomme l'image my_php_app.
. : Spécifie que le contexte de construction est le répertoire actuel.


2. Exécuter le conteneur sur le port 8081
Pour exécuter le conteneur et mapper le port 8081 de l'hôte au port 80 du conteneur :


docker run -d --name my_php_container -p 8081:80 my_php_app
-d : Exécute le conteneur en mode détaché (arrière-plan).
--name my_php_container : Donne un nom unique au conteneur.
-p 8081:80 : Mappe le port 8081 de la machine hôte au port 80 du conteneur.
my_php_app : Nom de l'image à utiliser.


3. Vérification
Lister les conteneurs actifs :

docker ps
Assurez-vous que le conteneur est en cours d'exécution et que le port 8081 est mappé.

Accéder à l'application : Ouvrez un navigateur et accédez à l'URL suivante :
http://localhost:8081