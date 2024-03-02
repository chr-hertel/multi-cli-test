# Multi Tenant CLI Demo

It is easy to bootstrap a multi-tenant Symfony application using
tenant-specific environment variables via vhost configuration.
But when it comes to CLI commands, it is not that straightforward.

This repository just demonstrates a easily stupid way to achieve
multi-tenant CLI commands.

The idea is to have a tenant-specific env file, that gets loaded
based on the first argument, levaraging the Dotenv and Runtime
components of Symfony.

## Demo

You can easily try this out after cloning this repository and `composer install`.

### Http Context

```bash
symfony serve -d
```

Open https://localhost:8000/

`.env` file is loaded by default and the response is:
```json
{
  "\/.../multi-cli-test\/data\/tenant-a\/foo.bar":{}
}
```

### CLI Context

```bash
# Default, using .env
bin/console files

Files
=====

 * /opt/Playground/symfony-cli-multi/multi-cli-test/data/tenant-a/foo.bar
```
```bash
# Multi tenant-a, using env/tenant-a.env
bin/multi tenant-a files

Files
=====

 * /opt/Playground/symfony-cli-multi/multi-cli-test/data/tenant-a/foo.bar
```
```bash
# Multi tenant-b, using env/tenant-b.env
bin/multi tenant-b files

Files
=====

 * /opt/Playground/symfony-cli-multi/multi-cli-test/data/tenant-b/test.php
```
