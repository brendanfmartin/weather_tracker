UPDATE
    weather_reports
SET
    location_id = $2,
    is_forecast = $3,
    report_date = $4,
    sunrise = $5,
    sunset = $6,
    temperature = $7,
    minTemperature = $8,
    maxTemperature = $9,
    humidity = $10,
    pressure = $11,
    seaLevel_pressure = $12,
    groundLevel_pressure = $13,
    wind_speed = $14,
    wind_direction = $15,
    wind_gusts = $16,
    cloudiness = $17,
    rain_precipitation_volume = $18,
    snow_precipitation_volume = $19
WHERE
    id = $1;