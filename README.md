# symfony-5-tutorial
Dockerized Symfony 5 tutorial

## Docker container
DDEV has been added to the project. To start this project we need to install DDEV first:

Windows using [Chocolatey](https://chocolatey.org/):
``` bash
choco install ddev
```
Mac/Linux using Brew
``` bash
brew tap drud/ddev && brew install ddev
```

Once DDEV has been installed, go to the root directory and start using DDEV CLI:
```bash
# Select php project type and the rest by default
ddev config
# Start the container
ddev start
# Execute composer install
ddev composer install
# Open the project in your the default browser
ddev launch 
```