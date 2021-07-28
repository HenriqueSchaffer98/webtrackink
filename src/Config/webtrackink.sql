CREATE TABLE usuarios (
	id int not null AUTO_INCREMENT,
    nome varchar(50),
    username varchar(100),
    password varchar(100),
    PRIMARY KEY (id)
);
CREATE TABLE link (
	id int not null AUTO_INCREMENT,
    url varchar(500),
    STATUS boolean,
    user_id int,
    PRIMARY KEY (id),
    FOREIGN KEY (user_id) REFERENCES usuarios(id)
);
CREATE TABLE hist_link (
	id int not null AUTO_INCREMENT,
    cod_http varchar(100),
    rest text,
    user_id int,
    link_id int,
    PRIMARY KEY (id),
    FOREIGN KEY (user_id) REFERENCES usuarios(id),
    FOREIGN KEY (link_id) REFERENCES link(id)
);