export GEM_HOME=$HOME/.gem/ruby/1.9.1/
export GEM_PATH=$GEM_HOME:$HOME/vendor/bundle/ruby/1.9.1/
export PATH=$PATH:/usr/local/rvm/rubies/ruby-1.9.2-p180/bin:$HOME/.gem/ruby/1.9.1/bin

DSN=`cat fluxflex_dsn.txt`
RACK_ENV=production DATABASE_URL=$DSN bundle exec rake db:migrate
RACK_ENV=production DATABASE_URL=$DSN bundle exec rake db:seed
