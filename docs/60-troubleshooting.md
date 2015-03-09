Troubleshooting
===============

For more frequently asked questions (FAQ) see [GitHub](https://github.com/phundament/app/issues) and [Stackoverflow](http://stackoverflow.com/questions/tagged/phundament)

## Yii

#### Debug toolbar visible with `YII_DEBUG=0`

**Solution** Set `YII_ENV=dev` which is the variable responsible for the debug toolbar.

## Docker

#### Can't push to private registry

See also [issue on GitHub]()

**Solution** Add the nameserver on your `boot2docker` vm 

```
echo "nameserver 8.8.8.8" > /etc/resolv.conf && sudo /etc/init.d/docker restart
```

#### `YII_ENV=dev` and `phundament/app:production` image

In most cases you won't be able to start images built `FROM phundament/app:production` image, if you set `YII_ENV=dev`, since development packages are missing on that image. It is also not recommended to use a production image in development mode.


## Vagrant

#### `vagrant up db`

```
Command: "docker" "ps" "-a" "-q" "--no-trunc"
```

Just run it one more time.

#### `vagrant up db` fails second time

```
Command: "docker" "run" "--name" "db" "-d" "-e" "MYSQL_ROOT_PASSWORD=secretroot" "-e" "MYSQL_USER=dev" "-e" "MYSQL_PASSWORD=dev-123" "-e" "MYSQL_DATABASE=myapp-vagrant" "-p" "3306:3306" "-v" "/var/lib/docker/docker_1424995498_65018:/vagrant" "mysql"

Stderr: Unable to find image 'mysql:latest' locally
Pulling repository mysql
time="2015-02-27T00:09:38Z" level="fatal" msg="Get https://index.docker.io/v1/repositories/library/mysql/images: dial tcp: lookup index.docker.io on 10.0.2.3:53: server misbehaving" 
```

Fix nameservers in `/etc/resolv.conf` in dockerhost VM.

#### `vagrant destroy web` fails with error message.
 
> TODO link to GitHub issue
