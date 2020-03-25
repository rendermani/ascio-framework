#!/bin/bash
docker-compose restart order-queue web php poll-default sync mysql-connector 
