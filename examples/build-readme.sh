#!/bin/sh

echo "# Examples"
for f in */index.php
do
   summary=$(grep '\/\*\*' -A1 $f | sed -e '/\/\*\*/d' -e '/--/d' | sed 's/ \* //')
   dir=$(dirname $f)
   echo "- [$summary]($dir)"
done
