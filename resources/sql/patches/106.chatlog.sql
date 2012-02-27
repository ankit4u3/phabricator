CREATE DATABASE IF NOT EXISTS phabricator_chatlog;
CREATE TABLE phabricator_chatlog.chatlog_event (
  id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  channel VARCHAR(64) BINARY NOT NULL,
  epoch INT UNSIGNED NOT NULL,
  author VARCHAR(64) BINARY NOT NULL,
  type VARCHAR(4) NOT NULL,
  message LONGBLOB NOT NULL,
  loggedByPHID VARCHAR(64) BINARY NOT NULL,
  KEY (channel, epoch)
);