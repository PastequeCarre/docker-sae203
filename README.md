**Nom    :** BUREAUX Axel, QUEVAL Martin, MARROUCHE Mohamad
**Groupe :** Groupe 2
**Année  :** 2023

# docker-sae203

## Comment installer le site ?

1. Construire l'image via le Dockerfile (commande à exécuter dans le dossier où se trouve le dit Dockerfile)

       docker build -t <nom image>

2. Créer un conteneur docker avec l'image créée plus tôt

       docker run -d -p <port>:80 <nom image>
       
3. Accéder au site en entrant dans la barre d'adresse :

       localhost:<port>
