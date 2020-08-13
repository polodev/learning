hugo new --kind bit bits/folder/filename.md
hugo new --kind snippet snippets/folder/filename.md

hugo new --kind article articles/folder/filename/index.md
hugo new posts/folder/filename/index.md


# for generating hugo content file
~~~bash

hugonew() {
  foldername=$1
  filename=$2
  kind=$3
  today="$(date +'%Y-%m-%d')"
  filename="$today-$filename"

  # for default posts
  fullpath="posts/$foldername/$filename/index.md"

  if [[ "$kind" == "bit" ]]; then
      fullpath="bits/$foldername/$filename.md"
  fi

  if [[ "$kind" == "snippet" ]]; then
      fullpath="snippets/$foldername/$filename.md"
  fi

  if [[ "$kind" == "article" ]]; then
      fullpath="articles/$foldername/$filename/index.md"
  fi

  if [[ "$kind" ]]; then
    hugo new --kind $kind  $fullpath
  else 
    hugo new $fullpath
  fi

}


~~~
