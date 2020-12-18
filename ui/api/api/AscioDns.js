const soap = require('soap');
const config = require('../lib/config');
const logger = require('../lib/logger');
const formatXml = require('xml-formatter');
const allFields = [
	'Id',
	'Source',
	'Target',
	'TTL',
	'Expire',
	'HostmasterEmail',
	'PrimaryNameServer',
	'Refresh',
	'Retry',
	'SerialUsage',
	'Priority',
	'Weight',
	'Port'
];

class AscioDns {
	constructor() {
		this.setConfig(config);
	}
	setConfig(config) {
		this.config = config;
	}
	getClient() {
		return new Promise((resolve, reject) => {
			const demo = config.getEnv() == 'live' ? '' : 'demo.';
			const ns = 'http://groupnbt.com/2010/10/30/Dns/DnsService';
			soap.createClient('https://dnsservice.' + demo + 'ascio.com/2010/10/30/DnsService.wsdl', function(
				err,
				client
			) {
				if (err) {
					logger.error('[AscioDns.createClient]' + err);
					reject(err);
				} else {
					const header = {
						UserName: config.config.ascio.account,
						Password: config.config.ascio.password,
						ActAs: config.config.ascio.partner,
						Account: config.config.ascio.partner
					};
					client.addSoapHeader(header, ns, 'tns');
					resolve(client);
				}
			});
		});
	}
	syncZones(callback) {
		const self = this;
		return this.searchZoneNames().then(function(zoneNames) {
			(async function getZoneDetails() {
				for (let i = 0; i < zoneNames.length; i++) {
					const zone = await self.getZone(zoneNames[i]).catch(function(err) {
						logger.error('[AscioDns.syncZones]' + err);
					});
					callback(zone, i, zoneNames.length);
				}
			})();
		});
	}
	createZone(zoneName, owner) {
		const self = this;
		return this.getClient().then((client) => {
			return new Promise(function(resolve, reject) {
				client.CreateZone({ zoneName, owner }, async (err, response) => {
					const result = response.CreateZoneResult;
					if (err) {
						logger.error('[AscioDns.createZone]' + client.lastRequest);
						reject(result);
					}
					if (result.StatusCode == 200) {
						const zone = await self.getZone(zoneName);
						resolve(zone);
					} else {
						reject(result);
					}
				});
			});
		});
    }
    deleteZone(zoneName) {
        console.log("delete: ", zoneName)
        const self = this;
		return this.getClient().then((client) => {
			return new Promise(function(resolve, reject) {
				client.DeleteZone({ zoneName }, async (err, response) => {
					const result = response.DeleteZoneResult;
					if (err) {
						logger.error('[AscioDns.deleteZone]' + client.lastRequest);
						reject(result);
					}
					if (result.StatusCode == 200) {
						resolve();
					} else {
						reject(result);
					}
				});
			});
		});
    }
	searchZoneNames() {
		return this.getClient().then((client) => {
			const searchZoneClause = {
				searchZoneClauses: {
					SearchZoneClause: [
						{
							Operator: 'Like',
							SearchZoneField: 'ZoneName',
							Value: '*'
						}
					]
				}
			};
			return new Promise(function(resolve, reject) {
				client.SearchZoneNames(searchZoneClause, (err, response) => {
					const result = response.SearchZoneNamesResult;
					if (err) {
						logger.error('[AscioDns.searchZoneNames]' + client.lastRequest);
						reject(result);
					}
					if (result.StatusCode == 200) {
						resolve(response.zoneNames.string);
					} else {
						reject(result);
					}
				});
			});
		});
	}
	getZone(zoneName) {
		return this.getClient().then((client) => {
			return new Promise(function(resolve, reject) {
				client.GetZone({ zoneName }, (err, response) => {
					const result = response.GetZoneResult;
					response.zone._type = 'Zone';
					response.zone.api = 'AscioDns';
					if (err) {
						logger.error('[AscioDns.getZone]' + client.lastRequest);
						reject(result);
					}
					if (result.StatusCode == 200) {
						resolve(response.zone);
					} else {
						reject(result);
					}
				});
			});
		});
	}
	updateRecord(zoneName, record, action) {
		const self = this;
		return this.getClient().then((client) => {
			return new Promise(function(resolve, reject) {
				const request = self.reformatRecord(zoneName, record);
				client[action + 'Record'](request, (err, response) => {
					const result = response[action + 'RecordResult'];
					if (err) {
						console.log('last request: ', formatXml(client.lastRequest));
						reject(result);
					}
					if (action == 'Create') {
						record.Id = response.recordId.toString();
					}
					if (result.StatusCode == 200) {
						resolve(record);
					} else {
						reject(result);
					}
				});
			});
		});
	}
	deleteRecord(id) {
		return this.getClient().then((client) => {
			return new Promise(function(resolve, reject) {
				client.DeleteRecord({ recordId: id }, (err, response) => {
					const result = response.DeleteRecordResult;
					if (err) {
						console.log('last request: ', formatXml(client.lastRequest));
						reject(result);
					}
					if (result.StatusCode == 200) {
						resolve({ message: 'Deleted record ' + id });
					} else {
						reject(result);
					}
				});
			});
		});
	}
	reformatRecord(zoneName, recordData) {
		const record = {
			attributes: {
				xsi_type: {
					type: recordData._type,
					xmlns: 'http://groupnbt.com/2010/10/30/Dns/DnsService'
				}
			}
		};
		allFields.forEach((key) => {
			const value = recordData[key];
			if (value) {
				record[key] = value;
			}
		});
		return { zoneName, record };
	}
}
module.exports = AscioDns;
