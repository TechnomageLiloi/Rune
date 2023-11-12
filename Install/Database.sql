create table rune_atoms
(
    key_atom varchar(250) not null,
    title varchar(250) not null,
    status tinyint unsigned default 1 not null,
    type tinyint unsigned not null,
    summary text not null,
    program mediumtext not null,
    data json not null,
    tags varchar(100) not null,
    ts timestamp not null,
    constraint rune_atoms_pk
        primary key (key_atom)
);

-- EXAMS

create table rune_questions
(
    key_question bigint unsigned auto_increment,
    title varchar(250) not null,
    status tinyint unsigned default 1 not null,
    type tinyint unsigned not null,
    program json not null,
    theory text not null,
    tags varchar(100) not null,
    dt timestamp not null,
    data json not null,
    constraint artifacts_questions_pk
        primary key (key_question)
);

-- TARDIS

CREATE TABLE `rune_logs` (
                             `key_log` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
                             `title` varchar(1000) NOT NULL,
                             `data` json NOT NULL,
                             PRIMARY KEY (`key_log`)
);

CREATE TABLE `rune_config` (
                               `key_config` varchar(100) NOT NULL,
                               `param` json NOT NULL,
                               PRIMARY KEY (`key_config`)
);

CREATE TABLE `rune_diary` (
                              `key_day` date NOT NULL,
                              `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
                              `program` text COLLATE utf8mb4_unicode_ci NOT NULL,
                              `data` json NOT NULL,
                              `status` tinyint unsigned not null default 1,
                              `type` tinyint unsigned not null default 1,
                              `start` timestamp not null,
                              `finish` timestamp not null,
                              PRIMARY KEY (`key_day`)
);

create table rune_degrees
(
    key_degree bigint unsigned auto_increment,
    uid varchar(100) not null,
    title varchar(250) null,
    program text null,
    status tinyint unsigned not null,
    constraint rune_degrees_pk
        primary key (key_degree)
);

create unique index rune_degrees_uid_uindex
    on rune_degrees (uid);

insert into rune_degrees(uid, title, program, status) values("protos", "Protos", "-", 1);

create table rune_problems
(
    key_problem bigint unsigned auto_increment,
    key_degree bigint unsigned not null,
    title varchar(250) not null,
    program text not null,
    type tinyint unsigned not null,
    status tinyint unsigned default 1 not null,
    mark tinyint unsigned default 0 not null,
    constraint rune_problems_pk
        primary key (key_problem),
    constraint rune_problems_rune_degrees_key_degree_fk
        foreign key (key_degree) references rune_degrees (key_degree)
            on update cascade on delete cascade
);

create table rune_lessons
(
    key_lesson bigint unsigned auto_increment,
    key_problem bigint unsigned not null,
    comment varchar(250) not null,
    mark tinyint unsigned default 0 not null,
    status tinyint unsigned default 1 not null,
    start timestamp not null,
    finish timestamp not null,
    data json not null,
    constraint rune_lessons_pk
        primary key (key_lesson),
    constraint rune_lessons_rune_problems_key_problem_fk
        foreign key (key_problem) references rune_problems (key_problem)
            on update cascade on delete cascade
)