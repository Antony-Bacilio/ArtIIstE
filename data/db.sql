CREATE TABLE "user" (
    id SERIAL PRIMARY KEY ,
    firstname VARCHAR(30),
    lastname VARCHAR(30),
    mail VARCHAR NOT NULL,
    mdp VARCHAR NOT NULL,
    birthday date,
    sexe CHAR NOT NULL,
    art VARCHAR 
);

INSERT INTO "user"(firstname, lastname, mail,mdp, birthday, sexe, art) VALUES ('Lucas', 'Herfort', 'lucas.herfort@gmail.com', 'exr29247', '1997-08-22','M','Musique');
