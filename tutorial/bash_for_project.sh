alias sites="cd ~/sites"
alias siteso="cd ~/sites_other"
alias bimabd="cd ~/bimabd"
alias document="cd ~/Documents"
alias desktop="cd ~/Desktop"
alias download="cd ~/Downloads"


hugonew() {
  foldername=$1
  filename=$2
  kind=$3
  today="$(date +'%Y-%m-%d')"
  filename="$today-$filename"
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

  hugo new " $fullpath"
}
