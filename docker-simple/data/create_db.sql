CREATE DATABASE IF NOT EXISTS momentos;

USE momentos;

CREATE TABLE IF NOT EXISTS USERS (
    username VARCHAR(50) PRIMARY KEY NOT NULL,
    mdp TEXT NOT NULL,
    UNIQUE(username)
);

CREATE TABLE IF NOT EXISTS VIDEOS (
    id      INT PRIMARY KEY AUTO_INCREMENT,
    nom     TEXT NOT NULL,
    lien    VARCHAR(100) NOT NULL,
    bpublic BOOLEAN,
    UNIQUE(lien)
);

CREATE TABLE IF NOT EXISTS VPERSO (
    username    VARCHAR(50)  REFERENCES USERS(username),
    id          INT          REFERENCES VIDEOS(id),
    PRIMARY KEY (username, id )
);

INSERT INTO USERS
VALUES ( 'momo','password');
INSERT INTO USERS
VALUES ( 'axel','html');
INSERT INTO USERS
VALUES ( 'martin','queque');

INSERT INTO VIDEOS(nom,lien,bpublic)
VALUES('Se faire demarrer en the pit sur hypixel','https://www.youtube.com/watch?v=RBm76O7-ZVE',false);
INSERT INTO VIDEOS(nom,lien,bpublic)
VALUES('Je vais faire BUCHERON(Pokemon Jesus Challenge)','https://www.youtube.com/watch?v=bf-MNqHjZHU',false);
INSERT INTO VIDEOS(nom,lien,bpublic)
VALUES('Rick Astley - Never Gonna Give You Up','https://www.youtube.com/watch?v=dQw4w9WgXcQ',true);
INSERT INTO VIDEOS(nom,lien,bpublic)
VALUES('I Met the Legendary Author of Vinland Saga','https://www.youtube.com/watch?v=Z7BH6YQeWoI',false);
INSERT INTO VIDEOS(nom,lien,bpublic)
VALUES('What Makes These Manga Special','https://www.youtube.com/watch?v=DJwt57ew5FQ',false);
INSERT INTO VIDEOS(nom,lien,bpublic)
VALUES('Joueur du grenier - Saint- Valentin','https://www.youtube.com/watch?v=uY0peQRNauY',false);
INSERT INTO VIDEOS(nom,lien,bpublic)
VALUES('Greg et son fils','https://www.youtube.com/watch?v=gIlf2UTyCEE',true);
INSERT INTO VIDEOS(nom,lien,bpublic)
VALUES('KCORP vs FAZE - FINALE - Winter Major - RLCS 22/23','https://www.youtube.com/watch?v=BhQpZLCl7e8',false);
INSERT INTO VIDEOS(nom,lien,bpublic)
VALUES('Joueur du grenier - HARRY POTTER','https://www.youtube.com/watch?v=Ugs9HASX4rA',true);
INSERT INTO VIDEOS(nom,lien,bpublic)
VALUES('LA MORT DE JULES CESAR !!','https://www.youtube.com/watch?v=4JQZQ6yLsgY',false);
INSERT INTO VIDEOS(nom,lien,bpublic)
VALUES('Crazy Frog - Axel F (Official Video)','https://www.youtube.com/watch?v=k85mRPqvMbE',true);


INSERT INTO VPERSO
VALUES('axel',3);
INSERT INTO VPERSO
VALUES('axel',6);
INSERT INTO VPERSO
VALUES('axel',10);
INSERT INTO VPERSO
VALUES('axel',11);
INSERT INTO VPERSO
VALUES('momo',4);
INSERT INTO VPERSO
VALUES('momo',5);
INSERT INTO VPERSO
VALUES('momo',7);
INSERT INTO VPERSO
VALUES('momo',8);
INSERT INTO VPERSO
VALUES('martin',1);
INSERT INTO VPERSO
VALUES('martin',2);
INSERT INTO VPERSO
VALUES('martin',9);

GRANT ALL ON momentos.* to review_site@localhost IDENTIFIED BY 'password';