<h1>HOME</h1>
<hr/>
<?php
if (!empty($invoice)): ?>
    Invoice ID: <?= htmlspecialchars($invoice['id'], ENT_QUOTES) ?> <br/>
    Invoice Amount: <?= htmlspecialchars($invoice['amount'], ENT_QUOTES) ?> <br/>
    User: <?= htmlspecialchars($invoice['full_name'], ENT_QUOTES) ?> <br/>
<?php
endif ?>
