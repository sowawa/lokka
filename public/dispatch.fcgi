#!/usr/bin/env /usr/local/rvm/rubies/ruby-1.9.2-p180/bin/ruby

__user_home   = "/home/USER_NAME"

ENV['GEM_HOME'] = __user_home + "/.gem/ruby/1.9.1/"
ENV['GEM_PATH'] = ENV['GEM_HOME'] + ":#{__user_home}/vendor/bundle/ruby/1.9.1/"

ENV['RACK_ENV'] = 'production'
ENV['DATABASE_URL'] = 'mysql://FLX_DB_USER:FLX_DB_PASS@FLX_DB_HOST/FLX_DB_NAME'
Encoding.default_external = 'utf-8' if defined?(Encoding) && Encoding.respond_to?('default_external')


require 'rubygems'
require 'rack'
require 'sinatra'

class Rack::PathInfoRewriter

  def initialize(app)
    @app = app
  end

  def call(env)
    env.delete('SCRIPT_NAME')
    parts = env['REQUEST_URI'].split('?')
    env['PATH_INFO'] = parts[0]
    env['QUERY_STRING'] = parts[1].to_s

    @app.call(env)
  end
end

require '../init.rb'
Rack::Handler::FastCGI.run Rack::PathInfoRewriter.new(Lokka::App)
