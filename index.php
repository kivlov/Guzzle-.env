<?php

  require 'vendor/autoload.php';

  $dotenv = new Dotenv\Dotenv(__DIR__);
  $dotenv->load();

  $client = new GuzzleHttp\Client();

  $res = $client->request('GET', 'https://api.github.com/user', [
      'auth' => [getenv('GITHUB_USERNAME'), getenv('GITHUB_PASSWORD')]
  ]);

  echo $res->getStatusCode();
  // "200"
  var_dump( $res->getHeader('content-type') );
  // 'application/json; charset=utf8'
  var_dump(json_decode($res->getBody()));
  // {"type":"User"...'

 ?>
