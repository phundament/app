require 'yaml'

dir = File.dirname(File.expand_path(__FILE__))

configValues = YAML.load_file("#{dir}/puphpet/config.yaml")
data = configValues['vagrantfile']

Vagrant.configure("2") do |config|

  config.vm.box = "#{data['vm']['box']}"
  config.vm.box_url = "#{data['vm']['box_url']}"

  if data['vm']['hostname'].to_s != ''
    config.vm.hostname = "#{data['vm']['hostname']}"
  end

  config.vm.provider :aws do |aws, override|
    aws.ami = "#{data['vm']['provider']['aws']['ami']}"
    if !data['vm']['provider']['aws']['region'].nil?
      aws.region = "#{data['vm']['provider']['aws']['region']}"
     end
    aws.instance_type = "#{data['vm']['provider']['aws']['instance_type']}"

    # TODO: move to config.yaml
    aws.tags = {
      'Name' => 'Phundament 4',
    }
    override.ssh.username = 'admin'
    override.vm.box = 'dummy'
    override.vm.box_url = nil
    override.vm.hostname = 'master'
    override.vm.synced_folder ".", "/vagrant", :disabled => true

    aws.access_key_id = ENV['AWSAccessKeyId']
    aws.secret_access_key = ENV['AWSSecretKey']
    aws.keypair_name = ENV['AWSKeypairName']
    override.ssh.private_key_path = ENV['AWSPrivateKeyPath']

    if !data['vm']['provider']['aws']['security_groups'].nil? && !data['vm']['provider']['aws']['security_groups'].empty?
      aws.security_groups = data['vm']['provider']['aws']['security_groups']
    end
  end

  if data['vm']['network']['private_network'].to_s != ''
    config.vm.network "private_network", ip: "#{data['vm']['network']['private_network']}"
  end

  data['vm']['network']['forwarded_port'].each do |i, port|
    if port['guest'] != '' && port['host'] != ''
      config.vm.network :forwarded_port, guest: port['guest'].to_i, host: port['host'].to_i
    end
  end

  data['vm']['synced_folder'].each do |i, folder|
    if folder['source'] != '' && folder['target'] != '' && folder['id'] != ''
      nfs = (folder['nfs'] == "true") ? "nfs" : nil
      # TODO: make fmode configurable in config.yaml
      config.vm.synced_folder "#{folder['source']}", "#{folder['target']}", id: "#{folder['id']}", type: nfs, group: "www-data", mount_options: ["dmode=775,fmode=664"], :rsync_excludes => ['vendor', 'app/runtime/*', 'app/mails/*', 'web/assets/*']
    end
  end

  config.vm.usable_port_range = (10200..10500)

  if !data['vm']['provider']['virtualbox'].empty?
    config.vm.provider :virtualbox do |virtualbox|
      data['vm']['provider']['virtualbox']['modifyvm'].each do |key, value|
        if key == "natdnshostresolver1"
          value = value ? "on" : "off"
        end
        virtualbox.customize ["modifyvm", :id, "--#{key}", "#{value}"]
      end
    end
  end

  config.vm.provision "shell" do |s|
    s.path = "puphpet/shell/initial-setup.sh"
    s.args = "/vagrant/puphpet"
  end
  config.vm.provision :shell, :path => "puphpet/shell/update-puppet.sh"
  config.vm.provision :shell, :path => "puphpet/shell/librarian-puppet-vagrant.sh"

  config.vm.provision :puppet do |puppet|
    ssh_username = !data['ssh']['username'].nil? ? data['ssh']['username'] : "vagrant"
    puppet.facter = {
      "ssh_username" => "#{ssh_username}"
    }
    puppet.manifests_path = "#{data['vm']['provision']['puppet']['manifests_path']}"
    puppet.manifest_file = "#{data['vm']['provision']['puppet']['manifest_file']}"

    if !data['vm']['provision']['puppet']['options'].empty?
      puppet.options = data['vm']['provision']['puppet']['options']
    end
  end

  config.vm.provision :shell, :path => "puphpet/shell/execute-files.sh"

  if !data['ssh']['host'].nil?
    config.ssh.host = "#{data['ssh']['host']}"
  end
  if !data['ssh']['port'].nil?
    config.ssh.port = "#{data['ssh']['port']}"
  end
  if !data['ssh']['private_key_path'].nil?
    config.ssh.private_key_path = "#{data['ssh']['private_key_path']}"
  end
  if !data['ssh']['username'].nil?
    config.ssh.username = "#{data['ssh']['username']}"
  end
  if !data['ssh']['guest_port'].nil?
    config.ssh.guest_port = data['ssh']['guest_port']
  end
  if !data['ssh']['shell'].nil?
    config.ssh.shell = "#{data['ssh']['shell']}"
  end
  if !data['ssh']['keep_alive'].nil?
    config.ssh.keep_alive = data['ssh']['keep_alive']
  end
  if !data['ssh']['forward_agent'].nil?
    config.ssh.forward_agent = data['ssh']['forward_agent']
  end
  if !data['ssh']['forward_x11'].nil?
    config.ssh.forward_x11 = data['ssh']['forward_x11']
  end
  if !data['vagrant']['host'].nil?
    config.vagrant.host = data['vagrant']['host'].gsub(":", "").intern
  end

end

