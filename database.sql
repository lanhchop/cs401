CREATE TABLE user (
user_id INT(1) AUTO_INCREMENT NOT NULL PRIMARY KEY,
name VARCHAR(256) NOT NULL,
username VARCHAR(128) NOT NULL UNIQUE,
password VARCHAR(64) NOT NULL,
);

CREATE TABLE event (
event_id INT(1) AUTO_INCREMENT NOT NULL PRIMARY KEY,
host_user_id INT(1) NOT NULL,
game VARCHAR(256) NOT NULL,
location VARCHAR(256) NOT NULL, 
date DATE NOT NULL,
players INT(1) NOT NULL,
);

CREATE TABLE schedule(
user_id INT(1) NOT NULL,
event_id INT(1) NOT NULL,
)

ALTER TABLE schedule
ADD CONSTRAINT schedule_unique UNIQUE(user_id, event_id);