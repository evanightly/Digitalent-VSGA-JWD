drop database if exists digitalent_vsga_jwd;
create database digitalent_vsga_jwd;
use digitalent_vsga_jwd;
create table book (
    id int(15) primary key auto_increment,
    title varchar(50) not null,
    author varchar(50) not null,
    price decimal not null,
    image varchar(255)
);
insert into book (title, author, price)
values ('Twilight', 'Stephenie Meyer', 32),
    ('Darkfever', 'Karen Marie Moning', 51),
    ('Dead Until Dark', 'Charlaine Harris', 72),
    ('Marked', 'P.C. Cast', 55),
    ('Fallen', 'Lauren Kate', 62);