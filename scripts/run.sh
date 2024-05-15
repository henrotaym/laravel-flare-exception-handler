#!/usr/bin/env bash

docker run --rm -it --volume $PWD:/opt/apps/app --workdir /opt/apps/app henrotaym/trustup-io-base-builder:0 $@