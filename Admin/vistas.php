<?php 
CREATE VIEW camarero_usuario AS SELECT apellido,username,Password
FROM camarero,usuarios
WHERE camarero.id_camarero=usuarios.id_camarero;
?>