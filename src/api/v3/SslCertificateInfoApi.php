<?php

// XSLT-WSDL-Client. Generated DB-Model class of SslCertificateInfo. Can be copied and overwriten with own functions.

namespace ascio\api\v3;
use ascio\base\v3\ApiModel;
use ascio\lib\AscioException;
use ascio\service\v3\SslCertificateInfo;
use ascio\v3\CreateOrderResponse;
use ascio\v3\GetSslCertificateRequest;
use ascio\v3\OrderType;
use ascio\v3\SslCertificateOrderRequest;

class SslCertificateInfoApi extends ApiModel {

	public $idProperty="Handle";

	public $parent;
	protected $properties=["Handle", "Status", "Created", "Expires", "CommonName", "ProductCode", "WebServerType", "ApproverEmail", "CSR", "Certificate", "Owner", "Admin", "Tech", "SanNames", "ObjectComment", "ValidationType", "SslProductName"];
	protected $objects=["Owner", "Admin", "Tech", "SanNames"];

	function create($data=null) {
		throw new \ascio\lib\AscioException("Not implemented yet.");
	}
	function update($data=null) : CreateOrderResponse {
		$request = new SslCertificateOrderRequest();
		$request->setType(OrderType::DetailsUpdate);
		// merge first level here.... maybe convert to array 
		$cert = $request->createSslCertificate();
		$cert->set($this->parent()->properties()->toArray());
		$result = $this->getClient()->createOrder($request);
		return $result;
		throw new \ascio\lib\AscioException("Not implemented yet.");
	}
	function delete($id=null) {
		throw new \ascio\lib\AscioException("Not implemented yet.");
	}
	function get($handle=null) : SslCertificateInfo {
		/**
		 * 
		 * @var SslCertificateInfo $sslCertificateInfo
		 */
		$info = $this->parent();
		$handle = $handle ?: $info->getHandle();
		if(!$handle) {
			throw new AscioException("No Handle provided for SslCertificate: ". $info->getCommonName());
		}
		$request = new GetSslCertificateRequest();
		$request->setHandle($handle);
		$result = $this->getClient()->getSslCertificate($request);
		$info->set($result->getSslCertificateInfo());
		return $info; 
	}
}