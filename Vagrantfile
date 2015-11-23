Vagrant.configure(2) do |config|
	config.vm.box = "ubuntu/vivid64"
	config.vm.provision :shell, path: "server/bootstrap.sh"
	config.vm.provision :shell, path: "server/bootstrap.user.sh", privileged: false
	config.vm.provision :shell, path: "server/run.sh", run: "always"
	config.vm.network "private_network", type: "dhcp"

	config.vm.hostname = "vagrant.ytnuk.cz"
	if Vagrant.has_plugin?('vagrant-hostmanager')
		config.hostmanager.aliases = %w(
			vagrant.ytnuk.com
			vagrant.ytnuk.admin
		)
		config.hostmanager.enabled = true
		config.hostmanager.manage_host = true
		config.hostmanager.ip_resolver = proc do
			`vagrant ssh -c "hostname -I"`.split()[1]
		end
	end
end
