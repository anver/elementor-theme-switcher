#!/bin/sh
rsync -aAxXhHPvr --delete-after --numeric-ids . uffdemo:~/web/uffdemo.mwinsys.com/public_html/wp-content/plugins/elementor-theme-switcher/ --exclude-from="exclude-list.txt"

