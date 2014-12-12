#!/bin/sh

# Reset getopts index
OPTIND=1

USERNAME=""
PASSWORD=""

while getopts ":u:p:" opt; do
    case "$opt" in
    u)  USERNAME=$OPTARG
        ;;
    p)  PASSWORD=$OPTARG
        ;;
    esac
done

if [ -z $USERNAME ] || [ -z $PASSWORD ];
then
  echo "migrate.sh -u username -p password"
  exit 1
fi

ALL_SETUP_SCRIPTS=$(ls . | grep -P "^\d+_.*setup\.sql$" | sort -n)
ALL_TEARDOWN_SCRIPTS=$(ls . | grep -P "\d+_.*teardown\.sql$" | sort -n)

echo "Running all migration scripts."
for FILE in $ALL_SETUP_SCRIPTS
do

  echo " - $FILE"
  if [ $FILE = "0_setup.sql" ]
  then
    psql -U postgres -f $FILE
  else
    psql -U $USERNAME $PASSWORD -f $FILE
  fi
done