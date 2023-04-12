
## Groupe 2

--------------
# I. Fonctionnement de base de Docker

## 2. Premières notions de Docker

Tout d’abord, on regarde notre version de docker en utilisant `docker –version`

Normalement on obtient : `Docker version 20.10.24, build 297e128`

Ensuite nous lançons notre premier conteneur en utilisant
l’image hello-world : `docker run hello-world` qui doit montrer ce message :

IMAGE


### 2.1. Image Docker vs Conteneur Docker

Une image docker est un fichier qui contient tout ce dont il a besoin (code source, les bibliothèques, les dépendances, les outils et d’autres fichiers) à l’exécution d’une application. On ne peut pas les démarrer ou les exécuter . On doit utiliser ce modèle comme base pour créer un conteneur.
Un conteneur Docker est une image exécutable.


### 2.2. Images les plus populaires

Les images les plus populaires se trouvent sur <https://hub.docker.com/explore/>
Nous allons installer alpine et httpd grâce à `docker pull alpine` et `docker pull httpd`.

<br>

## 3. Interactions avec les conteneurs docker

La première image *(alpine)* est une version allégée de linux et la deuxième *(httpd)* est une image linux avec un serveur apache déjà configuré et prêt à être utilisé .
Si l’image est installée et sur notre machine, la commande `docker run <image>` créera un conteneur à partir de celle-ci. 

