create table rune_atoms
(
    key_atom varchar(250) not null,
    title varchar(250) not null,
    status tinyint unsigned default 1 not null,
    type tinyint unsigned not null,
    summary text not null,
    program mediumtext not null,
    data json not null,
    tags varchar(100) not null,
    ts timestamp not null,
    constraint rune_atoms_pk
        primary key (key_atom)
);
