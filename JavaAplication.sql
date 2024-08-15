-- Verificar si existe la base de datos para borrarla
DROP DATABASE IF EXISTS dbcitas;

/* CREACION DE BASE DE DATOS*/
CREATE DATABASE dbcitas;
USE dbcitas;

/* TABLAS DE LA BASE DE DATOS*/
create table Medicos(
MedIdentificacion char(10) not null,
MedNombres varchar(50) not null,
MedApellidos varchar(50) not null,
primary key (MedIdentificacion)
);

create table Pacientes(
PacIdentificacion char(10) not null,
PacNombres varchar(50) not null,
PacApellidos varchar(50) not null,
PacFechaNacimiento date not null,
PacSexo enum('M','F') not null,
primary key(PacIdentificacion)
);

create table Consultorios(
ConNumero int(3) not null,
ConNombre varchar(50) not null,
primary key(ConNumero)
);

create table Tratamientos(
TraNumero int auto_increment,
TraFechaAsignado date not null,
TraDescripcion text not null,
TraFechaInicio date not null,
TraFechaFin date not null,
TraValor double not null,

TraPaciente char(10) not null,
primary key( TraNumero ),
foreign key ( TraPaciente ) references Pacientes ( PacIdentificacion )
);

CREATE TABLE citas (
CitNumero int AUTO_INCREMENT,
CitFecha date NOT NULL,
CitHora varchar(10) NOT NULL,
CitPaciente char(10) NOT NULL,
CitMedico char(10) NOT NULL,
CitConsultorio int(3) NOT NULL,
CitEstado enum('Asignada','Cumplida','Cancelada') NOT NULL DEFAULT 'Asignada',
PRIMARY KEY (CitNumero),
FOREIGN KEY (CitPaciente) REFERENCES Pacientes (PacIdentificacion),
FOREIGN KEY (CitMedico) REFERENCES Medicos (MedIdentificacion),
FOREIGN KEY (CitConsultorio) REFERENCES Consultorios (ConNumero)
);

create table Usuarios (
Identificacion int not null,
Nombres varchar(50) not null,
Apellidos varchar(50) not null,
Correo varchar(40) null,
primary key (Identificacion)
);

-- /INSERTAR INFORMACION ALA TABLA USUARIOS/
insert into Usuarios(Identificacion, Nombres, Apellidos, Correo)
values (10278, 'Edinson','Martinez Mora','edi@gmail.com'),

(70529, 'Andres Felipe','Paternina Meneses','pipe@hotmail.com');

-- /INSERTAR INFORMACION ALA TABLA PACIENTE/

insert into pacientes(PacIdentificacion, PacNombres, PacApellidos, PacFechaNacimiento, PacSexo)
values('91222333', 'CARLOS JESUS','RODRIGUEZ CAlA','1970-01-03','M');

-- /INSERTAR INFORMACION ALA TABLA TRATAMIENTO/

insert into tratamientos(TraFechaAsignado, TraDescripcion, TraFechaInicio, TraFechaFin,TraValor,TraPaciente)
values('2017-07-13','Tratamiento de conductos','2017-08-01','2017-08-03',45000.00,'91222333');