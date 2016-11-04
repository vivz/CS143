# PRIMARY KEY: this constraint makes id the primary key and makes sure this value is unique;
# NOT NULL: this constraint ensures title, year and company cannot be null;
# CHECK rating: this constraint ensures that rating can only be null or one of the specified strings;
# CHECK year: this constraint ensures that the value of year only between 1894 (the year before movie was invented) and 10000
# CHECK id: this constraint ensures that the value of id is greater than 0 and smaller than the MaxPersonID;

CREATE TABLE Movie(
	id INT PRIMARY KEY,
	title VARCHAR(100) NOT NULL,
	year INT NOT NULL,
	rating VARCHAR(10),
	company VARCHAR(50) NOT NULL,
	CHECK(rating IS NULL OR rating='G' OR rating='PG' OR rating='PG-13' OR rating='R' OR rating='NC-17'),
	CHECK(year > 1894 AND year < 10000),
	CHECK(id > 0 AND id <= MaxMovieID(id))
) ENGINE = InnoDB;

# PRIMARY KEY: this constraint makes id the primary key and makes sure this value is unique;
# NOT NULL: this constraint ensures last, first and dob cannot be null;
# CHECK id: this constraint ensures that the value of id is greater than 0 and smaller than the MaxPersonID;

CREATE TABLE Actor(
	id INT PRIMARY KEY,
	last VARCHAR(20) NOT NULL,
	first VARCHAR(20) NOT NULL,
	sex VARCHAR(6),
	dob DATE NOT NULL,
	dod DATE
	CHECK(id > 0 AND id <= MaxPersonID(id))
) ENGINE = InnoDB;

# PRIMARY KEY: this constraint makes id the primary key and makes sure this value is unique;
# NOT NULL: this constraint ensures last, first and dob cannot be null;
# CHECK id: this constraint ensures that the value of id is greater than 0 and smaller than the MaxPersonID;

CREATE TABLE Director(
	id INT PRIMARY KEY,
	last VARCHAR(20) NOT NULL,
	first VARCHAR(20) NOT NULL,
	dob DATE NOT NULL,
	dod DATE
	CHECK(id > 0 AND id <= MaxPersonID(id))
) ENGINE = InnoDB;

# PRIMARY KEY: this constraint makes id the primary key and makes sure this value is unique;
# NOT NULL: this constraint ensures genre cannot be null;
# FOREIGN KEY: this constraint makes mid a reference to Moive(id), so mid has to exist in Movie.id

CREATE TABLE MovieGenre(
	mid INT PRIMARY KEY,
	genre VARCHAR(200) NOT NULL,
	FOREIGN KEY (mid) REFERENCES Movie(id)
) ENGINE = InnoDB;

# NOT NULL: this constraint ensures mid and did cannot be null;
# FOREIGN KEY (mid): this constraint makes mid a reference to Moive(id), so mid has to exist in Movie.id
# FOREIGN KEY (did): this constraint makes did a reference to Director(id), so did has to exist in Director.id

CREATE TABLE MovieDirector(
	mid INT NOT NULL,
	did INT NOT NULL,
	FOREIGN KEY (mid) REFERENCES Movie(id),
	FOREIGN KEY (did) REFERENCES Director(id)
) ENGINE = InnoDB;

# NOT NULL: this constraint ensures mid and aid cannot be null;
# FOREIGN KEY (mid): this constraint makes mid a reference to Moive(id), so mid has to exist in Movie.id
# FOREIGN KEY (aid): this constraint makes aid a reference to Actor(id), so aid has to exist in Actor.id

CREATE TABLE MovieActor(
	mid INT NOT NULL,
	aid INT NOT NULL,
	role VARCHAR(50) NOT NULL,
	FOREIGN KEY (mid) REFERENCES Movie(id),
	FOREIGN KEY (aid) REFERENCES Actor(id)
) ENGINE = InnoDB;

# NOT NULL: this constraint ensures rating and mid cannot be null;
# FOREIGN KEY (mid): this constraint makes mid a reference to Moive(id), so mid has to exist in Movie.id
# CHECK id: this constraint ensures that the value of rating is on the scale of 0 to 5;

CREATE TABLE Review(
	name VARCHAR(20),
	time TIMESTAMP,
	mid INT NOT NULL,
	rating INT NOT NULL,
	comment VARCHAR(500),
	CHECK(rating >= 0 AND rating <= 5),
	FOREIGN KEY (mid) REFERENCES Movie(id)
) ENGINE = InnoDB;

# PRIMARY KEY: this constraint makes id the primary key and makes sure this value is unique;

CREATE TABLE MaxPersonID(
	id INT PRIMARY KEY
) ENGINE = InnoDB;

# PRIMARY KEY: this constraint makes id the primary key and makes sure this value is unique;

CREATE TABLE MaxMovieID(
	id INT PRIMARY KEY
) ENGINE = InnoDB;


