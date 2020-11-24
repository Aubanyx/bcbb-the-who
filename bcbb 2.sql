CREATE DATABASE IF NOT EXISTS bcbb;
CREATE USER 'bcbb-the-who'@'%' IDENTIFIED WITH mysql_native_password BY 'bcbb-the-who';
GRANT ALL ON bcbb.* TO 'bcbb-the-who';

USE bcbb;

-- mySQL Table structure
-- =====================

--
-- Structure de la table 'users'
--
DROP TABLE IF EXISTS users;
CREATE TABLE IF NOT EXISTS users (
userId          INT(8) NOT NULL AUTO_INCREMENT,
userNname       VARCHAR(30) NOT NULL,
userPass        VARCHAR(255) NOT NULL,
userFname       VARCHAR(64) NOT NULL,
userLname       VARCHAR(64) NOT NULL,
userEmail       VARCHAR(255) NOT NULL,
userSign        VARCHAR(255),
userOnline      BOOLEAN NOT NULL,
userDate        DATETIME NOT NULL,
userLevel       INT(8) NOT NULL,
UNIQUE INDEX userNameUnique (userNname),
UNIQUE INDEX userEmailUnique (userEmail),
PRIMARY KEY (userId)
) ENGINE=InnoDB CHARACTER SET utf8;

--
-- Structure de la table 'boards'
--
DROP TABLE IF EXISTS boards;
CREATE TABLE IF NOT EXISTS boards (
boardId             INT(8) NOT NULL AUTO_INCREMENT,
boardName           VARCHAR(255) NOT NULL,
boardDescription    VARCHAR(255),
boardImage          VARCHAR(255),
UNIQUE INDEX boardNameUnique (boardName),
PRIMARY KEY (boardId)
) ENGINE=InnoDB CHARACTER SET utf8;

--
-- Structure de la table 'topics'
--
DROP TABLE IF EXISTS topics;
CREATE TABLE IF NOT EXISTS topics (
topicId         INT(8) NOT NULL AUTO_INCREMENT,
topicSubject    VARCHAR(255) NOT NULL,
topicDate       DATETIME NOT NULL,
topicDateUpdate DATETIME NOT NULL,
topicImage      VARCHAR(255) NOT NULL,
topicBoard      INT(8) NOT NULL,
topicBy         INT(8) NOT NULL,
PRIMARY KEY (topicId)
) ENGINE=InnoDB CHARACTER SET utf8;

--
-- Structure de la table 'posts'
--
DROP TABLE IF EXISTS posts;
CREATE TABLE IF NOT EXISTS posts (
postId         INT(8) NOT NULL AUTO_INCREMENT,
postContent    TEXT NOT NULL,
postDate       DATETIME NOT NULL,
postDateUpdate DATETIME NOT NULL,
postDeleted    BOOLEAN NOT NULL,
postTopic      INT(8) NOT NULL,
postBy         INT(8) NOT NULL,
PRIMARY KEY (postId)
) ENGINE=InnoDB CHARACTER SET utf8;

-- link the topics to the categories first
ALTER TABLE topics
    ADD FOREIGN KEY(topicBoard) REFERENCES boards(boardId) ON DELETE CASCADE ON UPDATE CASCADE;

-- link the topics to the user who creates one.
ALTER TABLE topics
    ADD FOREIGN KEY(topicBy) REFERENCES users(userId) ON DELETE RESTRICT ON UPDATE CASCADE;

-- Link the posts to the topics:
ALTER TABLE posts
    ADD FOREIGN KEY(postTopic) REFERENCES topics(topicId) ON DELETE CASCADE ON UPDATE CASCADE;

-- And finally, link each post to the user who made it:
ALTER TABLE posts
    ADD FOREIGN KEY(postBy) REFERENCES users(userId) ON DELETE RESTRICT ON UPDATE CASCADE;