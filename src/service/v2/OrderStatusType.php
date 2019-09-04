<?php

// XSLT-WSDL-Client. Generated PHP class of OrderStatusType

namespace ascio\service\v2;


abstract class OrderStatusType {


	/**
	* Getters and setters for API-Properties
	*/
	const NotSet = "NotSet";
	const Received = "Received";
	const Validated = "Validated";
	const Invalid = "Invalid";
	const Pending = "Pending";
	const Processing = "Processing";
	const Pending_Documentation = "Pending_Documentation";
	const Pending_End_User_Action = "Pending_End_User_Action";
	const Documentation_Received = "Documentation_Received";
	const Documentation_Approved = "Documentation_Approved";
	const Documentation_Not_Approved = "Documentation_Not_Approved";
	const Pending_NIC_Processing = "Pending_NIC_Processing";
	const Pending_NIC_Document_Approval = "Pending_NIC_Document_Approval";
	const Pending_Post_Processing = "Pending_Post_Processing";
	const Pending_Internal_Processing = "Pending_Internal_Processing";
	const Completed = "Completed";
	const Failed = "Failed";
	const Authentication_Failed = "Authentication_Failed";
}