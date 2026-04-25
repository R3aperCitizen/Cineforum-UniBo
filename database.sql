-- Create the database (in SQLite, this is just creating the file)
-- No explicit database creation needed in SQLite

CREATE TABLE admin (
    admin_id INTEGER PRIMARY KEY AUTOINCREMENT,
    username TEXT NOT NULL,
    pwd TEXT NOT NULL
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
    event_status TEXT DEFAULT 'scheduled'
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
    email TEXT,
    event_id INTEGER,
    subscription_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (event_id) REFERENCES events(event_id) ON DELETE CASCADE,
    UNIQUE (email, event_id)
);

-- Indexes for better performance
CREATE INDEX idx_movies_title ON movies(title);
CREATE INDEX idx_movies_release_date ON movies(release_date);
CREATE INDEX idx_events_date ON events(event_date);
CREATE INDEX idx_events_status ON events(event_status);
CREATE INDEX idx_event_subscriptions_user ON event_subscriptions(email);
CREATE INDEX idx_event_subscriptions_event ON event_subscriptions(event_id);
