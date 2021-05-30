


# サーバのホスト名とユーザ名
server "ssh.lolipop.jp", user: "boy.jp-randy-papi-153", port:2222, roles: %w{app}

# SSHの設定
set :ssh_options, {
  keys: %w(~/.ssh/id_rsa),
  forward_agent: true,
  auth_methods: %w(publickey)
}














 










