Testing
=======

### Running in isolated Docker containers

Bring up the test container and execute the codeception test suites with docker...

```
fig up -d testweb
docker exec app_testweb_1 codecept run
```

The following commands can be used to determine the container name to use with docker...

```
docker ps
```

Or to rebuild the codeception classes...

```
docker exec app_testweb_1 codecept build
```

### Running with a local webserver

Update `url` in `tests/codeception/acceptance.suite.yml`

Install required packages and build test classes

```
./yii app/setup-tests
```

Run all suites in all applications

```
./yii app/run-tests
```
