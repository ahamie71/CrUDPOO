<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Custom Styling -->
    <link rel="stylesheet" href="../css/style.css">

    <!-- Admin Styling -->


    <title> Add Post</title>
</head>

<body>
   
    <div class="admin-container">


        <div class="container">




            <form action="index.php?action=create" method="POST" enctype="multipart/form-data">
                <h2 class="text-center"><strong>Creer</strong> un produit </h2>
                <label>Reference</label>
                <div class="form-group"><input class="form-control" type="text" required="required" name="reference"
                        placeholder="enter a reference"></div>
                <div class="form-group">
                    <label>Descriptipn</label>
                    <div class="form-outline mb-4">
                        <textarea class="form-control" id="form4Example3" rows="4" name="description" placeholder="entrer une description"></textarea>
                        <label class="form-label" for="form4Example3"></label>
                    </div>
                    <label>PriceTaxlncl</label>
                    <div class="form-outline mb-4">
                    <input type="number" name="priceTaxIncl" id="priceTaxIncl" step="0.01" required>
                        <label class="form-label" for="form4Example3"></label>
                    </div>
                    <label>PriceTaxExcl</label>
                    <div class="form-outline mb-4">
                    <input type="number" name="priceTaxExcl" id="priceTaxExcl" step="0.01" required>
                        <label class="form-label" for="form4Example3"></label>
                    </div>
                    <label>Quantité</label>
                    <div class="form-outline mb-4">
                    <input type="number" name="quantity" id="quantity" required>
                        <label class="form-label" for="form4Example3"></label>
                    </div>



                    <select name="cat">
  <option selected="selected">Sélectionner un language</option>
  <?php
  // Assuming you have the function getAllLanguages() implemented as shown in the previous response
  $languages = getAllLanguages();

  // Loop through the array of languages
  foreach ($languages as $language) {
    ?>
    <option value="<?php echo $language['idLang']; ?>"><?php echo htmlspecialchars($language['languageName']); ?></option>
    <?php
  }
  ?>
</select>



                <div class="form-group"><button class="btn btn-primary btn-block" type="submit" name="register">Ajouter
                    </button></div>



              

        </div>

    </div>
    </form>
    <!-- // Admin Content -->

    </div>
    <!-- // Page Wrapper -->


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>