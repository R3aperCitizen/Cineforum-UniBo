-- Create the database (in SQLite, this is just creating the file)
-- No explicit database creation needed in SQLite

-- Users table
CREATE TABLE users (
    user_id INTEGER PRIMARY KEY AUTOINCREMENT,
    username TEXT UNIQUE NOT NULL,
    email TEXT UNIQUE NOT NULL,
    password_hash TEXT NOT NULL,
    first_name TEXT,
    last_name TEXT,
    date_of_birth DATE,
    registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    is_active BOOLEAN DEFAULT 1,
    profile_picture TEXT,
    bio TEXT
);

-- Movies table
CREATE TABLE movies (
    movie_id INTEGER PRIMARY KEY AUTOINCREMENT,
    title TEXT NOT NULL,
    release_date DATE,
    director TEXT,
    duration INTEGER,
    rating REAL,
    description TEXT,
    poster_url TEXT,
    trailer_url TEXT,
    genre_id INTEGER,
    FOREIGN KEY (genre_id) REFERENCES genres(genre_id) ON DELETE SET NULL
);

-- Movie genres table (for better normalization)
CREATE TABLE genres (
    genre_id INTEGER PRIMARY KEY AUTOINCREMENT,
    genre_name TEXT UNIQUE NOT NULL
);

-- Events table
CREATE TABLE events (
    event_id INTEGER PRIMARY KEY AUTOINCREMENT,
    event_name TEXT NOT NULL,
    event_description TEXT,
    event_date DATETIME NOT NULL,
    location TEXT,
    event_poster TEXT,
    capacity INTEGER,
    ticket_price REAL DEFAULT 0.00,
    is_special INTEGER DEFAULT 0,
    event_status TEXT DEFAULT 'scheduled',
    created_by INTEGER,
    FOREIGN KEY (created_by) REFERENCES users(user_id) ON DELETE SET NULL
);

-- Event movies table (many-to-many relationship)
CREATE TABLE event_movies (
    event_id INTEGER,
    movie_id INTEGER,
    PRIMARY KEY (event_id, movie_id),
    FOREIGN KEY (event_id) REFERENCES events(event_id) ON DELETE CASCADE,
    FOREIGN KEY (movie_id) REFERENCES movies(movie_id) ON DELETE CASCADE
);

-- User subscriptions to events
CREATE TABLE event_subscriptions (
    subscription_id INTEGER PRIMARY KEY AUTOINCREMENT,
    user_id INTEGER,
    event_id INTEGER,
    subscription_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status TEXT DEFAULT 'registered',
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE,
    FOREIGN KEY (event_id) REFERENCES events(event_id) ON DELETE CASCADE,
    UNIQUE (user_id, event_id)
);

-- Indexes for better performance
CREATE INDEX idx_users_email ON users(email);
CREATE INDEX idx_movies_title ON movies(title);
CREATE INDEX idx_movies_release_date ON movies(release_date);
CREATE INDEX idx_events_date ON events(event_date);
CREATE INDEX idx_events_status ON events(event_status);
CREATE INDEX idx_event_subscriptions_user ON event_subscriptions(user_id);
CREATE INDEX idx_event_subscriptions_event ON event_subscriptions(event_id);
CREATE INDEX idx_movie_ratings_movie ON movie_ratings(movie_id);
CREATE INDEX idx_movie_ratings_user ON movie_ratings(user_id);

-- Sample data insertion
INSERT INTO genres (genre_name) VALUES 
('Action'), ('Comedy'), ('Drama'), ('Horror'), ('Sci-Fi'), ('Romance'), ('Thriller');

INSERT INTO users (username, email, password_hash, first_name, last_name) VALUES 
('cinemaniac', 'cinemaniac@example.com', '$2b$10$example_hash', 'John', 'Doe'),
('moviebuff', 'moviebuff@example.com', '$2b$10$example_hash', 'Jane', 'Smith'),
('filmlover', 'filmlover@example.com', '$2b$10$example_hash', 'Bob', 'Johnson');

