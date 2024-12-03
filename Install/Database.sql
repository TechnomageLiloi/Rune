-- @todo: rename rune_exams_inventory to rune_exams_items

create table rune_atoms
(
	key_atom varchar(250) not null,
	title varchar(100) not null,
	status tinyint unsigned default 1 not null,
	type tinyint unsigned default 1 not null,
	data json not null,
	constraint rune_atoms_pk
		primary key (key_atom)
);

INSERT INTO rune_atoms (key_atom, title, program, status, data, wiki) VALUES ('rune', 'Root', '// Program', DEFAULT, '{}', '// Wiki');

create table rune_logs
(
	key_log bigint unsigned auto_increment,
	ts timestamp not null,
	tags varchar(1000) not null,
	data json not null,
	constraint rune_logs_pk
		primary key (key_log)
);

create table rune_config
(
    key_config varchar(100) not null,
    data json not null,
    constraint rune_config_pk
        primary key (key_config)
);

create table rune_diary_road
(
    key_step date not null,
    summary text null,
    data json not null,
    constraint rune_road_pk
        primary key (key_step)
);

create table rune_diary_jobs
(
    key_job time not null,
    key_step date not null,
    title varchar(100) not null,
    type tinyint unsigned default 1 not null,
    status tinyint unsigned default 1 not null,
    karma smallint signed default 0 not null,
    constraint rune_diary_jobs_pk
        primary key (key_job, key_step),
    constraint rune_diary_jobs_rune_diary_road_key_step_fk
        foreign key (key_step) references rune_diary_road (key_step)
            on update cascade on delete cascade
);

create table rune_quests
(
    key_quest bigint unsigned auto_increment,
    summary text null,
    data json not null,
    status tinyint unsigned default 1 not null,
    dt timestamp null,
    constraint rune_quests_pk
        primary key (key_quest)
);

INSERT INTO rune_quests (summary, data) VALUES ('First quest', '{}', 2);

create table rune_quests_tickets
(
    key_ticket timestamp not null,
    key_quest bigint unsigned,
    title varchar(100) not null,
    constraint rune_quests_tickets_pk
        primary key (key_ticket, key_quest),
    constraint rune_quests_tickets_rune_quests_key_quest_fk
        foreign key (key_quest) references rune_quests (key_quest)
            on update cascade on delete cascade
);

create table rune_artifacts
(
    key_artifact timestamp not null,
    key_atom varchar(250) not null,
    type tinyint unsigned default 1 not null,
    title varchar(250) not null,
    description text not null,
    global varchar(250) not null,
    local varchar(250) not null,
    data json not null,
    constraint rune_artifacts_pk
        primary key (key_artifact),
    constraint rune_artifacts_rune_rid_fk
        foreign key (key_atom) references rune_atoms(key_atom)
            on update cascade on delete cascade
);

CREATE TABLE rune_exams_inventory (
    key_item timestamp not null,
    `key_atom` varchar(250) not null,
    `title` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
    `type` tinyint(3) unsigned NOT NULL,
    `program` text NOT NULL,
    `dt` timestamp NOT NULL,
    data json not null,
    PRIMARY KEY (key_item),
    foreign key (key_atom) references rune_atoms (key_atom)
      on update cascade on delete cascade
);

CREATE TABLE rune_exams_questions (
    `key_question` timestamp NOT NULL,
    `key_item` timestamp not null,
    `title` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
    `status` tinyint(3) unsigned NOT NULL DEFAULT '1',
    `type` tinyint(3) unsigned NOT NULL,
    `program` text NOT NULL,
    `theory` text COLLATE utf8mb4_unicode_ci NOT NULL,
    `tags` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
    `dt` timestamp NOT NULL,
    done bit default false not null,
    PRIMARY KEY (`key_question`),
    foreign key (key_item) references rune_exams_inventory (key_item)
      on update cascade on delete cascade
);

create table rune_cards
(
    key_card bigint unsigned auto_increment,
    title varchar(250) not null,
    status tinyint unsigned not null,
    program text null,
    constraint rune_cards_pk
        primary key (key_card)
);

