<?php
class Head
{
    public function __construct($cssFile)
    {
        echo '<!DOCTYPE html>
        <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Slapping - Le média qui claque</title>
            <link rel="stylesheet" href="assets/css/style.min.css">
            <link rel="stylesheet" href="assets/css/compte.min.css">
            ' . $cssFile . '
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Quicksand&family=Pathway+Extreme&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" 
            integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
            <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;500;900&display=swap" rel="stylesheet">
        </head>';
    }
}
