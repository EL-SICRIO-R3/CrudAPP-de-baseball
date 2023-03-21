CREATE TABLE Jugadores(
  IDAfiliacion int(6) PRIMARY KEY,
  Nombre varchar(20),
  Apellidos varchar(30),
  Fecha date,
  CURP varchar(18),
  Posicion varchar(2),
  Golpea varchar(11),
  Tira varchar(11),
  Pagina varchar(120),
  Abreviacion varchar(120),
  Status int(1)
);

INSERT INTO Jugadores (IDAfiliacion, Nombre, Apellidos, Fecha, CURP, Posicion, Golpea, Tira, Pagina, Abreviacion, Status) VALUES
(230001,'Williams', 'Leyva Peiro', '07/10/2023', 'LDPW040229HBCYRLA6', 'P', 'Derecho', 'Derecho', 'will.com', 'abreviacion', 1)

CREATE TABLE Temporadas(
  IDTemporada int(6) PRIMARY KEY,
  IDLiga varchar(6),
  Grupo varchar(20),
  Categoria varchar(10),
  Momento varchar(20),
  Temporada int(4),
  Status int(1) default 1
);

INSERT INTO Temporadas values (180028, "RCV", "Novatas", "Varonil", "Amistoso", 2023, 1)

CREATE TABLE Ligas(
  IDLiga varchar(6) PRIMARY KEY,
  Descripcion varchar(100),
  Presidente varchar(50),
  Coordinador varchar(50),
  Mapa varchar(50),
  Direccion varchar(70),
  Telefono varchar(10),
  Redes varchar(30),
  Status int(1)  default 1
);

INSERT INTO Ligas VALUES ("RCV", "Club Deportivo RCV", "Lic. Jorge Torres", "Jorge Sosa", "111,222,333", "Avenida UAS", "6674158965", "https://facebook.com/rcv/", 1)