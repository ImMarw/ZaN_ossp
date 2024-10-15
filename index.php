<?php include 'templates/header.php'; ?>
<div class="animate__animated animate__fadeIn">
<div class="container">
    <h1 class="text-center mb-5">Vítejte na stránkách Ztráty a nálezy</h1>
    <p class="lead text-center mb-4">
        Tento web vám umožňuje přidávat ztracené předměty, které jste našli, a pomoci tak vrátit věci jejich majitelům.
        Můžete se přihlásit, přidat nový příspěvek a prohlížet nalezené předměty. Pokud jste našli něco, co patří někomu jinému,
        neváhejte to zde přidat! Předměty najdete <a href="lost_items.php">zde</a>.
    </p>

    <h2 class="text-center mt-5 mb-4">Náš tým</h2>
    <div class="row">
        <?php
        // Seznam členů týmu
        $team = [
            ['name' => 'Jan Mareš', 'role' => 'Developer'],
            ['name' => 'Pavel Cyrani', 'role' => 'Developer'],
            ['name' => 'Barbora Dudová', 'role' => 'NULL'],
            ['name' => 'Jan Volkman', 'role' => 'NULL'],
            ['name' => 'Filip', 'role' => 'NULL'],
            ['name' => 'Via', 'role' => 'NULL'],
            ['name' => 'Áňa', 'role' => 'NULL']
        ];

        foreach ($team as $member) {
            echo "
            <div class='col-md-4 mb-4'>
                <div class='card text-center'>
                    <div class='card-body'>
                        <h5 class='card-title'>{$member['name']}</h5>
                        <p class='card-text'>{$member['role']}</p>
                    </div>
                </div>
            </div>";
        }
        ?>
    </div>
</div>
<?php include 'templates/footer.php'; ?>
</div>