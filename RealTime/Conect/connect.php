<?php

try {
    $conn = new PDO('mysql:host=localhost; dbname=Realtime; charset=utf8','root','');
} catch (\Exception $e) {
    echo $e->getMessage();
}