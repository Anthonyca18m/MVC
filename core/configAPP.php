<?php 
    const DB_NAME = "cotizadorweb";
    const DB_HOST = "localhost";
    const DB_USER = "root";
    const DB_PASS = ""; 

    const SGBD = "mysql:host=".DB_HOST."; dbname=".DB_NAME;

//TOCAR SOLO UNA SOLA VEZ SI ES NECESARIO SINO NO LO TOQUE
    const SECRET_KEY    = "990301"; 
    const SECRET_IV     = '864879?51!45saBswa3$sbwm@2019mC';
    const METHOD        = "AES-256-CBC";