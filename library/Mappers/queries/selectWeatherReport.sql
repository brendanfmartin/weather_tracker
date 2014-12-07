SELECT
    *
FROM
    weather_reports
WHERE
    (id = COALESCE($1, -1))
    OR
    (location_id = COALESCE($2, -1) AND report_date = COALESCE($3, -1) AND is_forecast = $4)