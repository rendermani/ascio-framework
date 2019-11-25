# Ascio-Framework
A php framework with docker to sync and connect to the ascio-api. Scalable, based on docker and kafka.

It makes make domain-management-processes easear like:

* Auto-Queue blocking orders
* Scalable architecture
* Consume the poll-queue with multiple orders
* Provide one $domain->update functions. Change data, update, and all orders will be queued
* auto unlock-relock
* REST-API:  https://app.swaggerhub.com/apis/rendermani/Ascio-Framework/1.0.0

## Installation

1. Clone repository: https://github.com/rendermani/ascio-framework.git
2. Rename .env.dist to .env
3. Set the lavarel API-Key in the .env. Example: base64:tEgDmjFFDvKL0h1Mu6aAvQpMHU/pd/d2YTV5rPzdqN8=
4. Set new passwords in the .env
5. Rename config/accounts.dist to config/accounts
6. Enter the ascio-credentials in default.json

## Run the framework

1. cd docker
2. docker-compose up -d 

Examples are in the sandbox directory