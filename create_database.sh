helpFunction()
{
   echo ""
   echo "Usage: $0 -u DB_USER"
   echo -e "\t-u: Set user for mysql connection"
   exit 1 # Exit script after printing help
}

while getopts "u:b:c:" opt
do
   case "$opt" in
      u ) db_user="$OPTARG" ;;
      ? ) helpFunction ;; # Print helpFunction in case parameter is non-existent
   esac
done

# Print helpFunction in case parameters are empty
if [ -z "$db_user" ]
then
   echo "Please, set your mysql user";
   helpFunction
fi

cat create_database.sql | mysql -u $db_user -p