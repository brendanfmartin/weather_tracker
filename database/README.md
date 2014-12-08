Database Migration Scripts
===============

### Naming conventions
1. script_title_setup_###.sql
2. script_title_teardown_###.sql

### Order of Execution

##### Special Cases
1. setup_0.sql
2. teardown_0.sql

These scripts are special and required to run under postgres user with no DB specified.
```psql -U postgres -f database/setup_0.sql```

##### Setup
Execute in ascending order of ###
```sudo psql -U weather_tracker_user weather_tracker -f database/weather_db_setup_1.sql```

##### Tear Down
Execute in descending order of ###
```sudo psql -U weather_tracker_user weather_tracker -f database/weather_db_teardown_1.sql```