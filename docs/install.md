Installation
============

Setup your environment
----------------------

### Database setup

Create a new database to store application information.

> Note! Currently a MySQL is required for the user module.


### Virtual Host Setup (frontend, backend)

- Set document roots of your Web server:
 - for frontend `/path/to/yii-application/frontend/web/` and using the URL `http://frontend/`
 - for backend `/path/to/yii-application/backend/web/` and using the URL `http://backend/`


#### Alternative Setup (one-domain)

If you want to run backend and frontend under the same domain.

```
cd frontend/web
ln -s ../../backend/web backend
```

### Virtualized Setup

[Install via Vagrant on a virtual-, cloud- or remote-server](virtualization.md)


### Configure Application

- Run `yii app/configure`
  - Make sure to install the `user` module


### Admin User

```
./yii user/create admin@example.com admin
```

In development mode, you can either look into `console/runtime/mails` to obtain the password or use `./yii user/password` to set a password right away.
