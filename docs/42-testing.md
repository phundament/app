Testing
=======

### Running in isolated Docker containers

Creating and running a test environment can be a cumbersome task, since you have to take care about several specific tasks, like executing your tests in a separate database. Therefore the Phundament 4 `:development` images contain fully pre-installed Yii 2.0 Framework codeception test-suites for unit-, functional- and acceptance-testing.

In `docker-compose.yml` two additional containers `testweb` and `testdb` are defined which are used to run the test-suites. To get started, bring up the test containers and execute tests suites with docker.

```
docker-compose up -d testweb
docker exec app_testweb_1 codecept build
docker exec app_testweb_1 codecept run
```
> Note: Replace `app_testweb_1` with your container name.
>
> You need to run `codecept build` only before the first `run` or after changes to the test classes.
>
> Since acceptance tests are executed against a running webserver we need to use `docker exec` for conveniently running the test-suites in the container.

The following commands can be used to determine the container name to use with docker...

```
docker ps
```

Or to rebuild the codeception classes...

```
docker exec app_testweb_1 codecept build
```

### Running with a local webserver

> Note! This setup requires an additional database and a modified setup with ENV variables.
> It is recommended to use the `docker-compose` setup above.

Update `url` in `tests/codeception/acceptance.suite.yml`

Install required packages and build test classes

```
./yii app/setup-tests
```

Run all suites in all applications

```
./yii app/run-tests
```
