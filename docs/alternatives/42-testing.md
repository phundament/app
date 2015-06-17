## Alternative testing setup


### docker-compose

tbd


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
