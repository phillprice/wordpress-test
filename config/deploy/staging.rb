############################################
# Setup Server
############################################

set :stage, :staging
set :stage_url, "http://www.leoprice.co.uk"
server "178.62.74.118", user: "phill", roles: %w{web app db}
set :deploy_to, "/var/www/cap_target/leo"

############################################
# Setup Git
############################################

set :branch, "staging"

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
