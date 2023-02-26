<?php
 $conexion=mysqli_connect('localhost', 'krokos', 'JUA752MAX423', 'krokos_final');
?>


<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Mostrar Datos</title>
</head>

<body>

<div class="table-responsive-md">
<table class="table table-hover table-striped">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nombre</th>
      <th scope="col">Mail</th>
      <th scope="col">Tema</th>
      <th scope="col">Mensaje</th>

    </tr>
  </thead>
  <tbody>
  <?php
        $sql="SELECT * from contactos";
        $result=mysqli_query($conexion,$sql);


        while($mostrar=mysqli_fetch_array($result)){
        ?>

        <tr>
            <td><?php echo $mostrar['id_contact'] ?></td>
            <td><?php echo $mostrar['name'] ?></td>
            <td><?php echo $mostrar['mail'] ?></td>
            <td><?php echo $mostrar['subject'] ?></td>
            <td><?php echo $mostrar['message'] ?></td>
        </tr>
        <?php
        }
        ?>
  </tbody>
</table>
</div>
</body>
</html> 