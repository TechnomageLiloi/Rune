create table rune
(
	rid varchar(250) not null,
	title varchar(100) not null,
	program text not null,
	status tinyint unsigned default 1 not null,
	data json not null,
	constraint rune_pk
		primary key (rid)
);