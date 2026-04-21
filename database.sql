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
    genre TEXT,
    rating REAL,
    description TEXT,
    poster_url TEXT,
    trailer_url TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Movie genres table (for better normalization)
CREATE TABLE genres (
    genre_id INTEGER PRIMARY KEY AUTOINCREMENT,
    genre_name TEXT UNIQUE NOT NULL
);

-- Junction table for movie-genre relationships
CREATE TABLE movie_genres (
    movie_id INTEGER,
    genre_id INTEGER,
    PRIMARY KEY (movie_id, genre_id),
    FOREIGN KEY (movie_id) REFERENCES movies(movie_id) ON DELETE CASCADE,
    FOREIGN KEY (genre_id) REFERENCES genres(genre_id) ON DELETE CASCADE
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

-- User ratings for movies
CREATE TABLE movie_ratings (
    rating_id INTEGER PRIMARY KEY AUTOINCREMENT,
    user_id INTEGER,
    movie_id INTEGER,
    rating INTEGER CHECK (rating >= 1 AND rating <= 10),
    review TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE,
    FOREIGN KEY (movie_id) REFERENCES movies(movie_id) ON DELETE CASCADE,
    UNIQUE (user_id, movie_id)
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

INSERT INTO movies (title, release_date, director, duration, genre, rating, description) VALUES 
('Inception', '2010-07-16', 'Christopher Nolan', 148, 'Sci-Fi', 8.8, 'A thief who steals corporate secrets through dream-sharing technology is given the inverse task of planting an idea into the mind of a C.E.O.'),
('The Shawshank Redemption', '1994-09-23', 'Frank Darabont', 142, 'Drama', 9.3, 'Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency.'),
('The Dark Knight', '2008-07-18', 'Christopher Nolan', 152, 'Action', 9.0, 'When the menace known as the Joker wreaks havoc and chaos on the people of Gotham, Batman must accept one of the greatest psychological and physical tests of his ability to fight injustice.');

INSERT INTO events (event_name, event_description, event_date, location, capacity, ticket_price, created_by) VALUES 
('Inception Screening', 'Special screening of Inception with director Q&A', '2023-12-15 19:00:00', 'Cinema Hall A', 150, 12.50, 1),
('Classic Drama Night', 'Evening of classic dramas', '2023-12-20 20:00:00', 'Main Theater', 200, 8.00, 2),
('Horror Movie Marathon', 'Night of horror films', '2023-12-25 18:00:00', 'Horror Room', 80, 15.00, 1);

INSERT INTO event_movies (event_id, movie_id) VALUES 
(1, 1), (2, 2), (3, 3);

INSERT INTO event_subscriptions (user_id, event_id) VALUES 
(1, 1), (1, 2), (2, 1), (3, 3);