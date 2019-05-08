CREATE TABLE "user" (
    id SERIAL PRIMARY KEY ,
    firstname VARCHAR NOT NULL ,
    lastname VARCHAR NOT NULL ,
    mail     VARCHAR NOT NULL,
    passwd   VARCHAR NOT NULL,
    birthday date,
    sexe Varchar NOT NULL,
    city Varchar,
    description Varchar,
    avatar Varchar,
    cover Varchar

);

INSERT INTO "user"(firstname, lastname,mail,passwd, birthday,sexe) VALUES ('Imane', 'Elmoul','imane.elmoul@gmail.com','567','1997-04-24','Female');





