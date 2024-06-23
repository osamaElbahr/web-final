create schema if not exists `trojn_blog`;
use `trojn_blog`;

create table if not exists users (
`id` int primary key auto_increment,
`lastName` varchar(255) not null,
`firstName` varchar(255) not null,
`email` varchar(255) not null unique,
`password` varchar(255) not null,
`phone` varchar(15),
`created_at` timestamp default current_timestamp,
`updeted_at` timestamp default current_timestamp
);

create table if not exists posts (
`id` int primary key auto_increment,
`title` varchar(255) not null,
`content` text not null,
`img` varchar(255),
`user_id` int,
constraint fk_posts_users foreign key (user_id) references users(id)
on delete cascade
on update cascade
);

create table if not exists comments (
`id` int primary key auto_increment,
`comment` text,
`created_at` timestamp default current_timestamp,
`updeted_at` timestamp default current_timestamp,
`user_id` int,
`post_id` int,
constraint fk_users_comment foreign key (user_id) references users(id)
on delete cascade
on update cascade,
constraint fk_post_comment foreign key (post_id) references posts(id)
on delete cascade
on update cascade
);


