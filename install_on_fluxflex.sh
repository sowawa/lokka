export GEM_HOME=$HOME/.gem/ruby/1.9.1/
export GEM_PATH=$GEM_HOME:$HOME/vendor/bundle/ruby/1.9.1/
export PATH=$PATH:/usr/local/rvm/rubies/ruby-1.9.2-p180/bin:$HOME/.gem/ruby/1.9.1/bin

ln -s public public_html

gem install bundler --no-ri --no-rdoc
gem install fcgi --no-ri --no-rdoc
bundle install --path vendor/bundle
