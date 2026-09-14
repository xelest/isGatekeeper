<?php
// Docker convenience only (not part of the app itself): the real app now
// lives at /CCIS GateKeeper/dist/ inside this container, matching the real
// production folder layout. Redirect the bare root to the login page.
header("Location: /CCIS GateKeeper/dist/login.html");
exit();
