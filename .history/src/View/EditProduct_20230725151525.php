<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Edit Product</title>
</head>

<body>
    <h2>Edit Product</h2>

    <?php if ($error) { ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php } ?>

    <form action="index.php?action=EditProduct&id=<?php echo $product->getIdProduct(); ?>" method="POST">
        <input type="hidden" name="idProduct" value="<?php echo $product->getIdProduct(); ?>">
        <label for="reference">Reference:</label>
        <input type="text" name="reference" id="reference" value="<?php echo htmlspecialchars($product->getReference()); ?>" required>
        <br>
        <label for="description">Description:</label>
        <textarea name="description" id="description" rows="4" required><?php echo htmlspecialchars($product->getDescription()); ?></textarea>
        <br>
        <label for="priceTaxIncl">Price Tax Inclusive:</label>
        <input type="number" name="priceTaxIncl" id="priceTaxIncl" step="0.01" value="<?php echo $product->getPriceTaxIncl(); ?>" required>
        <br>
        <label for="priceTaxExcl">Price Tax Exclusive:</label>
        <input type="number" name="priceTaxExcl" id="priceTaxExcl" step="0.01" value="<?php echo $product->getPriceTaxExcl(); ?>" required>
        <br>
        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" id="quantity" value="<?php echo $product->getQuantity(); ?>" required>
        <br>
        <label for="idLang">Language:</label>
        <select name="idLang" id="idLang" required>
            <option value="" selected>Select a language</option>
            <?php
             use CrudPOO\Model\LanguageRepository;
             $languageRepository = new LanguageRepository();
             $languages = $languageRepository->getAllLanguages(); foreach ($languages as $language) { ?>
                <option value="<?php echo $language->getIdLang(); ?>" <?php if ($language->getIdLang() == $product->getIdLang()) echo 'selected'; ?>>
                    <?php echo htmlspecialchars($language->getLanguageName()); ?>
                </option>
            <?php } ?>
        </select>
        <br>
        <input type="submit" value="Update">
    </form>
</body>

</html>





                        use CrudPOO\Model\LanguageRepository;
                       $languageRepository = new LanguageRepository();
                       $languages = $languageRepository->getAllLanguages();