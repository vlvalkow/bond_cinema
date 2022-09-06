# Bond Cinema

A cinema that plays James Bond films exclusively.

## API

GET /bookings

POST /bookings
```
{
    "name": "John Doe",
    "film": "Skyfall",
    "datatime": "2022-10-19"
}
```

## Installation

```bash
docker-compose build
```

```bash
docker-compose up
```

## Testing

```bash
docker exec server ./vendor/bin/phpunit -c phpunit.dist.xml
```
