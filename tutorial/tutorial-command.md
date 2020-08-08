hugo new --kind bit bits/folder/filename.md
hugo new --kind snippet snippets/folder/filename.md

hugo new --kind article articles/folder/filename/index.md
hugo new posts/folder/filename/index.md





hugonew() {
  foldername=$1
  filename=$2
  kind=$3
  # fullpath="$foldername/$filename/dhaka/borishal"
  fullpath="posts/$foldername/$filename/index.md"
  if [[ "$kind" == "bit" ]]; then
      fullpath="--kind bit bits/$foldername/$filename.md"
  fi

  if [[ "$kind" == "snippet" ]]; then
      fullpath="--kind snippet snippets/$foldername/$filename.md"
  fi

  if [[ "$kind" == "article" ]]; then
      fullpath="--kind article articles/$foldername/$filename/index.md"
  fi
  echo $fullpath

  # hugo new " $fullpath"
}
