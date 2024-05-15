#!/bin/bash

./scripts/set_env.sh && \
docker compose --profile=cli build && \
./cli composer install
