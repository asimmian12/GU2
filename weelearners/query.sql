1. SELECT 
albName, 
albDescription,
release_date,
image,

FROM album alb

INNER JOIN genre g ON fk_genre_id = g.id

2. 
alb.albName, 
alb.albDescription,
alb.release_date,
alb.image,
g.genreName
FROM album alb

INNER JOIN genre g ON alb.fk_genre_id = g.id

3.

SELECT 
alb.albName, 
alb.albDescription,
alb.release_date,
alb.image,
g.genreName,
art.artName,
art.artDescription
FROM album alb

INNER JOIN genre g ON alb.fk_genre_id = g.id

INNER JOIN artist art ON alb.fk_artist_id = art.id


4.
SELECT 
alb.albName, 
alb.albDescription,
alb.release_date,
alb.image,
alb.fk_record_label_id,
g.genreName,
art.artName,
art.artDescription
FROM album alb

INNER JOIN genre g ON alb.fk_genre_id = g.id

INNER JOIN artist art ON alb.fk_artist_id = art.id

INNER JOIN album ON alb.fk_record_label_id = alb.id


5.
SELECT 
alb.albName, 
alb.albDescription,
alb.release_date,
alb.image,
alb.fk_record_label_id,
g.genreName,
art.artName,
art.artDescription,
alb.fk_user_id,
usr.username,
usr.email
FROM album alb

INNER JOIN genre g ON alb.fk_genre_id = g.id

INNER JOIN artist art ON alb.fk_artist_id = art.id

INNER JOIN album ON alb.fk_record_label_id = alb.id

INNER JOIN user usr ON alb.fk_user_id = usr.id



6. SELECT * 
FROM album 
WHERE is_active = 0 

7. SELECT * 
FROM album alb

INNER Join genre g ON alb.fk_genre_id = g.id

WHERE g.genreName = "Rock Music"

