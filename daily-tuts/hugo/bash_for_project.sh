alias sites="cd ~/sites"
alias siteso="cd ~/sites_other"
alias bimabd="cd ~/bimabd"
alias document="cd ~/Documents"
alias desktop="cd ~/Desktop"
alias download="cd ~/Downloads"
alias learning="cd ~/sites_other/learning"

# direct file open
alias zsha="vi ~/.zsha"
alias zshas="subl ~/.zsha"
alias zshconfig="vi ~/.zshrc"
alias zshconfigs="subl ~/.zshrc"


hugonew() {
  foldername=$1
  filename=$2
  kind=$3
  today="$(date +'%Y-%m-%d')"
  filename="$today-$filename"

  # for default posts
  fullpath="posts/$foldername/$filename/index.md"

  if [[ "$kind" == "bit" ]]; then
      fullpath=" --kind bit bits/$foldername/$filename.md"
  fi

  if [[ "$kind" == "snippet" ]]; then
      fullpath=" --kind snippet snippets/$foldername/$filename.md"
  fi

  if [[ "$kind" == "article" ]]; then
      fullpath=" --kind article articles/$foldername/$filename/index.md"
  fi
  echo $fullpath

  hugo new $fullpath
}
