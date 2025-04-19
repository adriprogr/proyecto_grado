drop database if exists portal_noticias;

create database portal_noticias;

use portal_noticias;

Create table roles (
    id_rol int PRIMARY KEY AUTO_INCREMENT,
    rol varchar(20)
);

Create table usuarios (
	id_usuario int PRIMARY KEY AUTO_INCREMENT,
    nombre_usuario varchar(30),
    contraseña varchar(50),
    id_rol int,
    foreign key(id_rol) REFERENCES roles(id_rol)
);

Create table categorias (
    id_categoria int PRIMARY KEY AUTO_INCREMENT,
    categoria varchar(20)
);

Create table titulares(
	id_titular int PRIMARY KEY AUTO_INCREMENT,
    introduccion varchar(150),
    fecha date,
    Imagen varchar(250),
    id_categoria int,
    foreign key (id_categoria) references categorias (id_categoria)
);

Create table noticias(
	id_noticia int PRIMARY KEY AUTO_INCREMENT,
    titulo_1 varchar(150),
    fecha date,
    contenido_1 varchar(255),
    imagen varchar(255),
    titulo_2 varchar(150),
    contenido_2 varchar(255),
    contenido_3 varchar(255),
    imagen_2 varchar(255),
    titulo_3 varchar(150),
    contenido_4 varchar(255),
    contenido_5 varchar(255),
    id_titular int,
    foreign key(id_titular) REFERENCES titulares (id_titular)
);



Create table comentarios(
	id_comentarios int primary key AUTO_INCREMENT,
   	comentario text,
    id_categoria int,
    id_usuario int, 
    foreign key(id_categoria) REFERENCES categorias(id_categoria),
    foreign key(id_usuario) REFERENCES usuarios(id_usuario)
);




