#!/bin/sh
#require uglifyjs
#for install npm install uglify-js -g
#Reference http://lisperator.net/uglifyjs/

uglifyjs public/js/xghost.js -o public/js/xghost.min.js
echo "Well done dude!"
