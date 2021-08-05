<?php
// plugins/offline/cors/config/config.php
return [
    'supportsCredentials' => true,
    'maxAge'              => 3600,
    'allowedOrigins'      => ['*'],
    'allowedHeaders'      => ['*'],
    'allowedMethods'      => ['GET', 'POST'],
    'exposedHeaders'      => [''],
];
