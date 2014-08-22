Installation
============

Get started!
------------

Create a new database to store application information.

> Note! Currently a MySQL is required for the user module.

### Configure Application

- Run `yii app/configure`

### Virtual Host Setup (frontend, backend)

- Set document roots of your Web server:
 - for frontend `/path/to/yii-application/frontend/web/` and using the URL `http://frontend/`
 - for backend `/path/to/yii-application/backend/web/` and using the URL `http://backend/`

[Install via Vagrant on a virtual-, cloud- or remote-server](vagrant.md)

#### Alternative Setup

If you want to run backend and frontend under the same domain.

```
cd frontend/web
ln -s ../../backend/web backend
```



Phundament
----------

./yii user/create admin@h17n.de admin
./yii user/password admin admin

Phundament all $config return from variable


