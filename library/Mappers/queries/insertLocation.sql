INSERT INTO locations (
    id,
    name,
    longitude,
    latitude
) SELECT
      $1,
      $2,
      $3,
      $4
  WHERE NOT EXISTS (
      SELECT
          1
      FROM
          locations
      WHERE
          id = $1
  );