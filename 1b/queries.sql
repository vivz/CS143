SELECT CONCAT(A.first,' ',A.last)
FROM Actor A, Movie M, MovieActor MA
WHERE M.title='Die Another Day' AND M.id=MA.mid AND MA.aid=A.id;

SELECT COUNT(DISTINCT MA.aid)
FROM MovieActor MA, MovieActor MA2
WHERE MA.mid<>MA2.mid AND MA.aid=MA2.aid;

