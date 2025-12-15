CREATE TABLE IF NOT EXISTS `ddbb_proyecte`.users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS `ddbb_proyecte`.articles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    title VARCHAR(255) NOT NULL,
    content TEXT,
    published_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Dades de prova
INSERT INTO ddbb_proyecte.users (username, email) VALUES 
('victor_redel', 'vrr@sapalomera.cat'),
('john_docker', 'jdocker@sapalomera.cat');

INSERT INTO ddbb_proyecte.articles (user_id, title, content) VALUES 
(1, 'Introducció a Docker', 'Docker és una plataforma...'),
(2, 'Aparador Apache', 'Com configurar Virtual Hosts...');

