############################################
# Setup Server
############################################

set :stage, :production
set :stage_url, "http://www.avalilyprice.com"
server "178.62.74.118", user: "phill", roles: %w{web app db}, port: 52366
set :deploy_to, "/var/www/cap_target/ava"

############################################
# Setup Git
############################################

set :branch, "master"

############################################
# Extra Settings
############################################

#specify extra ssh options:

#set :ssh_options, {
#    auth_methods: %w(password),
#    password: 'password',
#    user: 'username',
#}

#specify a specific temp dir if user is jailed to home
#set :tmp_dir, "/path/to/custom/tmp"
