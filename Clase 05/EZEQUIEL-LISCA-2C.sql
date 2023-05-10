--Insertar datos en tabla 'productos'
/*
INSERT INTO productos (id,codigo_de_barra,nombre,tipo,stock,precio,fecha_de_creacion,fecha_de_modificacion) VALUES
(1001,77900361,"Westmacott","liquido",33,15.87,'2021/2/9','2020/9/26'),
(1002,77900362,"Spirit","solido",45,69.74,'2020/9/18','2020/4/14'),
(1003,77900363,"Newgrosh","polvo",14,68.19,'2020/11/29','2021/2/11'),
(1004,77900364,"McNickle","polvo",19,53.51,'2020/11/28','2020/4/17'),
(1005,77900365,"Hudd","solido",68,26.56,'2020/12/19','2020/6/19'),
(1006,77900366,"Schrader","polvo",17,96.54,'2020/8/2','2020/4/18'),
(1007,77900367,"Bachellier","solido",59,69.17,'2021/1/30','2020/6/7'),
(1008,77900368,"Fleming","solido",38,66.77,'2020/10/26','2020/10/3'),
(1009,77900369,"Hurry","solido",44,43.01,'2020/7/4','2020/5/30'),
(1010,77900310,"Krauss","polvo",73,35.73,'2021/3/3','2020/8/30');

--Insertar datos en tabla 'usuarios'
INSERT INTO usuarios (id,nombre,apellido,clave,mail,fecha_de_registro,localidad) VALUES
(101,"Esteban","Madou",2345,"dkantor0@example.com",'2021/7/1',"Quilmes"),
(102,"German","Gerram",1234,"ggerram1@hud.gov",'2020/8/5',"Berazategui"),
(103,"Deloris","Fosis",5678,"bsharpe2@wisc.edu",'2020/11/28',"Avellaneda"),
(104,"Brok","Neiner",4567,"bblazic3@desdev.cn",'2020/8/12',"Quilmes"),
(105,"Garrick","Brent",6789,"gbrent4@theguardian.com",'2020/12/17',"Moron"),
(106,"Bili","Baus",0123,"bhoff5@addthis.com",'2020/11/27',"Moreno");

--Insertar datos en tabla 'ventas'
INSERT INTO ventas (id_producto,id_usuario,cantidad,fecha_de_venta) VALUES
(1001,101,2,'2020/7/19'),
(1008,102,3,'2020/8/16'),
(1007,102,4,'2021/1/24'),
(1006,103,5,'2021/1/14'),
(1003,104,6,'2021/3/20'),
(1005,105,7,'2021/2/22'),
(1003,104,6,'2020/12/2'),
(1003,106,6,'2020/6/10'),
(1002,106,6,'2021/2/4'),
(1001,106,1,'2020/5/17');
*/

--1. Obtener los detalles completos de todos los usuarios, ordenados alfabéticamente.
SELECT * FROM `usuarios` ORDER BY id;

--2. Obtener los detalles completos de todos los productos líquidos.
SELECT * FROM `productos` WHERE tipo = "liquido";

--3. Obtener todas las compras en los cuales la cantidad esté entre 6 y 10 inclusive.
SELECT * FROM `ventas` WHERE cantidad>=6 AND cantidad<=20;

--4. Obtener la cantidad total de todos los productos vendidos.
SELECT SUM(cantidad) FROM `ventas`;

--5. Mostrar los primeros 3 números de productos que se han enviado.
SELECT id_producto FROM `ventas` ORDER BY fecha_de_venta DESC LIMIT 3; 

--6. Mostrar los nombres del usuario y los nombres de los productos de cada venta.
SELECT usuarios.nombre, productos.nombre FROM ventas INNER JOIN usuarios ON ventas.id_usuario = usuarios.id
INNER JOIN productos ON ventas.id_producto = productos.id;

--7. Indicar el monto (cantidad * precio) por cada una de las ventas.
SELECT (ventas.cantidad*productos.precio) FROM ventas INNER JOIN productos ON ventas.id_producto = productos.id;

--8. Obtener la cantidad total del producto 1003 vendido por el usuario 104.
SELECT SUM(cantidad) FROM ventas WHERE id_producto = 1003 AND id_usuario = 104;

--9. Obtener todos los números de los productos vendidos por algún usuario de ‘Avellaneda’.
SELECT ventas.id_producto FROM ventas INNER JOIN usuarios ON ventas.id_usuario = usuarios.id WHERE usuarios.localidad = "Avellaneda";

--10.Obtener los datos completos de los usuarios cuyos nombres contengan la letra ‘u’.
SELECT * FROM usuarios WHERE nombre LIKE '%u%';

--11. Traer las ventas entre junio del 2020 y febrero 2021.
SELECT * FROM `ventas` WHERE fecha_de_venta BETWEEN '2020/6/1' AND '2021/2/28';

--12. Obtener los usuarios registrados antes del 2021.
SELECT * FROM `usuarios` WHERE fecha_de_registro < '2021/1/1';

--13.Agregar el producto llamado ‘Chocolate’, de tipo Sólido y con un precio de 25,35.
INSERT INTO productos (nombre,tipo,precio) VALUES ('Chocolate','solido',25.35);

--14.Insertar un nuevo usuario .
INSERT INTO usuarios (nombre,apellido,clave,mail,fecha_de_registro,localidad) VALUES ("Ezequiel","Lisca",1234,"ezequiel.lisca@live.com","2023/4/25","Lomas de Zamora");

--15.Cambiar los precios de los productos de tipo sólido a 66,60.
UPDATE productos SET precio=66.60 WHERE tipo = "solido";

--16.Cambiar el stock a 0 de todos los productos cuyas cantidades de stock sean menores a 20 inclusive.
UPDATE productos SET stock=0 WHERE stock<=20;

--17.Eliminar el producto número 1010.
DELETE FROM productos WHERE id=1010;

--18.Eliminar a todos los usuarios que no han vendido productos.
DELETE FROM usuarios WHERE NOT EXISTS (SELECT id_usuario FROM ventas WHERE id_usuario=usuarios.id);