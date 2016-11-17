if [ $(id -u) -eq 0 ]; then
  PS1="\[\e[1;31m\]\u@\h:\w \$\[\e[m\] "
else
  PS1="\[\e[1;32m\]\u@\h:\w \$\[\e[m\] "
fi
