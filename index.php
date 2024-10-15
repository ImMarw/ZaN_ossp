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
<button type="button" class="btn btn-primary" onclick="toaster()" id="liveToastBtn">Show live toast</button>

<div class="toast-container position-fixed bottom-0 end-0 p-3">
  <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <img src="..." class="rounded me-2" alt="...">
      <strong class="me-auto">Bootstrap</strong>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      Hello, world! This is a toast message.
    </div>
  </div>
</div>
<script>
    function toaster(){
    const toastTrigger = document.getElementById('liveToastBtn')
const toastLiveExample = document.getElementById('liveToast')

if (toastTrigger) {
  const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
  toastTrigger.addEventListener('click', () => {
    toastBootstrap.show()
  })
}}
</script>
<?php include 'templates/footer.php'; ?>
</div>