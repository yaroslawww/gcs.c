#!/usr/bin/env bash

[[ -z $1 ]] && echo "Arg email missing"

accessToken=$(php artisan api:create-token $1) \
    && sed -i -E \
    "s/^(VUE_APP_ACCESS_TOKEN=).*/\1\"$accessToken\"/" \
    ./frontend_dashboard/.env.development