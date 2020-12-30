<?php

function connect()
{

     try {
          $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
          $conexion = new PDO('DB_DSN.",".DB_USER.",".DB_PASSWD');
     } catch (PDOException $ex) {
          echo $ex->getMessage();
     }
}
