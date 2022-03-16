#!/bin/sh
set -e
export ENTRYPOINT=1
umask 0002

exec "$@"