
..

# Table des matières

[I. Fonctionnement de base de Docker](https://pastequecarre.github.io/docker-sae203/#1) 
    
[I. Dockerfile pour la création d'images](https://pastequecarre.github.io/docker-sae203/#2)
    

--------------
<a id="1"></a>
# I. Fonctionnement de base de Docker

## 2. Premières notions de Docker

Tout d’abord, on regarde notre version de docker en utilisant `docker –version`

Normalement on obtient : `Docker version 20.10.24, build 297e128`

Ensuite nous lançons notre premier conteneur en utilisant
l’image hello-world : `docker run hello-world` qui doit montrer ce message :

**IMAGE**


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


### 3.1 Conteneur en mode interactif

Tout d'abord, on entre `docker run alpine`

Une image a une action à exécuter par défaut. Dans le cas d’alpine c”est `/bin/sh` qui n'affiche rien. On peut passer un nouveau paramètre dans l’appel aussi.
`docker run alpine ls`

Pour rendre le conteneur interactif, il faut lui passer l’option -it: `docker run -it alpine`

Maintenant on navigue à l’intérieur du conteneur. On peut le vérifier avec `cat /etc/os-release`

Qui doit donner : 

**IMAGE**

On peut interagir avec le conteneur depuis un autre terminal. On ouvre un autre terminal et on affiche les conteneurs actifs avec `docker ps`.

**IMAGE**

Sous CONTAINER ID on peut voir le code de hachage du conteneur et sous NAMES nous avons le nom généré pour le conteneur.

La commande `docker exec` nous permet d’interagir avec un conteneur déjà ouvert
`docker exec -it nervous_heyrovsky /bin/sh` ou `docker exec -it 7b6f528c9067 /bin/sh`

Ce mode sera utile plus tard. On rentre ensuite `exit`.


### 3.2. Ports, volumes et copie de fichiers

Un conteneur est isolé. Nous verrons comment exposer des port et des fichiers ainsi que des répertoires entre la machine hôte et le conteneur avec l’image httpd.


#### 3.2.1. Ports
Le port 80 est le port par défaut du protocole HTTP. `docker run httpd`

Arrêtez le conteneur avec CTRL-C ou depuis docker.

Ce dont nous avons besoin pour rendre ce service accessible, c’est de mapper le port 80 sur le conteneur à un port donné sur la machine hôte. Nous allons lancer l’instruction `docker run --name httpd-<votre nom> -d -p <port hôte>:80 httpd`

Par exemple : 
`docker run –name httpd-Marrouche -d -p 9000:80 httpd` (-d permet de lancer le conteneur en arrière plan)

On peut maintenant ouvrir un navigateur et entrer `localhost:<port hôte>`.

**IMAGE**


#### 3.2.2 Copier des fichiers dans un conteneur en cours d’exécution

Nous allons afficher un autre site web créé par nous même à la place de l’index.html crée par défaut.
Pour ce faire, dans le répertoire ou notre .html se trouve, nous allons lancer la commande `docker run --name httpd-<votre nom> -d -p <port hôte>:80 httpd`

On va ensuite récuperer l’ID du conteneur à l’aide de `docker ps`

Puis on lance la commande `docker cp <nom du fichier>.html <ID>:/usr/local/apache2/htdocs/index.html` où “/usr/local/apache2/htdocs/index.html” est le dossier racine du site web de défaut. On rafraîchit l’onglet, et voilà !

**IMAGE**


#### 3.2.3. Volumes

Dans cette section, nous allons créer des volumes entre les deux machines en utilisant l’image httpd.
Tout d’abord on crée un répertoire html ou on voit, Nous l'avons créé sur le bureau. Dans ce répértoire, on crée un fichier index.html avec le contenu de notre choix.

Sur le dossier html, on ouvre un cmd et on exécute l’instruction suivante :
`docker run --name httpd-<votre nom> -d -p <port hôte>:80 -v $(pwd):/usr/local/apache2/htdocs httpd`

Donc pour nous ca sera `docker run --name httpd-Marrouche -d -p 9000:80 -v C:\Users\rambo\Desktop\html\:/usr/local/apache2/htdocs httpd`
Maintenant on  peut modifier notre fichier depuis notre bureau et le site web changera automatiquement. On a en effet un dossier partagé avec le conteneur.


<br>
--------------
<a id="2"></a>
# II. Dockerfile pour la création d'images

