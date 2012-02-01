set :application, "Jobeet"

#set :domain,      "#{application}.com"
set :domain,      "testing-deploy"

#deploy dir
set :deploy_to,   "/home/ianjvr/mira/#{domain}"
set :app_path,    "app"
set :web_path,    "web"

#User settings:
set :user,        "ianjvr"
set :use_sudo,    false
ssh_options[:port] = 22

#GIT repository
set :repository,  "git@github.com:ianjvr/Jobeet-Test.git"
set :scm,         :git
# Or: `accurev`, `bzr`, `cvs`, `darcs`, `subversion`, `mercurial`, `perforce`, `subversion` or `none`
set :branch,      "master"


#Deploy settings
set :model_manager, "propel"
#set   :deploy_via,    :copy
set :deploy_via,  :rsync_with_remote_cache

role :web,        domain                         # Your HTTP server, Apache/etc
role :app,        domain                         # This may be the same as your `Web` server
role :db,         domain, :primary => true       # This is where Rails migrations will run

#tweaks
set  :keep_releases,  3
set :cache_warmup, false
