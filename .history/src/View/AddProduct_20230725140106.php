<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Product</title>

    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous">

    <!-- Custom Styling -->
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="container">
        <h2 class="text-center"><strong>Créer</strong> un produit</h2>

        <?php if (isset($error)) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error; ?>
            </div>
        <?php } ?>

        <form action="index.php?action=addProduct" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="reference">Référence :</label>
                <input type="text" class="form-control" id="reference" name="reference" required>
            </div>

            <div class="form-group">
                <label for="description">Description :</label>
                <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
            </div>

            <div class="form-group">
                <label for="priceTaxIncl">Prix (TTC) :</label>
                <input type="number" class="form-control" id="priceTaxIncl" name="priceTaxIncl" step="0.01" required>
            </div>

            <div class="form-group">
                <label for="priceTaxExcl">Prix (HT) :</label>
                <input type="number" class="form-control" id="priceTaxExcl" name="priceTaxExcl" step="0.01" required>
            </div>

            <div class="form-group">
                <label for="quantity">Quantité :</label>
                <input type="number" class="form-control" id="quantity" name="quantity" required>
            </div>

            <div class="form-group">
                <label for="cat">Sélectionner un langage :</label>
                <select class="form-control" id="cat" name="cat">
                    <option value="" selected>Choisir un langage</option>
                    <?php foreach ($languages as $language) { ?>
                        
                        <option value="<?= $language->getIdLang(); ?>"><?= htmlspecialchars($language->getLanguageName()); ?></option>
                    <?php } ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Ajouter</button>
        </form>
    </div>

    <!-- Include Bootstrap JS -->
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

</html>
