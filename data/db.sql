CREATE TABLE "user" (
    id SERIAL PRIMARY KEY ,
    firstname VARCHAR NOT NULL ,
    lastname VARCHAR NOT NULL ,
    mail     VARCHAR NOT NULL,
    passwd   VARCHAR NOT NULL,
    birthday date,
    sexe Varchar,
    confirm INTEGER,
    city Varchar,
    description Varchar,
    avatar Varchar,
    cover Varchar

);
CREATE TABLE "Publication" (
    id SERIAL PRIMARY KEY,
    user_id INTEGER,
    description VARCHAR,
    photo Varchar,
    date_pub date,
    nb_likes INTEGER DEFAULT 0,
    user_like_id INTEGER
);
CREATE TABLE "Abonnement" (
    id SERIAL PRIMARY KEY,
    abonne VARCHAR,
    abonnement VARCHAR
);


INSERT INTO "user"(firstname, lastname,mail,passwd,confirm) VALUES ('admin','admin','artiste.admin@gmail.com','admin',2);
INSERT INTO "user"(firstname, lastname,mail,passwd, birthday,sexe,confirm) VALUES ('Imane', 'Elmoul','imane.elmoul@gmail.com','567','1997-04-24','Female',1);
INSERT INTO "user"(firstname, lastname,mail,passwd, birthday,sexe,confirm) VALUES ('Lucas', 'Herfort','lucas.herfort@gmail.com','123','1997-08-22','Male',1);





