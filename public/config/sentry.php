<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';
Sentry\init(['dsn' => 'https://d0f2da1ada3d4b4c8ddc58c2de8784f1@o462777.ingest.sentry.io/5466652' ]);

//throw new Exception("My first Sentry error!");