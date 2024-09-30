<?php

// This file was generated by running "composer dump-env prod"

return array (
  'APP_ENV' => 'prod',
  'SYMFONY_DOTENV_PATH' => './.env',
  'APP_SECRET' => '7716ffd27f0d3139068743373d35fc6a',
  'MESSENGER_TRANSPORT_DSN' => 'doctrine://default?auto_setup=0',
  'MAILER_DSN' => 'smtp://127.0.0.1:1025',
  'JWT_SECRET_KEY' => '%kernel.project_dir%/config/jwt/private.pem',
  'JWT_PUBLIC_KEY' => '%kernel.project_dir%/config/jwt/public.pem',
  'JWT_PASSPHRASE' => 'ffddd3343e1e1c5846d57b29cb9f4e500a9ab7a513881e79b81f4236c040b710',
  'DATABASE_URL' => 'mysql://yaQuoiAManger:yaQuoiAManger@127.0.0.1:3306/yaQuoiAManger?serverVersion=8.0.32&charset=utf8mb4',
  'CORS_ALLOW_ORIGIN' => '*',
);