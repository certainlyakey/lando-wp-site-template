#!/bin/sh
if [ ! -z $LANDO_MOUNT ]; then
  echo '.lando.yml: Checking for DB dumps to import...'
	LATEST_BACKUP=$(ls -tr $LANDO_MOUNT/sql-dumps | egrep '\.gz$|\.sql$' | tail -n 1)
	if [ ! -z $LATEST_BACKUP ]; then
		echo '.lando.yml: Latest backup file is '$LATEST_BACKUP
		if [ -f $LANDO_MOUNT/sql-dumps/$LATEST_BACKUP ]; then
			/helpers/sql-import.sh $LANDO_MOUNT/sql-dumps/$LATEST_BACKUP
		fi
	else
		echo '.lando.yml: No SQL backups found, execute `lando install` to install Wordpress'
	fi
fi
