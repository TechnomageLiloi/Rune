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
		primary key (key_hour, key_quarter),
	constraint rune_jobs_rune_road_key_day_fk
		foreign key (key_day) references rune_road (key_day)
			on update cascade on delete cascade
);

