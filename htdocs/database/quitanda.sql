
DROP DATABASE IF EXISTS quitanda;

CREATE DATABASE quitanda CHARACTER SET utf8 COLLATE utf8_general_ci;

USE quitanda;

CREATE TABLE users (
    user_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    user_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    user_name VARCHAR(255) NOT NULL,
    user_email VARCHAR(255) NOT NULL,
    user_password VARCHAR(255) NOT NULL,
    user_birth DATE NOT NULL,
    user_bio TEXT,
    user_type ENUM('admin','user') DEFAULT 'user',
    user_status ENUM('on', 'off', 'deleted') DEFAULT 'on'
);

CREATE TABLE comments (
    cmt_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    cmt_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    cmt_author INT,
    cmt_article INT,
    cmt_content TEXT NOT NULL,
    cmt_status ENUM('on', 'off', 'deleted') DEFAULT 'on',
    FOREIGN KEY (cmt_author) REFERENCES users (user_id)
    );

CREATE TABLE contacts (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    subject VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    status ENUM('on', 'off', 'deleted') DEFAULT 'on'
);

INSERT INTO users (
    user_name,
    user_email,
    user_password,
    user_birth,
    user_bio,
    user_type
) VALUES (
    'Joca da Silva',
    'joca@silva.com',
    SHA1('12345_Qwerty'),
    '2000-10-14',
    'Comentador, organizador, enrolador e coach.',
    'admin'
), (
    'Marineuza Siriliano',
    'mari@neuza.com',
    SHA1('12345_Qwerty'),
    '1998-02-27',
    'Especialista, modelista, arquivista e cientista.',
    'user'
), (
    'Setembrino Trocatapas',
    'set@tapas.net',
    SHA1('12345_Qwerty'),
    '1982-12-01',
    'Especialista em caçar o Patolino.',
    'user'
), (
    'Hermenegilda Sanguesuga',
    'hernema@sangue.suga',
    SHA1('12345_Qwerty'),
    '2002-03-03',
    'Formada em controle de pragas transdimensionais.',
    'user'
), (
    'Josyswaldo Penalha',
    'josy@waldinho.atc',
    SHA1('12345_Qwerty'),
    '2009-11-15',
    'Motorista de Uber sem rodas.',
    'user'
), (
    'Genensiana Astasiana',
    'genesia@astasia.ana',
    SHA1('12345_Qwerty'),
    '2011-07-16',
    'Contrabandista de códigos fonte Clipper e Pascal.',
    'user'
);


INSERT INTO `comments` (
    `cmt_date`, `cmt_author`, `cmt_article`, `cmt_content`
) VALUES
(
    '2022-07-13 21:13:33',
    6,
    2, 
    'Tente uma, duas, três vezes e se possível tente a quarta, a quinta e quantas vezes for necessário. Só não desista nas primeiras tentativas, a persistência é amiga da conquista.\r\n\r\nSe você quer chegar aonde a maioria não chega, faça o que a maioria não faz.'
), (
    '2022-07-09 21:13:33', 
    1, 
    2, 
    'Hoje, o "eu não sei", se tornou o "eu ainda não sei".'
), (
    '2022-07-14 21:15:23', 
    4, 
    1, 
    'O sucesso é um professor traiçoeiro. Ele seduz pessoas inteligentes e as faz pensar que elas não podem perder tudo.'
);
