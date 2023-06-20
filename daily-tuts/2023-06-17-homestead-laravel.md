## ssh keygen

```bash
ssh-keygen -t rsa -b 4096 -C "polodev10@gmail.com"
```


## vagrant command   

```php
vagrant up // to start vagrant
vagrant status
vagrant ssh
vagrant halt
vagrant reload --provision
```

## Windows host location
```php
C:\Windows\System32\drivers\etc
```

# mysql database
```php
mysql -uhomestead -p
(secret) is password from homestead
```

## Current homestead setting 

```yaml
---
ip: "192.168.56.56"
memory: 6144
cpus: 2
provider: virtualbox

authorize: ~/.ssh/id_rsa.pub

keys:
    - ~/.ssh/id_rsa

folders:
    - map: ~/sites
      to: /home/vagrant/code

sites:
    - map: bimafy.test
      to: /home/vagrant/code/bimafy/public

    - map: phpinfo.test
      to: /home/vagrant/code/phpinfo

    - map: phpmyadmin.test
      to: /home/vagrant/code/phpmyadmin

databases:
    - homestead

features:
    - mysql: true
    - mariadb: false
    - postgresql: false
    - ohmyzsh: false
    - webdriver: false

services:
    - enabled:
          - "mysql"
#    - disabled:
#        - "postgresql@11-main"

#ports:
#    - send: 33060 # MySQL/MariaDB
#      to: 3306
#    - send: 4040
#      to: 4040
#    - send: 54320 # PostgreSQL
#      to: 5432
#    - send: 8025 # Mailhog
#      to: 8025
#    - send: 9600
#      to: 9600
#    - send: 27017
#      to: 27017

```
