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
