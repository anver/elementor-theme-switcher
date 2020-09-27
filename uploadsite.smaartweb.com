#!/bin/sh
rsync -aAxXhHPvr --delete-after --numeric-ids . smaartwebracknerd:/home/smaartweb/web/site.smaartweb.com/public_html/wp-content/plugins/elementor-theme-switcher/ --exclude-from="exclude-list.txt"

