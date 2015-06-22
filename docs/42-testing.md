Testing
=======

> **Heads up!** This section uses [doma](https://github.com/schmunk42/doma).

### Running in isolated Docker stacks

Creating and running a test environment can be a cumbersome task, since you have to take care about several specific tasks, like executing your tests in a separate database. Therefore the Phundament 4 Docker images contain pre-installed Yii 2.0 Framework codeception test-suites for unit-, functional- and acceptance-testing.

We are using `Makefile` with `schmunk42/doma`-templates to control the test-stack.

### Basic usage 
 
Before starting tests, it's recommended to build all images in the default development stack

    make docker-build

Next step is to get a clean stack selected and configured by using `TEST` target.  

    make TEST docker-kill docker-rm docker-up

Before the test-suites can be run, we need to setup the application, like during development setup, but also in the test-stack. 

    make TEST app-setup

Finally we can execute the tests.

    make TEST app-run-tests

### Advanced usage

To run specific tests you can use the `OPTS` environment variable

    make TEST app-run-tests OPTS='acceptance dev/MyCept --steps'

If you need to customize the codeception setup you can rebuild the tester classes with      

    make TEST app-build-tests

