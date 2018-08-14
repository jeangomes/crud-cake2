# CakePHP


Collaborators CRUD for selective process.

Structure for the only table:

CREATE TABLE collaborators
(
    id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name varchar(200) NOT NULL,
    email varchar(180) NOT NULL,
    cpf char(11) NOT NULL,
    telephone varchar(20),
    img varchar(40),
    created datetime,
    modified datetime,
    active tinyint DEFAULT 1 NOT NULL
);

# crud-cake2
