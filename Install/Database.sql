create table rune
(
	rid varchar(666) not null,
	title varchar(250) not null,
	article mediumtext not null,
	data json not null,
	dt timestamp not null,
	constraint rune_pk
		primary key (rid)
);

