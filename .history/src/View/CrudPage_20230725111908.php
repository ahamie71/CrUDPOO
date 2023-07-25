<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Document</title>
</head>
<body>
    <div class ="container">

    <a href="index.php?action=create" class="btn btn-success"style="margin:20px">Ajouter</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">idProduct</th>
      <th scope="col">Reference</th>
      <th scope="col">Description</th>
      <th scope="col">PriceTaxIncl</th>
      <th scope="col">PriceTaxExcl</th>
      <th scope="col">Quantity</th>
      <th scope="col">LanguageName</th>

      <th>Action</th>
    </tr>
  </thead>
    <tbody>
        <?php
        foreach($products as $produit){
            ?>
            <tr>
                <td><?= $produit->getIdProduct() ?></td>
                <td><?= $produit->getReference() ?></td>
                <td><?= $produit->getDescription() ?></td>
                <td><?= $produit-> ?></td>
                <td><?= $produit['priceTaxExcl'] ?></td>
                <td><?= $produit['quantity']?></td>
                <td><?= $produit['LanguageName']?></td>
                <td>
                <a href="index.php?action=edit&id=<?php echo $produit['idProduct']; ?>" class="m-2">

							<i class="fa fa-edit fa-2x"></i>
						</a>
                        <a href= "index.php?action=delete&id=<?php echo $produit['idProduct']; ?>"class="m-2">
                        <i class="fa fa-trash fa-2x red-icon"></i>
						</a>    
                        

                </td>
            </tr>
            <?php
        }
        ?>

    </tbody>
</table>
