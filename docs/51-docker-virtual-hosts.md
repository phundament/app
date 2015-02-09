Automated virtual hosts with Docker
-----------------------------------

To automatically create virtual hosts for your projects, you can use a combination of this [nginx-proxy](https://registry.hub.docker.com/u/jwilder/nginx-proxy/)
image and the [xip.io](http://xip.io) wildcard DNS service.

First, run the reverse-proxy container like described in its README, before you start web application containers.

```
docker pull jwilder/nginx-proxy
docker run -d -p 80:80 -v /var/run/docker.sock:/tmp/docker.sock jwilder/nginx-proxy
```

This will automatically setup virtual hosts accessible through port 80 on your Docker host.
You should now be able to access the application under 

Linux

- [myapp-fig.127.0.0.1.xip.io](http://myapp-fig.127.0.0.1.xip.io)
- [myapp-fig.127.0.0.1.xip.io/admin](http://myapp-fig.127.0.0.1.xip.io/backend)

OS X, Windows

- [myapp-fig.192.168.59.103.xip.io](http://myapp-fig.192.168.59.103.xip.io)
- [myapp-fig.192.168.59.103.xip.io/admin](http://myapp-fig.192.168.59.103.xip.io/admin)

> On OS X the command `echo $DOCKER_HOST` should print the IP of your host VM, replace it with `192.168.59.103` in `fig.yml` and the URLs above, if neccessary.

You can display the application logs with:

```
fig logs
```

### Accessing from other clients on the network

If you need to access the application in development from another client (eg. mobile devices), you can setup a port forwarding to your host-vm. This is an example how to add port forwarding to VirtualBox VM.
 
```
boot2docker stop
VBoxManage modifyvm "boot2docker-vm" --natpf1 "rproxy,tcp,,8001,,80"
boot2docker start
```

Make sure to update your `VIRTUAL_HOST` environment variable in `fig.yml`, replace `192.168.1.102` with the IP address of your machine.

```
VIRTUAL_HOST: myapp-fig.127.0.0.1.xip.io,myapp-fig.192.168.1.102.xip.io
```

and restart the containers with `fig up -d web`.

You can access the application under the following URL

```
http://myapp-fig.192.168.1.102.xip.io:8001
```

*More information on this topic available at [github.com/boot2docker](https://github.com/boot2docker/boot2docker/blob/master/doc/WORKAROUNDS.md).*
