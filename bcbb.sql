CREATE DATABASE IF NOT EXISTS bcbb;
# CREATE USER 'bcbb-the-who'@'%' IDENTIFIED WITH mysql_native_password BY 'bcbb-the-who';
GRANT ALL ON bcbb.* TO 'bcbb-the-who';

USE bcbb;

-- mySQL Table structure
-- =====================

--
-- Structure de la table 'users'
--
DROP TABLE IF EXISTS users;
CREATE TABLE IF NOT EXISTS users
(
    userId     INT(8)       NOT NULL AUTO_INCREMENT,
    userNname  VARCHAR(30)  NOT NULL,
    userPass   VARCHAR(255) NOT NULL,
    userFname  VARCHAR(64)  NOT NULL,
    userLname  VARCHAR(64)  NOT NULL,
    userEmail  VARCHAR(255) NOT NULL,
    userSign   VARCHAR(255),
    userOnline BOOLEAN      NOT NULL,
    userDate   DATETIME     NOT NULL,
    userLevel  INT(8)       NOT NULL,
    UNIQUE INDEX userNameUnique (userNname),
    UNIQUE INDEX userEmailUnique (userEmail),
    PRIMARY KEY (userId)
) ENGINE = InnoDB
  CHARACTER SET utf8;

--
-- Structure de la table 'categories'
--
DROP TABLE IF EXISTS categories;
CREATE TABLE IF NOT EXISTS categories
(
    categoryId   INT(8)      NOT NULL AUTO_INCREMENT,
    categoryName VARCHAR(30) NOT NULL,
    PRIMARY KEY (categoryId)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- Structure de la table 'boards'
--
DROP TABLE IF EXISTS boards;
CREATE TABLE IF NOT EXISTS boards
(
    boardId          INT(8)       NOT NULL AUTO_INCREMENT,
    boardName        VARCHAR(255) NOT NULL,
    boardDescription VARCHAR(255),
    boardImage       VARCHAR(255),
    categoryId       INT(8)       NOT NULL,
    UNIQUE INDEX boardNameUnique (boardName),
    PRIMARY KEY (boardId)
) ENGINE = InnoDB
  CHARACTER SET utf8;

--
-- Structure de la table 'topics'
--
DROP TABLE IF EXISTS topics;
CREATE TABLE IF NOT EXISTS topics
(
    topicId         INT(8)       NOT NULL AUTO_INCREMENT,
    topicSubject    VARCHAR(255) NOT NULL,
    topicDate       DATETIME     NOT NULL,
    topicDateUpdate DATETIME     NOT NULL,
    topicImage      VARCHAR(255) NOT NULL,
    topicBoard      INT(8)       NOT NULL,
    topicBy         INT(8)       NOT NULL,
    PRIMARY KEY (topicId)
) ENGINE = InnoDB
  CHARACTER SET utf8;

--
-- Structure de la table 'posts'
--
DROP TABLE IF EXISTS posts;
CREATE TABLE IF NOT EXISTS posts
(
    postId         INT(8)   NOT NULL AUTO_INCREMENT,
    postContent    TEXT     NOT NULL,
    postDate       DATETIME NOT NULL,
    postDateUpdate DATETIME NOT NULL,
    postDeleted    BOOLEAN  NOT NULL,
    postTopic      INT(8)   NOT NULL,
    postBy         INT(8)   NOT NULL,
    PRIMARY KEY (postId)
) ENGINE = InnoDB
  CHARACTER SET utf8;

-- link the topics to the categories first
ALTER TABLE topics
    ADD FOREIGN KEY (topicBoard) REFERENCES boards (boardId) ON DELETE CASCADE ON UPDATE CASCADE;

-- link the topics to the user who creates one.
ALTER TABLE topics
    ADD FOREIGN KEY (topicBy) REFERENCES users (userId) ON DELETE RESTRICT ON UPDATE CASCADE;

-- Link the posts to the topics:
ALTER TABLE posts
    ADD FOREIGN KEY (postTopic) REFERENCES topics (topicId) ON DELETE CASCADE ON UPDATE CASCADE;

-- And finally, link each post to the user who made it:
ALTER TABLE posts
    ADD FOREIGN KEY (postBy) REFERENCES users (userId) ON DELETE RESTRICT ON UPDATE CASCADE;

ALTER TABLE boards
    ADD FOREIGN KEY (categoryId) REFERENCES categories (categoryId) ON DELETE CASCADE ON UPDATE CASCADE;


-- Ajouts à la base de données

INSERT INTO `users` (`userId`, `userNname`, `userPass`, `userFname`, `userLname`, `userEmail`, `userSign`, `userOnline`,
                     `userDate`, `userLevel`)
VALUES (1, 'Aubanyx', 'becode', 'Auban', 'Labie', 'aubanlabie@gmail.com', 'Admin Aubanyx', 0, NOW(), 2),
       (2, 'Lababase', 'becode', 'Bastien', 'Lafalize', 'bastienlafalize@gmail.com', 'Admin Bastien', 0, NOW(), 2),
       (3, 'Ricebowl', 'becode', 'Sandrine', 'Le', 'sandrinele@gmail.com', 'Admin Ricebowl', 0, NOW(), 2),
       (4, 'Esclave', 'becode', 'Peon', 'Peon', 'peonpeon@gmail.com', 'membre peon', 0, NOW(), 0);

INSERT INTO `categories` (`categoryId`, `categoryName`)
VALUES (1, 'Introduction'),
       (2, 'Coffee Stories'),
       (3, 'Resources');

INSERT INTO `boards` (`boardId`, `boardName`, `boardDescription`, `boardImage`, `categoryId`)
VALUES (1, 'General', 'A ton of great and helpful information to get you started', NULL, '1'),
       (2, 'Development', 'Tell us about yourself and learn about others\r\n\r\n', NULL, '1'),
       (3, 'Smalltalk', 'Discussions about every problems with a cup of coffee', NULL, '1'),
       (4, 'Events', 'Find out about the latest events near you', NULL, '1');

INSERT INTO `topics` (`topicId`, `topicSubject`, `topicDate`, `topicDateUpdate`, `topicImage`, `topicBoard`, `topicBy`)
VALUES (1, 'Rules of the forum', NOW(), NOW(), 'nonew.jpg', 1, 3),
       (2, 'Disclaimer', NOW(), NOW(), 'locked.jpg', 1, 2),
       (3, 'Q and A : ask your question', NOW(), NOW(), 'new.jpg', 1, 1),
       (4, 'Announcement', NOW(), NOW(), 'new.jpg', 1, 3);

INSERT INTO `posts` (`postId`, `postContent`, `postDate`, `postDateUpdate`, `postDeleted`, `postTopic`, `postBy`)
VALUES (1, 'Hello World', NOW(), NOW(), 0, '1', 1),
       (2, 'Salut toi', NOW(), NOW(), 0, '4', 2),
       (3, 'Ah que coucou Bastien', NOW(), NOW(), 0, '3', 3),
       (4, 'Bon anniversaire Tanya', NOW(), NOW(), 0, '2', 4);