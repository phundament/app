# Running Phundament in a Virtual Machine

Use an exsting Phundament 4 project or create-project a new one.

Go to [PuPHPet](https://puphpet.com/)

- Adjust Apache Virtual Host

  ```
  api01.mcgx.de
  Alias: api01.mcgx.de.vagrant
  /var/www/api01.mcgx.de/frontend/web
  ```
- Click Install Xdebug
- Click Create
- Download VM Image Configuration
- Extract
- Copy files to Phundament project-root


Add `puphpet/files/exec-once`

    composer create-project

Update your `/etc/hosts`

```
http://192.168.77.102/frontend/web/
```