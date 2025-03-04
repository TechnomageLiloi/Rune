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

CREATE TABLE rune_quests
(
    key_quest varchar(250) not null,
    key_map varchar(666) not null,
    title varchar(250) NOT NULL,
    type tinyint(3) unsigned NOT NULL,
    program json NOT NULL,
    dialog text NOT NULL,
    PRIMARY KEY (key_quest, key_map),
    foreign key (key_map) references rune_maps(key_map)
        on update cascade on delete cascade
);

create table rune_crystals
(
    key_crystal timestamp not null,
    key_quest varchar(250) not null,
    key_map varchar(666) not null,
    data json not null,
    constraint rune_crystals_pk
        primary key (key_crystal),
    constraint rune_crystals_rune_maps_rid_fk
        foreign key (key_map) references rune_maps (key_map)
            on update cascade on delete cascade,
    constraint rune_crystals_rune_quests_key_quest_fk
        foreign key (key_quest, key_map) references rune_quests (key_quest, key_map)
            on update cascade on delete cascade
);