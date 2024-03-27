create table rune_config
(
    key_config varchar(100) not null,
    data json not null,
    constraint rune_config_pk
        primary key (key_config)
);

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

INSERT INTO rune_atoms (key_atom, title, status, type, summary, program, data, tags, ts) VALUES (0x72756E65, 0x526F6F74, 4, 1, 0x2D, 0x2D, '{}', 0x2D, '2024-03-27 10:25:33');

CREATE TABLE `rune_questions` (
    `key_question` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `key_atom` varchar(250) not null,
    `title` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
    `status` tinyint(3) unsigned NOT NULL DEFAULT '1',
    `type` tinyint(3) unsigned NOT NULL,
    `program` json NOT NULL,
    `theory` text COLLATE utf8mb4_unicode_ci NOT NULL,
    `tags` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
    `dt` timestamp NOT NULL,
    `data` json NOT NULL,
    `power` tinyint(3) unsigned NOT NULL DEFAULT '1',
    PRIMARY KEY (`key_question`)
);

alter table rune_questions
    add constraint rune_questions_rune_suites_key_suite_fk
        foreign key (key_atom) references rune_atoms (key_atom)
            on update cascade on delete cascade;