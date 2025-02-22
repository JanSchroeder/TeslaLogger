# Docker Setup (BETA)
Please make sure you have the latest docker and docker-compse. Many repositories comes with old docker and / or docker-compose. You can avoid a lot of problems by doblecheck it.

These versions are known to work fine:
```
docker -v
Docker version 19.03.2, build 6a30dfca03

docker-compose -v
docker-compose version 1.24.1, build 4667896b
```

1. Clone the Teslalogger repository into a new folder:
```
git clone https://github.com/bassmaster187/TeslaLogger
```

2. Create a fresh config file:
```
copy TeslaLogger\app.config TeslaLogger\bin\TeslaLogger.exe.config
```

3. edit TeslaLogger\bin\TeslaLogger.exe.config with your favorite editor

4. enter your My-Tesla credentials in TeslaName and TeslaPass

5. enter the DBConnectionstring:
```
Server=database;Database=teslalogger;Uid=root;Password=teslalogger;
```

The config file could look like this:
```xml
....
            <setting name="TeslaName" serializeAs="String">
              <value>elon@tesla.com</value>
            </setting>
            <setting name="TeslaPasswort" serializeAs="String">
              <value>123456</value>
            </setting>
            <setting name="DBConnectionstring" serializeAs="String">
                <value>Server=database;Database=teslalogger;Uid=root;Password=teslalogger;</value>
            </setting>
            <setting name="Car" serializeAs="String">
                <value>0</value>
            </setting>
....
```

6. fire up docker containers. Make sure, you got the latest docker & docker-compose version. Many repositories comes with very old versions!
```
docker-compose build
docker-compose up
```

after a minute or two, everything should be ready.

Try to connect to Grafana with you favorite browser:
http://localhost:3000 (admin/admin)

Try to connect to Admin-Panel
http://localhost:8888/admin/

# Docker update / upgrade
Usually, you update the Teslalogger in admin-panel by clicking on update button.
If there are updates of the subsystem, you have to get the latest docker-compose.yam file.

```
docker-compose stop
git fetch
git checkout origin/master -- docker-compose.yml
docker-compose build
docker-compose up
```
