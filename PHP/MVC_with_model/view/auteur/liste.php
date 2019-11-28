<!doctype html>
<head>
    <meta charset="UTF-8">
    <style>*{padding:0;margin:0}table{background:#fff;border-radius:3px;border-collapse:collapse;height:320px;margin:auto;max-width:600px;padding:5px;width:100%;box-shadow:0 5px 10px rgba(0,0,0,.1);animation:float 5s infinite}a{text-decoration:none;color:#1e90ff}th{color:#d5dde5;background:#1b1e24;border-bottom:4px solid #9ea7af;border-right:1px solid #343a45;font-size:23px;font-weight:100;padding:24px;text-align:center;text-shadow:0 1px 1px rgba(0,0,0,.1);vertical-align:middle}th:first-child{border-top-left-radius:3px}th:last-child{border-top-right-radius:3px;border-right:none}tr{border-top:1px solid #c1c3d1;color:#666b85;font-size:16px;font-weight:400;text-shadow:0 1px 1px rgba(256,256,256,.1)}tr:hover td{background:#4e5066;color:#fff;border-top:1px solid #22262e}tr:first-child{border-top:none}tr:last-child{border-bottom:none}tr:nth-child(odd) td{background:#ebebeb}tr:nth-child(odd):hover td{background:#4e5066}tr:last-child td:first-child{border-bottom-left-radius:3px}tr:last-child td:last-child{border-bottom-right-radius:3px}td{background:#fff;text-align:center;vertical-align:middle;font-weight:300;font-size:18px;text-shadow:-1px -1px 1px rgba(0,0,0,.1);border-right:1px solid #c1c3d1}td:last-child{border-right:0}th.text-left{text-align:left}th.text-center{text-align:center}th.text-right{text-align:right}td.text-left{text-align:left}td.text-center{text-align:center}td.text-right{text-align:right}</style>
        <style>a{
    text-decoration: none;
    color: darkblue;
}
            td a {
        width: 100%;
    }

    button{
        text-align: center;
        font-size:24px;
        margin: 0 40% 0 40%;
        border-radius: 4px;
        background-color:#1E90FF;
        border: none;
        padding: 20px;
        width: 200px;
        transition: all 0.5s;
    }

    button span{
      cursor: pointer;
      display: inline-block;
      position: relative;
      transition: 0.5s;
    }

    button span:after {
  content: url("https://i.ibb.co/Jc747Q9/plus.png");
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

button:hover span {
  padding-right: 25px;
}

button:hover span:after {
  opacity: 1;
  right: 0;
}

</style>
    </head>
<body>

</body>
</html>
<?php
/** @var Auteur $auteurs */
?>
<table align="center">
    <thead>
        <tr>
            <th>Auteurs</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($auteurs as $auteur){ ?>
        <tr>
            <td><a href="<?php echo ROOT ?>auteur/detail?id=<?php echo $auteur->id?>"><?php echo $auteur->nom . ' '. $auteur->prenom?></a></td>
            <td><a href="<?php echo ROOT ?>auteur/new_or_update?id=<?php echo $auteur->id?>"><img src="https://i.ibb.co/ZKKhv2C/edit.png" alt="modifier"></a></td>
            <td><a href="<?php echo ROOT ?>auteur/supprimer?id=<?php echo $auteur->id?>"><img src="https://i.ibb.co/xGVCLZS/rubbish-bin.png" alt="supprimer"></a></td>
        </tr>
    <?php } ?>
    </tbody>
</table>

<a href="<?php echo ROOT ?>auteur/new_or_update?action=new"><button><span>Ajouter un nouvel auteur </span></button></a>