INSERT INTO movies (title, release_date, director, duration, genre, rating, description, poster_url) VALUES 
('Inception', '2010-07-16', 'Christopher Nolan', 148, 'Sci-Fi', 8.8, 'A thief who steals corporate secrets through dream-sharing technology is given the inverse task of planting an idea into the mind of a C.E.O.', 'assets/images/inception.jpg'),
('The Shawshank Redemption', '1994-09-23', 'Frank Darabont', 142, 'Drama', 9.3, 'Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency.', ''),
('The Dark Knight', '2008-07-18', 'Christopher Nolan', 152, 'Action', 9.0, 'When the menace known as the Joker wreaks havoc and chaos on the people of Gotham, Batman must accept one of the greatest psychological and physical tests of his ability to fight injustice.', '');

INSERT INTO "events" ("event_id", "event_name", "event_description", "event_date", "location", "capacity", "ticket_price", "event_status", "created_by", "event_poster", "is_special") VALUES (1, 'Inception Screening', 'Proiezione speciale di Inception con Q&A al regista', '2023-12-15 19:00:00', 'Cinema Eliseo', 150, 12.5, 'scheduled', 1, 'assets/images/inception-event.jpg', 0);
INSERT INTO "events" ("event_id", "event_name", "event_description", "event_date", "location", "capacity", "ticket_price", "event_status", "created_by", "event_poster", "is_special") VALUES (2, 'Serata Felliniana', 'Maratona presso il Cinema Eliseo dei vari capolavori del regista Federico Fellini', '2023-12-20 20:00:00', 'Cinema Eliseo', 150, 8.0, 'scheduled', 2, 'assets/images/fellini-event.jpg', 0);
INSERT INTO "events" ("event_id", "event_name", "event_description", "event_date", "location", "capacity", "ticket_price", "event_status", "created_by", "event_poster", "is_special") VALUES (3, 'Kubrik''s 2001', 'Riproiezione del capolavoro di Kubrik, 2001 - Odissea nello spazio con rinfresco', '2023-12-25 18:00:00', 'Cinema Astra', 80, 15.0, 'scheduled', 1, 'assets/images/2001-event.jpg', 0);
INSERT INTO "events" ("event_id", "event_name", "event_description", "event_date", "location", "capacity", "ticket_price", "event_status", "created_by", "event_poster", "is_special") VALUES (4, 'Talk Christopher Nolan', 'Talk con il famoso regista Christopher Nolan presso Università di Cesena', '2026-04-21 16:00:00', 'Dipartimento di Informatica - Aula Magna', 200, 10.0, 'scheduled', 1, NULL, 1);

INSERT INTO event_movies (event_id, movie_id) VALUES 
(1, 1), (2, 2), (3, 3);

INSERT INTO event_subscriptions (user_id, event_id) VALUES 
(1, 1), (1, 2), (2, 1), (3, 3);

-- --------------------------------------------------------
-- Host:                         C:\Users\Matteo\Desktop\Cineforum UniBo\database.db
-- Versione server:              3.44.0
-- S.O. server:                  
-- HeidiSQL Versione:            12.6.0.6765
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES  */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dump dei dati della tabella database.movies: 3 rows
/*!40000 ALTER TABLE "movies" DISABLE KEYS */;
INSERT INTO "movies" ("movie_id", "title", "release_date", "director", "duration", "rating", "description", "poster_url", "trailer_url", "genre_id") VALUES
	(1, 'Inception', '2010-07-16', 'Christopher Nolan', 148, 8.8, 'A thief who steals corporate secrets through dream-sharing technology is given the inverse task of planting an idea into the mind of a C.E.O.', 'assets/images/inception.jpg', NULL, NULL),
	(2, 'The Shawshank Redemption', '1994-09-23', 'Frank Darabont', 142, 9.3, 'Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency.', NULL, NULL, NULL),
	(3, 'The Dark Knight', '2008-07-18', 'Christopher Nolan', 152, 9.0, 'When the menace known as the Joker wreaks havoc and chaos on the people of Gotham, Batman must accept one of the greatest psychological and physical tests of his ability to fight injustice.', NULL, NULL, NULL);
/*!40000 ALTER TABLE "movies" ENABLE KEYS */;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
