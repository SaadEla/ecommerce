<!DOCTYPE html>
<html>

<head>
  <title>Sc-Supermarche</title>
  <!-- Bootstrap core CSS-->
  <link href="bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="sb-admin.css" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="acc.css" type="text/css">
<script type="text/javascript" src="https://gc.kis.v2.scr.kaspersky-labs.com/E31A5A6D-362C-6040-895F-BD420B6876D4/main.js" charset="UTF-8"></script>
<style type="text/css">
  .redlabel{background-color:red;}
</style>

</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="acc.php">SC-Supermarche</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Produit">
          <a class="nav-link" href="produit.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Produit</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Fournisseur">
          <a class="nav-link" href="fournisseur.php">
            <i class="fa fa-fw fa-area-chart"></i>
            <span class="nav-link-text">Fournisseur</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Clients">
          <a class="nav-link" href="client.php">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Clients</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Stock">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Stock</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="entre.php">Entrees</a>
            </li>
            <li>
              <a href="sortie.php">Sorties</a>
            </li>
            </li>
            <li>
              <a href="stock.php">Stock</a>
            </li>
          </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="#">
            <i class="fa fa-fw fa-link"></i>
            <span class="nav-link-text">Localisation</span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="sc1" align="center" action="ajt.php">
        <div class="card-header">
          <h2>Table Produit</h2></div>
        <div class="card-body">
            <table>
                <?php
                $bdd = new PDO('mysql:host=localhost;dbname=pfa;charset=utf8', 'root', '');
                ?>
            <div class="card mb-3">
              <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <tr>
                  <th><strong>Produit</strong></th>
                  <th><strong>Numero Produit</strong></th>
                  <th><strong>Quantite</strong> </th>  
                  <th><strong>Prix_Unit</strong> </th>
                  <th><strong>Action modifier</strong> </th>
                  <th><strong>Action supprimer</strong> </th>
                </tr>
                <style>
                 td #input{
                  border:none;
                 }
                </style>
                <?php
                $reponse = $bdd->query('SELECT * FROM produit');
                while ($donnees = $reponse->fetch())
                {
                  $cls = "";
                ?>
                  <tr align="center"><form method="post" action="modifier.php?id=<?= $donnees['id']; ?>">
                    <td><input id="input" type="text" name="Produit" value="<?= $donnees['Produit']; ?>" ></td>
                    <td><input id="input" type="text" name="Numero_Produit" value="<?= $donnees['Numero_Produit']; ?>" ></td>
                    <?php if($donnees['Quantite'] <= 10){ 
                      $cls = 'redlabel';
                       }?>
                    <td id="tdo" class='<?=$cls?>'><input class='<?=$cls?>' id="input" type="text" name="Quantite" value="<?= $donnees['Quantite']; ?>" ></td>
                    <td><input id="input" type="text" name="Prix_Unit" value="<?= $donnees['Prix_Unit']; ?>" ></td>
                    <td id="buttonmod"><input type="submit" value="Modifier" onclick="alert('Donnée Modifier')"></td></form>
                    <td id="sup"><button><?php echo "<a href=\"supprimer.php?id=$donnees[id]\" onclick=\"alert('Données Supprimées !');\" style=\"text-decoration:none\">";?><span><strong>Supprimer</strong></span></a></button></td>
                 </tr>
                <?php
                }
                $reponse->closeCursor(); 
                ?>
            </table>
            <button><?php echo "<a href=\"ajout.php?\" style=\"text-decoration:none\">";?><span><strong>Ajouter</strong></span></a></button></td>
          </div>
        </div>
  
  </div>
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © SC-Rachid</small>
        </div>
      </div>
    </footer>
    <!-- Bootstrap core JavaScript-->
    <script src="jquery.min.js"></script>
    <script src="bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="Chart.min.js"></script>
    <script src="jquery.dataTables.js"></script>
    <script src="dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="sb-admin-datatables.min.js"></script>
    <script src="sb-admin-charts.min.js"></script>
  </div>
</body>
</html>