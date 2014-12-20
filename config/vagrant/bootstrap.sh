#!/bin/bash
#
# Bootstrap vagrant environment.
#  - Update packages
#  - Install virtualbox and vagrant
#  - Import base box
#  - Start vagrant machine

VAGRANT_BOX_NAME=weather_tracker
VAGRANT_BOX_URL=http://cloud-images.ubuntu.com/vagrant/trusty/20141212/trusty-server-cloudimg-i386-vagrant-disk1.box

if [[ "${EUID}" -ne 0 ]]; then
  echo 'Please run as root'
  exit
fi

if [[ ! -e ".vagrant" ]]; then
  echo 'Updating and installing necessary packages'
  apt-get -y update
  apt-get -y install virtualbox
  apt-get -y install vagrant

  vagrant plugin install vagrant-vbguest
  vagrant plugin install vagrant-hostmanager

  boxes=$(sudo -u "${SUDO_USER}" VBoxManage list vms)
  boxExists=$(echo "${boxes}" | awk -v title="${VAGRANT_BOX_NAME}" '{gsub("\"","", $1); if($1==title) {print $1;}}')

  if [[ -z "${boxExists}" ]]; then
    echo 'Importing base box'
    sudo -u "${SUDO_USER}" vagrant box add --force $VAGRANT_BOX_NAME $VAGRANT_BOX_URL
  fi
fi

sudo -u "${SUDO_USER}" vagrant up
sudo -k