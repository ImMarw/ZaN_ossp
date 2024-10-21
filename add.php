<?php include 'templates/header.php'; ?>
<link rel="stylesheet" href="style.css">
<div class="container">
    <h1 class="text-center mb-5">Přidat ztracený předmět</h1>
    <form action="submit_item.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="name" class="form-label">Název předmětu</label>
            <input type="text" class="form-control" id="name" name="name" maxlength="35" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Popis předmětu</label>
            <textarea class="form-control" id="description" name="description" rows="4" maxlength ="100" required>Našel jsem / Ztratil jsem</textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Obrázek předmětu</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
        </div>
        <div class="mb-3">
            <label for="found_at" class="form-label">Datum a čas nálezu</label>
            <input type="datetime-local" class="form-control" id="found_at" name="found_at" required>
        </div>
        <button type="submit" class="btn btn-primary">Přidat předmět</button>
    </form>
</div>
<?php include 'templates/footer.php'; ?>