#!/bin/bash
mongoimport -d blog -c posts -file posts
mongoimport -d blog -c info -file info
mongoimport -d blog -c users -file users
