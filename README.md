# symfony-5-tutorial
Dockerized Symfony 5 tutorial

## Docker container
To start the docker container:

``` bash
# Build the container.
docker build -t symfony-tutorial .
# Run container.
docker run -it -d -p 8000:8000 symfony-tutorial
```