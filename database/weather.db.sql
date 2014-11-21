CREATE SEQUENCE weather_forecast_seq start 1;
CREATE SEQUENCE weather_actual_seq start 1;
CREATE SEQUENCE locations_seq start 1;



CREATE table weather_forecast (
        id integer DEFAULT nextval('weather_forecast_seq') primary key,
        location_id integer NOT NULL,
        forecast_date date NOT NULL,
        creation_date date NOT NULL,
        forecasted_high integer NOT NULL,
        forecasted_low integer NOT NULL,
        precipitation numeric(5,5),
        created_at date NOT NULL DEFAULT CURRENT_TIMESTAMP,
        updated_at date NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE table weather_actual (
        id integer DEFAULT nextval('weather_actual_seq') primary key,
        location_id integer NOT NULL,
        forecast_date date NOT NULL,
        creation_date date NOT NULL,
        forecasted_high integer NOT NULL,
        forecasted_low integer NOT NULL,
        precipitation numeric(5,5),
        created_at date NOT NULL DEFAULT CURRENT_TIMESTAMP,
        updated_at date NOT NULL DEFAULT CURRENT_TIMESTAMP
);

create table locations (
        id integer DEFAULT nextval('locations_seq') primary key,
        location_name varchar,
        location_description varchar,
        longitude integer,
        latitude integer
);