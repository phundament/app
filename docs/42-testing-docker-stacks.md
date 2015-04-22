Setting for testing

    # Includes a container to run commands locally - a Dockerized shell
    apisrc:
      image: mcgx_apicli:latest
      volumes:
       - /app
       
    apicli:
      image: mcgx_apicli:latest
      volumes:
        # Host-volume debugging for application code
        ##- ./api.mcgx.de:/app
        # Host-volume debugging for test code
        #- ./api.mcgx.de/tests:/app/tests
        # Host-volume debugging for codeception
        #- /Users/tobias/.composer/vendor/codeception:/root/.composer/vendor/codeception
        - .:/__PLACEHOLDER__
      volumes_from:
       - apisrc
      links:
        - db:DB
        - apinginx:WEB
        