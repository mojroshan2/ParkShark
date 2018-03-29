CREATE TABLE comments (
    cid int(11) not null AUTO_INCREMENT PRIMARY KEY,
    uid varchar(128) not null, 
    date datetime not null, 
    message TEXT not null 
    );
	
	
	
	CREATE TABLE user (
	id int (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    uid varchar(128) NOT NULL,
    pwd varchar(128) NOT NULL
);

INSERT INTO user (uid, pwd) VALUES ('admin', 12345);
INSERT INTO user (uid, pwd) VALUES ('wbaker', 12345);

/*this file doesn't do anything it's just a reference for sql statements that create the tables*/