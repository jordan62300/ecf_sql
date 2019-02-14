# The database contains 4 tables 

## Tables

serie :

- id
- serie_name
- serie_genre

users :

- id
- name

platform : 

- id
- platform_name

genre :

- id
- genre_name

## Relation between the tables

- serie (ManyToMany) user
- serie (ManyToMany) genre
- serie (ManyToMany) platform

