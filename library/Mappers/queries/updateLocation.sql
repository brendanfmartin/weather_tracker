UPDATE
    locations
SET
    name = $2,
    longitude = $3,
    latitude = $4
WHERE
    id = $1;