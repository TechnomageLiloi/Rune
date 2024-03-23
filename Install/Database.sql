create table rune_atoms
(
    key_atom timestamp not null,
    type tinyint unsigned default 1 not null,
    title varchar(100) not null,
    summary text not null,
    data json not null,
    constraint rune_atoms_pk
        primary key (key_atom)
);
