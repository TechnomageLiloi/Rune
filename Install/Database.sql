create table rune_atoms
(
	key_atom varchar(250) not null,
	title varchar(100) not null,
	program text not null,
	status tinyint unsigned default 1 not null,
	data json not null,
	wiki text not null,
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

create table rune_road
(
    key_step timestamp not null,
    summary text null,
    data json not null,
    constraint rune_road_pk
        primary key (key_step)
);
