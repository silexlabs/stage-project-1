<?php
// index.php
// ...
require '../vendor/autoload.php';
use Auth0\SDK\Auth0;
$auth0 = new Auth0([
  'domain' => 'test-silex-labs-rado.eu.auth0.com',
  'client_id' => 'IHKNEjr02YDQWaQzLB2ZdduaXMf31VaT',
  'client_secret' => 'SgxxK4gapuREY4_Iq7gi1JiG47bH20WS0z8kjiZ6CGBqRliaHFjufPiSe2TqBjqk',
  'redirect_uri' => 'https://localhost:3000/',
  'scope' => 'openid profile email',
]);
$userInfo = $auth0->getUser();
if (!$userInfo) {
    // We have no user info
    // See below for how to add a login link
} else {
    // User is authenticated
    // See below for how to display user information
}
