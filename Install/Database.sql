create table rune
(
	rid varchar(250) not null,
	title varchar(100) not null,
	program text not null,
	status tinyint unsigned default 1 not null,
	data json not null,
	teacher text not null,
	constraint rune_pk
		primary key (rid)
);

INSERT INTO rune (rid, title, program, status, data, teacher) VALUES ('rune', 'Root', '[]', DEFAULT, '{}', '-');

create table rune_logs
(
	key_log bigint unsigned auto_increment,
	ts timestamp not null,
	tags varchar(1000) not null,
	data json not null,
	constraint rune_logs_pk
		primary key (key_log)
);