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

INSERT INTO Jugadores (Nombre, Apellidos, Fecha, CURP, Posicion, Golpea, Tira, Pagina, Abreviacion, Status) VALUES
(230001,'Williams', 'Leyva Peiro', '07/10/2023', 'LDPW040229HBCYRLA6', 'P', 'Derecho', 'Derecho', 'will.com', 'abreviacion', 1)