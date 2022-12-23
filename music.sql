CREATE DATABASE music;

USE music;

CREATE TABLE playlist (
	id INT(10) PRIMARY KEY AUTO_INCREMENT NOT NULL,
	song_name VARCHAR(150),
	artist VARCHAR(150) NOT NULL,
	album VARCHAR(200) NOT NULL,
	released YEAR,
	genre VARCHAR(100)
);


INSERT INTO playlist VALUES
(NULL,'Shine on, you crazy diamond','Pink Floyd','Wish You Were Here',1975,'Classical rock'),
(NULL,'Hey you','Pink Floyd','The Wall',1979,'Progressive rock'),
(NULL,'Time','Pink Floyd','The Dark Side of The Moon',1973,'Progressive rock'),
(NULL,'Monopoly on Truth','Epica','Requiem for the Indifferent',2012,'Progressive metal'),
(NULL,'Wind of Change','Scorpions','Crazy World',1999,'Classical rock'),
(NULL,'The Unforgiven 2','Metallica','Reload',1997,'Hard rock'),
(NULL,'Fade to black','Metallica','Ride the Lightning',1984,'Heavy metal'),
(NULL,'A Phantasmic Parade','Epica','The Holographic Principle',2016,'Symphonic metal'),
(NULL,'Burn to a Cinder','Epica','Design Your Universe',2009,'Symphonic metal'),
(NULL,'Numb','Linkin Park','Meteora',2003,'Alternative rock'),
(NULL,'Castle of Glass','Linkin Park','Living Things',2012,'Nu Metal'),
(NULL,'Lithium','Evanescence','The Open Door',2006,'Rock'),
(NULL,'In bloom','Nirvana','Nevermind',1991,'Alternative/Indie'),
(NULL,'Storytime','Nightwish','Imaginaerum',2011,'Power metal'),
(NULL,'Alpenglow','Nightwish','Endless Forms Most Beautiful',2015,'Alt metal');


SELECT DISTINCT artist FROM playlist ORDER BY artist ASC;
SELECT * FROM playlist WHERE genre LIKE '%metal%';

SELECT CONCAT(artist," - ",song_name,", ",album,", ",released,", ",genre) FROM playlist WHERE artist LIKE '%Epica%' OR genre LIKE '%metal%' 
ORDER BY artist ASC;

SELECT CONCAT(artist," - ",song_name,", ",album,", ",released,", ",genre) FROM playlist ORDER BY artist ASC;

CREATE VIEW music_view AS SELECT CONCAT(artist," - ",song_name,", ",album,", ",released,", ",genre) FROM playlist ORDER BY artist ASC;

SELECT artist, song_name, album, released, genre FROM playlist ORDER BY artist ASC;

SELECT CONCAT(artist, song_name, album, released, genre) FROM playlist ORDER BY artist ASC;

SELECT * FROM music_view;

SELECT artist, song_name, album, released, genre FROM playlist WHERE artist LIKE'%Epica%';

