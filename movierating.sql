CREATE TABLE IF NOT EXISTS `actor` (
  `actorID` int(10) NOT NULL AUTO_INCREMENT,
  `aName` varchar(50) NOT NULL,
  `aNation` varchar(50) NOT NULL,
  `adatebirth` DATE NOT NULL,
  `ainfo` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`actorID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `movies` (
  `movieID` int(10) NOT NULL AUTO_INCREMENT,
  `movieName` varchar(50) NOT NULL,
  `movieDate` DATE NOT NULL,
  `mrates` decimal(3,2) NOT NULL,
  `director` varchar(50) NOT NULL,
  `mnation` varchar(50) NOT NULL,
  PRIMARY KEY (`movieID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `category` (
  `caID` int(10) NOT NULL AUTO_INCREMENT,
  `caName` varchar(50) NOT NULL,
  PRIMARY KEY (`caID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `users` (
  `uID` int(10) NOT NULL AUTO_INCREMENT,
  `uname` varchar(50) NOT NULL,
  `psword` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `datebirth` DATE NOT NULL,
  PRIMARY KEY (`uID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `mcate` (
  `caID` int(10) NOT NULL, 
  `movieID` int(10) NOT NULL,
  PRIMARY KEY (`caID`,`movieID`),
  KEY `fk_mcate_key_caID` (`caID`),
  KEY `fk_mcate_key_movieID` (`movieID`),
  CONSTRAINT `fk_mcate_key_caID` FOREIGN KEY (`caID`) REFERENCES `category` (`caID`),
  CONSTRAINT `fk_mcate_key_movieID` FOREIGN KEY (`movieID`) REFERENCES `movies` (`movieID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `mactor` (
  `actorID` int(10) NOT NULL,
  `movieID` int(10) NOT NULL,
  PRIMARY KEY (`actorID`,`movieID`),
  KEY `fk_mactor_key_actorID` (`actorID`),
  KEY `fk_mactor_key_movieID` (`movieID`),
  CONSTRAINT `fk_mactor_key_actorID` FOREIGN KEY (`actorID`) REFERENCES `actor` (`actorID`),
  CONSTRAINT `fk_mactor_key_movieID` FOREIGN KEY (`movieID`) REFERENCES `movies` (`movieID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `comment` (
  `comID` int(10) NOT NULL AUTO_INCREMENT,
  `uID` int(10) NOT NULL,
  `movieID` int(10) NOT NULL,
  `content` varchar(100) NOT NULL,
  `time` DATE NOT NULL,
  `numlikes` int(10) NOT NULL,
  `ratings` decimal(3,2) NOT NULL,
  PRIMARY KEY (`comID`),
  KEY `fk_comment_key_uID` (`uID`),
  KEY `fk_comment_key_movieID` (`movieID`),
  CONSTRAINT `fk_comment_key_uID` FOREIGN KEY (`uID`) REFERENCES `users` (`uID`),
  CONSTRAINT `fk_comment_key_movieID` FOREIGN KEY (`movieID`) REFERENCES `movies` (`movieID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `favorites` (
  `uID` int(10) NOT NULL,
  `movieID` int(10) NOT NULL,
  `showFlag` int(10) NOT NULL,
  PRIMARY KEY (`uID`,`movieID`),
  KEY `fk_favorites_key_uID` (`uID`),
  KEY `fk_favorites_key_movieID` (`movieID`),
  CONSTRAINT `fk_favorites_key_uID` FOREIGN KEY (`uID`) REFERENCES `users` (`uID`),
  CONSTRAINT `fk_favorites_key_movieID` FOREIGN KEY (`movieID`) REFERENCES `movies` (`movieID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO movies ( movieID, movieName, movieDate, mrates, director, mnation ) VALUES 
( 1, "Mary and the Witch's Flower", "2018-04-28", 6.8, "Hiromasa Yonebayashi" ,"Japan" );
INSERT INTO movies ( movieID, movieName, movieDate, mrates, director, mnation ) VALUES 
( 2, "The Shawshank Redemption", "1994-10-14", 9.4, "Frank Darabont" ,"USA" );
INSERT INTO movies ( movieID, movieName, movieDate, mrates, director, mnation ) VALUES 
( 3, "WALLE", "2008-06-27", 8.4, "Andrew Stanton" ,"USA" );
INSERT INTO movies ( movieID, movieName, movieDate, mrates, director, mnation ) VALUES 
( 4, "Amelie", "2002-02-08", 8.3, "Jean-Pierre Jeunet" ,"France" );
INSERT INTO movies ( movieID, movieName, movieDate, mrates, director, mnation ) VALUES 
( 5, "Jagten", "2013-01-10", 8.3, "Thomas Vinterberg" ,"Denmark" );
INSERT INTO movies ( movieID, movieName, movieDate, mrates, director, mnation ) VALUES 
( 6, "Inception", "2010-09-01", 8.8, "Christopher Nolan" ,"USA" );
INSERT INTO movies ( movieID, movieName, movieDate, mrates, director, mnation ) VALUES 
( 7, "Saving Private Ryan", "1998-07-24", 8.6, "Steven Spielberg" ,"USA" );
INSERT INTO movies ( movieID, movieName, movieDate, mrates, director, mnation ) VALUES 
( 8, "Venom", "2018-11-09", 7.0, "Ruben Fleischer" ,"USA" );
INSERT INTO movies ( movieID, movieName, movieDate, mrates, director, mnation ) VALUES 
( 9, "Your Name.", "2016-12-01", 8.4, "Makoto Shinkai" ,"Japan" );
INSERT INTO movies ( movieID, movieName, movieDate, mrates, director, mnation ) VALUES 
( 10, "Searching", "2018-08-31", 7.8, "Aneesh Chaganty" ,"USA" );


INSERT INTO actor ( actorID, aName, aNation, adatebirth, ainfo ) VALUES 
( 1, "Hana Sugisaki", "Japan", "1997-10-02", "Hana Sugisaki is a Japanese actress who was previously signed to Stardust Promotion. Her former stage name was Hana Kajiura." );
INSERT INTO actor ( actorID, aName, aNation, adatebirth, ainfo ) VALUES 
( 2, "Tim Robbins", "USA", "1958-10-16", "Born in West Covina, California, but raised in New York City, Tim Robbins is the son of former The Highwaymen singer Gil Robbins and actress Mary Robbins." );
INSERT INTO actor ( actorID, aName, aNation, adatebirth, ainfo ) VALUES 
( 3, "Ben Burtt", "USA", "1948-07-12", "Ben Burtt was born in New York, USA. Though he is a writer, an editor and a director, he is best known for his work as a sound designer.");
INSERT INTO actor ( actorID, aName, aNation, adatebirth, ainfo ) VALUES 
( 4, "Audrey Tautou", "France", "1976-08-09", "Audrey Justine Tautou was born on August 9, 1976 in Beaumont, France, to Evelyne Marie Laure (Nuret), a teacher, and Bernard Tautou, a dental surgeon.");
INSERT INTO actor ( actorID, aName, aNation, adatebirth, ainfo ) VALUES 
( 5, "Mads Mikkelsen", "Denmark", "1965-11-22", "Mads Mikkelsen is a synonym to the great success the Danish film industry has had since the mid-1990s.");
INSERT INTO actor ( actorID, aName, aNation, adatebirth, ainfo ) VALUES 
( 6, "Leonardo DiCaprio", "USA", "1974-11-11", "Few actors in the world have had a career quite as diverse as Leonardo DiCaprio's. DiCaprio has gone from relatively humble beginnings, to then become a leading man in Hollywood blockbusters.");
INSERT INTO actor ( actorID, aName, aNation, adatebirth, ainfo ) VALUES 
( 7, "Tom Hanks", "USA", "1956-07-09", "Thomas Jeffrey Hanks was born in Concord, California, to Janet Marylyn (Frager), a hospital worker, and Amos Mefford Hanks, an itinerant cook.");
INSERT INTO actor ( actorID, aName, aNation, adatebirth, ainfo ) VALUES 
( 8, "Tom Hardy", "UK", "1977-09-15", "With his breakthrough performance as Eames in Christopher Nolan's sci-fi thriller Inception (2010), English actor Tom Hardy has been brought to the attention of mainstream audiences worldwide.");
INSERT INTO actor ( actorID, aName, aNation, adatebirth, ainfo ) VALUES 
( 9, "Ryunosuke Kamiki", "Japan", "1993-05-19", "Ryunosuke Kamiki was born in Fujimi, Japan. He was diagnosed with a rare disease soon after he was born and was lucky enough to become one of the 1% who survived the disease.");
INSERT INTO actor ( actorID, aName, aNation, adatebirth, ainfo ) VALUES 
( 10, "John Cho", "South Korea", "1972-06-16", "John Yohan Cho was born in Seoul, South Korea, but moved to Los Angeles, California as a child, where his father was a Christian minister.");

INSERT INTO mactor ( actorID, movieID ) VALUES ( 1, 1 );
INSERT INTO mactor ( actorID, movieID ) VALUES ( 2, 2 );
INSERT INTO mactor ( actorID, movieID ) VALUES ( 3, 3 );
INSERT INTO mactor ( actorID, movieID ) VALUES ( 4, 4 );
INSERT INTO mactor ( actorID, movieID ) VALUES ( 5, 5 );
INSERT INTO mactor ( actorID, movieID ) VALUES ( 6, 6 );
INSERT INTO mactor ( actorID, movieID ) VALUES ( 7, 7 );
INSERT INTO mactor ( actorID, movieID ) VALUES ( 8, 8 );
INSERT INTO mactor ( actorID, movieID ) VALUES ( 9, 9 );
INSERT INTO mactor ( actorID, movieID ) VALUES ( 10, 10 );

INSERT INTO category ( caID, caName ) VALUES ( 1, "Animation" );
INSERT INTO category ( caID, caName ) VALUES ( 2, "Comedy" );
INSERT INTO category ( caID, caName ) VALUES ( 3, "Crime" );
INSERT INTO category ( caID, caName ) VALUES ( 4, "Documentary" );
INSERT INTO category ( caID, caName ) VALUES ( 5, "Family" );
INSERT INTO category ( caID, caName ) VALUES ( 6, "Drama" );
INSERT INTO category ( caID, caName ) VALUES ( 7, "Sci-Fi" );
INSERT INTO category ( caID, caName ) VALUES ( 8, "Romance" );
INSERT INTO category ( caID, caName ) VALUES ( 9, "War" );
INSERT INTO category ( caID, caName ) VALUES ( 10, "Action" );

INSERT INTO mcate ( caID, movieID ) VALUES ( 1, 1 );
INSERT INTO mcate ( caID, movieID ) VALUES ( 6, 2 );
INSERT INTO mcate ( caID, movieID ) VALUES ( 1, 3 );
INSERT INTO mcate ( caID, movieID ) VALUES ( 2, 4 );
INSERT INTO mcate ( caID, movieID ) VALUES ( 6, 5 );
INSERT INTO mcate ( caID, movieID ) VALUES ( 7, 6 );
INSERT INTO mcate ( caID, movieID ) VALUES ( 9, 7 );
INSERT INTO mcate ( caID, movieID ) VALUES ( 7, 8 );
INSERT INTO mcate ( caID, movieID ) VALUES ( 1, 9 );
INSERT INTO mcate ( caID, movieID ) VALUES ( 6, 10 );

INSERT INTO users ( uID, uName, psword, email, datebirth ) VALUES 
( 1, "Simon", "a0000000", "simon@gmail.com", "1994-01-01" );
INSERT INTO users ( uID, uName, psword, email, datebirth ) VALUES 
( 2, "Wensen", "a1111111", "wensen@gmail.com", "1994-01-02" );
INSERT INTO users ( uID, uName, psword, email, datebirth ) VALUES 
( 3, "Bob", "a2222222", "bob@gmail.com", "1994-04-01" );
INSERT INTO users ( uID, uName, psword, email, datebirth ) VALUES 
( 4, "admin", "a3333333", "admin@gmail.com", "1990-01-01" );