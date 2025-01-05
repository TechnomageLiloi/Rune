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

create table rune_databank
(
	rid varchar(250) not null,
	status tinyint unsigned not null default 1,
	type tinyint unsigned not null,
	title varchar(100) not null,
	summary text not null,
	map text not null,
	data json not null,
    drive varchar(250) default '/' not null,
	constraint rune_databank_pk
		primary key (rid)
);

INSERT INTO `rune_databank` VALUES ('portal',1,1,'Portal astral pocket', 'Portal astral pocket', '[[[start]]]\nAstral pocket\n[[[/]]]','{}','/');

-- ---------------------------------------------------------------------------------------------------------------------

create table rune_levels
(
    key_level tinyint unsigned auto_increment,
    title varchar(250) not null,
    status tinyint unsigned not null,
    program text null,
    goal varchar(250) not null default '-',
    constraint rune_levels_pk
        primary key (key_level)
);

INSERT INTO rune_levels (title, status, program, goal) VALUES (0x4E656D6F, 1, '-', DEFAULT);

create table rune_road
(
    key_day date,
    program text null,
    goal varchar(250) not null default '-',
    constraint rune_road_pk
        primary key (key_day)
);

create table rune_jobs
(
	key_hour tinyint unsigned not null,
	key_quarter tinyint unsigned not null,
	key_day date not null,
	goal varchar(250) not null,
	status tinyint unsigned default 1 not null,
	xp smallint signed default 0 not null,
	constraint rune_jobs_pk
		primary key (key_hour, key_quarter, key_day),
	constraint rune_jobs_rune_road_key_day_fk
		foreign key (key_day) references rune_road (key_day)
			on update cascade on delete cascade
);

-- -----------------------------------------------------------------------------------------------------------

create table rune_quests
(
    key_quest bigint unsigned auto_increment,
    key_level tinyint unsigned,
    summary text null,
    data json not null,
    status tinyint unsigned default 1 not null,
    dt timestamp null,
    xp smallint unsigned default 0 not null,
    constraint rune_quests_pk
        primary key (key_quest),
    constraint rune_quests_rune_levels_key_level_fk
        foreign key (key_level) references rune_levels (key_level)
            on update cascade on delete cascade
);

create table rune_tickets
(
    key_ticket tinyint unsigned,
    key_quest bigint unsigned,
    title varchar(100) not null,
    status tinyint unsigned default 1 not null,
    constraint rune_tickets_pk
        primary key (key_ticket, key_quest),
    constraint rune_tickets_rune_quests_key_quest_fk
        foreign key (key_quest) references rune_quests (key_quest)
            on update cascade on delete cascade
);

create table rune_items
(
	key_item bigint unsigned auto_increment,
	rid varchar(250) null,
	type tinyint unsigned not null,
	title varchar(100) not null,
	description text not null,
	x smallint unsigned not null,
	y smallint unsigned not null,
	data json not null,
	constraint rune_items_pk
		primary key (key_item),
	constraint rune_items_rune_databank_rid_fk
		foreign key (rid) references rune_databank (rid)
			on update cascade on delete cascade
);

CREATE TABLE rune_opponents
(
    key_opponent varchar(250) not null,
    rid varchar(250) not null,
    specie smallint unsigned NOT NULL,
    title varchar(250) NOT NULL,
    type tinyint(3) unsigned NOT NULL,
    program json NOT NULL,
    theory text NOT NULL,
    PRIMARY KEY (key_opponent, rid),
    foreign key (rid) references rune_databank(rid)
        on update cascade on delete cascade
);

create table rune_teacher
(
	key_dialog timestamp not null,
	teacher bool default true not null,
	dialog text not null,
	constraint rune_teacher_pk
		primary key (key_dialog)
);

create table rune_crystals
(
    key_crystal timestamp not null,
    key_opponent varchar(250) not null,
    rid varchar(250) not null,
    status tinyint unsigned default 1 not null,
    data json not null,
    constraint rune_crystals_pk
        primary key (key_crystal),
    constraint rune_crystals_rune_databank_rid_fk
        foreign key (rid) references rune_databank (rid)
            on update cascade on delete cascade,
    constraint rune_crystals_rune_opponents_key_opponent_fk
        foreign key (key_opponent) references rune_opponents (key_opponent)
            on update cascade on delete cascade
);

