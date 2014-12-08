Database Migration Scripts
===============

### Naming conventions
1. script_title_setup_###.sql
2. script_title_teardown_###.sql

### Order of Execution

setup_0.sql and teardown_0.sql scripts are special and required to run under postgres user with no DB specified.

##### Setup
Execute in ascending order of ###

##### Tear Down
Execute in descending order of ###