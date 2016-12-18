#!/bin/bash

# check arg
if [ -z "${1}" ]; then
    echo "Argument (project directiory) must be set!"
    exit
fi

PROJECT_DIRECTORY=${1}
SAW_DIRECTORY=${PROJECT_DIRECTORY}"/saw/"
ZIP_FILE="*.zip"
BACKUP_DIRECTORY=${PROJECT_DIRECTORY}"/symfony/saw/backup/"
LINE="====="
DATE=$(date +"%Y.%m.%d.%H.%M.%S")


cd ${SAW_DIRECTORY}

echo ${LINE}
echo Date: ${DATE}
echo ""

echo "Search files: ${ZIP_FILE}"
FILES=$(shopt -s nullglob dotglob; echo ${ZIP_FILE})
if (( ${#FILES} ))
then
  echo "Folder contains new files"
else
  echo "Folder is empty"
  exit
fi

echo ""
echo "Extracting and backup files:"
for f in ${FILES}
do
    echo ${LINE}
    IMPORT_DIRECTORY=${PROJECT_DIRECTORY}/symfony/saw/to_import/$(echo ${f}| /usr/bin/cut -d'.' -f 1)
	echo "Unzip file ${f} to directiory ${IMPORT_DIRECTORY}"
	/usr/bin/unzip ${f} -d ${IMPORT_DIRECTORY}

	echo "Backup file ${f}"
	mv ${f} ${BACKUP_DIRECTORY}
	echo ${LINE}
done

