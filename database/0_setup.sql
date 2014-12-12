CREATE ROLE weather_tracker_role;
CREATE DATABASE weather_tracker;
CREATE USER weather_tracker_user WITH PASSWORD 'weather_tracker_password';
GRANT weather_tracker_role TO weather_tracker_user;