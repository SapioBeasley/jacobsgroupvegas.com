#!/usr/bin/env bash

sudo -s
apt-get update
apt-get install openjdk-7-jre-headless -y
wget -qO - https://packages.elastic.co/GPG-KEY-elasticsearch | sudo apt-key add -
echo "deb http://packages.elastic.co/elasticsearch/2.x/debian stable main" | sudo tee -a /etc/apt/sources.list.d/elasticsearch-2.x.list
apt-get update
apt-get install elasticsearch
update-rc.d elasticsearch defaults 95 10
/etc/init.d/elasticsearch start
mkdir /home/vagrant/jacobsgroupvegas-com/public/images
mkdir /home/vagrant/jacobsgroupvegas-com/public/images/uploads
mkdir /home/vagrant/jacobsgroupvegas-com/public/images/uploads/properties
