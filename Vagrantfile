# Docker containers
# -----------------

# Note to OS X and Windows users: The forwarded ports are available on your dockerhost-vm.

# Vagrantfile API/syntax version. Don't touch unless you know what you're doing!
VAGRANTFILE_API_VERSION = "2"

ENV['VAGRANT_DEFAULT_PROVIDER'] = 'docker'

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|

  config.vm.define "db" do |db|
    db.vm.network "forwarded_port", guest: 3306, host: 13306
    db.vm.provider "docker" do |docker|
      docker.vagrant_vagrantfile = "docs/examples/vagrant-docker/vm/Vagrantfile"
      docker.name = "db"
      docker.image = "mysql"
      docker.env = {
        "MYSQL_ROOT_PASSWORD" => "secretroot",
        "MYSQL_USER" => "dev",
        "MYSQL_PASSWORD" => "dev-123",
        "MYSQL_DATABASE" => "myapp-vagrant"
      }
    end
  end

  config.vm.define "web" do |web|
    web.vm.network "forwarded_port", guest: 80, host: 10080
    web.vm.synced_folder "./", "/app"
    web.vm.provider "docker" do |docker|
      docker.vagrant_vagrantfile = "docs/examples/vagrant-docker/vm/Vagrantfile"
      docker.build_dir = "."
      docker.link("db:DB")
      docker.env = {
        "APP_NAME" => "myapp-vagrant",
        "APP_PRETTY_URLS" => 1
      }
    end
  end

end
