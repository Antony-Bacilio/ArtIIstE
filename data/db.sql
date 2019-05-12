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

INSERT INTO "user"(firstname, lastname, mail, passwd, birthday, sexe,confirm) VALUES ('John', 'Doe', 'john.doe@gmail.com', '123','1967-11-22', 'Male',1);
INSERT INTO "user"(firstname, lastname, mail, passwd, birthday, sexe,confirm) VALUES ('Yvette', 'Angel', 'yvette.angel@gmail.com', '123', '1932-01-24', 'Female',1);
INSERT INTO "user"(firstname, lastname, mail, passwd, birthday, sexe,confirm) VALUES ('Amelia', 'Waters', 'amelia.waters@gmail.com', '123','1981-12-01', 'Female',1);
INSERT INTO "user"(firstname, lastname, mail, passwd, birthday, sexe,confirm) VALUES ('Manuel', 'Holloway', 'manuel.holloway@gmail.com', '123','1979-07-25','Male',1);
INSERT INTO "user"(firstname, lastname, mail, passwd, birthday, sexe,confirm) VALUES ('Alonzo', 'Erickson', 'alonzo.erickson@gmail.com', '123','1947-11-13','Male',1);
INSERT INTO "user"(firstname, lastname, mail, passwd, birthday, sexe,confirm) VALUES ('Otis', 'Roberson', 'otis.roberson@gmail.com', '123','1995-01-09', 'Male',1);
INSERT INTO "user"(firstname, lastname, mail, passwd, birthday, sexe,confirm) VALUES ('Jaime', 'King', 'jaime.king@gmail.com', '123','1924-05-30','Male',1);
INSERT INTO "user"(firstname, lastname, mail, passwd, birthday, sexe,confirm) VALUES ('Vicky', 'Pearson', 'vicky.pearson@gmail.com', '123','1982-12-12)','Female',1);
INSERT INTO "user"(firstname, lastname, mail, passwd, birthday, sexe,confirm) VALUES ('Silvia', 'Mcguire', 'silviamcguire@gmail.com', '123','1971-03-02','Female',1);
INSERT INTO "user"(firstname, lastname, mail, passwd, birthday, sexe,confirm) VALUES ('Brendan', 'Pena', 'brendan.pena@gmail.com', '123','1950-02-17','Male',1);
INSERT INTO "user"(firstname, lastname, mail, passwd, birthday, sexe,confirm) VALUES ('Jackie', 'Cohen', 'jackie.cohen@gmail.com', '123','1967-01-27','Female',1);
INSERT INTO "user"(firstname, lastname, mail, passwd, birthday, sexe,confirm) VALUES ('Delores', 'Williamson', 'delores.williamson@gmail.com', '123','1961-07-19','Female',1);




