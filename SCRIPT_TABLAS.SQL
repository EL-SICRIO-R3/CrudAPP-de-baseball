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
  Status int(1) default 1,
	
  FOREIGN KEY(IDLiga) REFERENCES Ligas(IDLiga)
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

CREATE TABLE Parques(
  IDCampo int(4) PRIMARY KEY,
  Descripcion varchar(120)
);

CREATE TABLE Ampayers(
  IDAmpayer int(4) PRIMARY KEY,
  Nombre varchar(20),
  Apellidos varchar(30),
  Fecha date,
  CURP varchar(18),
  Abreviacion varchar(120),
  Status int(1)
);

/* ----------------PRUEBAS------------------*/
CREATE TABLE Manejadores(
  IDTecnico int(4) PRIMARY KEY,
  Nombre varchar(120),
  Tipo varchar(120)
);

CREATE TABLE Equipos(
  IDEquipo int(4) PRIMARY KEY,
  Nombre varchar(20),
  IDLogo int,
  Ciudad varchar(30),
  IDTecnico int(4),

  FOREIGN KEY(IDTecnico) REFERENCES Manejadores(IDTecnico)
);

CREATE TABLE Avisos(
  IDAviso int(4) PRIMARY KEY,
  Aviso varchar(300)
);
 
CREATE TABLE Juegos(
  IDJuego int PRIMARY KEY,
  IDtemporada Int,
  Jornada int,
  IDCampo int,
  Fecha date,
  Hora time,
  Clima varchar(30),
  IDEquipoVisitante int(4),
  IDEquipoLocal int(4),
  Final varchar(150),
  IDAviso int,
  ErroresLocal int,
  ErroresVisitante int,
  CarrerasLocal int,
  CarrerasVisitante int,
  HitsLocal int,
  HitsVisitante int,

  FOREIGN KEY(IDTemporada) REFERENCES Temporadas(IDTemporada),
  FOREIGN KEY(IDCampo) REFERENCES Parques(IDCampo),
  FOREIGN KEY(IDEquipoVisitante) REFERENCES Equipos(IDEquipo),
  FOREIGN KEY(IDEquipoLocal) REFERENCES Equipos(IDEquipo),
  FOREIGN KEY(IDAviso) REFERENCES Avisos(IDAviso)
);

CREATE TABLE Entradas(
  IDJuego int,
  IDInning int,
  CarrerasLocal int,
  CarrerasVisitante int

  FOREIGN KEY(IDJuego) REFERENCES Juegos(IDJuego)

);

CREATE TABLE AmpayersJuego(
  IDJuego int,
  IDAmpayer int,
  Ubicacion varchar(150),

  FOREIGN KEY(IDJuego) REFERENCES Juegos(IDJuego),
  FOREIGN KEY(IDAmpayer) REFERENCES Ampayers(IDAmpayer)
);

CREATE TABLE Rosters (
  IDRoster int(11) NOT NULL,
  IDEquipo int(11) DEFAULT NULL,
  IDTemporada int(11) DEFAULT NULL,
  IDAfiliacion int(11) DEFAULT NULL,

  FOREIGN KEY(IDEquipo) REFERENCES Equipos(IDEquipo),
  FOREIGN KEY(IDTemporada) REFERENCES Temporadas(IDTemporada),
  FOREIGN KEY(IDAfiliacion) REFERENCES Jugadores(IDAfiliacion)
);