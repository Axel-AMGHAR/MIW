
<h1>Liste des Livres : </h1>
<?php
    foreach ($livres as $livre) {
        ?>

        <ul>
            <li><?php echo  $livre['nom']?> / <a href="http://localhost:8080/MIW/PHP/MVC/livre/detail?id_livre=<?php echo $livre['id']?>">détail livre</a></li>
        </ul>

     <?php
    }
    ?>