create table rune_maps
(
	key_map varchar(666) not null,
	title varchar(250) not null,
	data json not null,
	map mediumtext not null,
	dt timestamp not null,
	constraint rune_maps_pk
		primary key(key_map)
);

