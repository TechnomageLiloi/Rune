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
    summary text not null,
    status tinyint unsigned default 1,
    tags varchar(100) not null,
    ts timestamp not null,
    constraint rune_atoms_pk
        primary key (key_atom)
);