create table rune_business_imperials
(
    key_imperial bigint unsigned auto_increment,
    title varchar(250) not null,
    status tinyint unsigned not null,
    program text null,
    credits bigint signed not null default 0,
    mul float default '1.0' not null,
    constraint rune_business_imperials_pk
        primary key (key_imperial)
);

create table rune_degrees
(
    key_degree tinyint unsigned auto_increment,
    title varchar(250) not null,
    status tinyint unsigned not null,
    program text null,
    resource varchar(50) not null default 'Wool',
    goal varchar(250) not null default '-',
    constraint rune_degrees_pk
        primary key (key_degree)
);

INSERT INTO `rune_degrees` VALUES (1,_binary 'Dreamer',3,_binary '## Dreamer',_binary 'Gold'),(2,_binary 'Bion',1,_binary '## Bion',_binary 'Rubies'),(3,_binary 'Prior',1,_binary '## Prior',_binary 'Emeralds'),(4,_binary 'Mentat',1,_binary '## Mentat',_binary 'Sapphires'),(5,_binary 'Master',1,_binary '## Master',_binary 'Artifacts'),(6,_binary 'Teacher',1,_binary '## Teacher',_binary 'Protocols'),(7,_binary 'Father',1,_binary '## Father',_binary 'Horcruxes');

create table rune_diary_problems
(
    key_problem datetime not null,
    key_degree tinyint unsigned default 1 not null,
    summary text null,
    constraint rune_diary_problems_pk
        primary key (key_problem),
    constraint rune_diary_problems_rune_degrees_key_degree_fk
        foreign key (key_degree) references rune_degrees (key_degree)
            on update cascade on delete cascade
);

create table rune_degrees_lessons
(
    key_lesson bigint unsigned auto_increment,
    key_degree tinyint unsigned not null,
    title varchar(250) not null,
    status tinyint unsigned not null,
    program text not null,
    constraint rune_degrees_lessons_pk
        primary key (key_lesson),
    constraint rune_degrees_lessons_rune_degrees_key_degree_fk
        foreign key (key_degree) references rune_degrees (key_degree)
            on update cascade on delete cascade
);

create table rune_npcs
(
    key_npc bigint unsigned auto_increment,
    key_atom varchar(250) not null,
    title varchar(250) not null,
    description text not null,
    status tinyint unsigned not null,
    type tinyint unsigned not null,
    data json not null,
    constraint rune_npcs_pk
        primary key (key_npc),
    foreign key (key_atom) references rune_atoms (key_atom)
        on update cascade on delete cascade
);

INSERT INTO rune_npcs (key_atom, title, description, status, type, data) VALUES (0x72756E65, 0x54656163686572, 0x596F757220546561636865722E, 1, 1, '{}');

create table rune_topics
(
    key_topic bigint unsigned auto_increment,
    key_atom varchar(250) not null,
    title varchar(100) not null,
    summary text not null,
    tags varchar(100) not null,
    dt timestamp not null,
    data json not null,
    status tinyint unsigned default 1 not null,
    constraint rune_topics_pk
        primary key (key_topic),
    constraint rune_topics_rune_atoms_key_atom_fk
        foreign key (key_atom) references rune_atoms (key_atom)
            on update cascade on delete cascade
);

-- ---------------------------------------------------------------------------------------

create table rune_scrolls
(
    key_scroll bigint unsigned auto_increment,
    key_atom varchar(250) not null,
    title varchar(100) not null,
    scroll text not null,
    constraint rune_scrolls_pk
        primary key (key_scroll),
    constraint rune_scrolls_rune_atoms_key_atom_fk
        foreign key (key_atom) references rune_atoms (key_atom)
            on update cascade on delete cascade
);

create table rune_maps
(
	key_map bigint unsigned auto_increment,
	id_map varchar(250) not null,
	title varchar(100) not null,
	map text not null,
	objects json not null,
	constraint rune_maps_pk
		primary key (key_map)
);

create unique index rune_maps_id_map_uindex
	on rune_maps (id_map);

