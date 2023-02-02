<?php

// XSLT-WSDL-Client. Generated PHP class of Service

namespace ascio\service\dns;
use ascio\db\dns\ServiceDb;
use ascio\api\dns\ServiceApi;
use ascio\base\dns\ServiceBase;


class Service extends ServiceBase  {
	protected $classmap = [
		"Response" => "ascio\\dns\\Response",
		"ArrayOfRoleItem" => "ascio\\dns\\ArrayOfRoleItem",
		"RoleItem" => "ascio\\dns\\RoleItem",
		"User" => "ascio\\dns\\User",
		"TfaSetup" => "ascio\\dns\\TfaSetup",
		"ArrayOfSearchUserClause" => "ascio\\dns\\ArrayOfSearchUserClause",
		"SearchUserClause" => "ascio\\dns\\SearchUserClause",
		"ArrayOfRecord" => "ascio\\dns\\ArrayOfRecord",
		"Record" => "ascio\\dns\\Record",
		"WebForward" => "ascio\\dns\\WebForward",
		"SRV" => "ascio\\dns\\SRV",
		"CNAME" => "ascio\\dns\\CNAME",
		"SOA" => "ascio\\dns\\SOA",
		"TXT" => "ascio\\dns\\TXT",
		"PTR" => "ascio\\dns\\PTR",
		"MX" => "ascio\\dns\\MX",
		"A" => "ascio\\dns\\A",
		"AAAA" => "ascio\\dns\\AAAA",
		"CAA" => "ascio\\dns\\CAA",
		"NS" => "ascio\\dns\\NS",
		"MailForward" => "ascio\\dns\\MailForward",
		"ArrayOfZoneLogEntry" => "ascio\\dns\\ArrayOfZoneLogEntry",
		"ZoneLogEntry" => "ascio\\dns\\ZoneLogEntry",
		"Zone" => "ascio\\dns\\Zone",
		"ArrayOfSearchZoneClause" => "ascio\\dns\\ArrayOfSearchZoneClause",
		"SearchZoneClause" => "ascio\\dns\\SearchZoneClause",
		"ArrayOfZone" => "ascio\\dns\\ArrayOfZone",
		"ArrayOfstring" => "ascio\\dns\\ArrayOfstring",
		"GetRoles" => "ascio\\dns\\GetRoles",
		"GetRolesResponse" => "ascio\\dns\\GetRolesResponse",
		"CreateUser" => "ascio\\dns\\CreateUser",
		"CreateUserResponse" => "ascio\\dns\\CreateUserResponse",
		"UpdateUser" => "ascio\\dns\\UpdateUser",
		"UpdateUserResponse" => "ascio\\dns\\UpdateUserResponse",
		"DeleteUser" => "ascio\\dns\\DeleteUser",
		"DeleteUserResponse" => "ascio\\dns\\DeleteUserResponse",
		"GetUser" => "ascio\\dns\\GetUser",
		"GetUserResponse" => "ascio\\dns\\GetUserResponse",
		"CompleteTfaSetup" => "ascio\\dns\\CompleteTfaSetup",
		"CompleteTfaSetupResponse" => "ascio\\dns\\CompleteTfaSetupResponse",
		"VerifyTotp" => "ascio\\dns\\VerifyTotp",
		"VerifyTotpResponse" => "ascio\\dns\\VerifyTotpResponse",
		"InitiateTfaSetup" => "ascio\\dns\\InitiateTfaSetup",
		"InitiateTfaSetupResponse" => "ascio\\dns\\InitiateTfaSetupResponse",
		"SearchUser" => "ascio\\dns\\SearchUser",
		"SearchUserResponse" => "ascio\\dns\\SearchUserResponse",
		"ChangePassword" => "ascio\\dns\\ChangePassword",
		"ChangePasswordResponse" => "ascio\\dns\\ChangePasswordResponse",
		"InitiatePasswordReset" => "ascio\\dns\\InitiatePasswordReset",
		"InitiatePasswordResetResponse" => "ascio\\dns\\InitiatePasswordResetResponse",
		"CompletePasswordReset" => "ascio\\dns\\CompletePasswordReset",
		"CompletePasswordResetResponse" => "ascio\\dns\\CompletePasswordResetResponse",
		"CreateZone" => "ascio\\dns\\CreateZone",
		"CreateZoneResponse" => "ascio\\dns\\CreateZoneResponse",
		"CreateSlaveZone" => "ascio\\dns\\CreateSlaveZone",
		"CreateSlaveZoneResponse" => "ascio\\dns\\CreateSlaveZoneResponse",
		"UpdateZoneType" => "ascio\\dns\\UpdateZoneType",
		"UpdateZoneTypeResponse" => "ascio\\dns\\UpdateZoneTypeResponse",
		"DeleteZone" => "ascio\\dns\\DeleteZone",
		"DeleteZoneResponse" => "ascio\\dns\\DeleteZoneResponse",
		"GetZoneLog" => "ascio\\dns\\GetZoneLog",
		"GetZoneLogResponse" => "ascio\\dns\\GetZoneLogResponse",
		"ArrayOfZoneLog" => "ascio\\dns\\ArrayOfZoneLog",
		"RestoreZone" => "ascio\\dns\\RestoreZone",
		"RestoreZoneResponse" => "ascio\\dns\\RestoreZoneResponse",
		"GetZone" => "ascio\\dns\\GetZone",
		"GetZoneResponse" => "ascio\\dns\\GetZoneResponse",
		"SearchZoneNames" => "ascio\\dns\\SearchZoneNames",
		"SearchZoneNamesResponse" => "ascio\\dns\\SearchZoneNamesResponse",
		"SearchZone" => "ascio\\dns\\SearchZone",
		"SearchZoneResponse" => "ascio\\dns\\SearchZoneResponse",
		"SetZoneOwner" => "ascio\\dns\\SetZoneOwner",
		"SetZoneOwnerResponse" => "ascio\\dns\\SetZoneOwnerResponse",
		"CreateRecord" => "ascio\\dns\\CreateRecord",
		"CreateRecordResponse" => "ascio\\dns\\CreateRecordResponse",
		"UpdateRecord" => "ascio\\dns\\UpdateRecord",
		"UpdateRecordResponse" => "ascio\\dns\\UpdateRecordResponse",
		"DeleteRecord" => "ascio\\dns\\DeleteRecord",
		"DeleteRecordResponse" => "ascio\\dns\\DeleteRecordResponse",
		"GetRecord" => "ascio\\dns\\GetRecord",
		"GetRecordResponse" => "ascio\\dns\\GetRecordResponse",
		"GetRoles" => "ascio\\dns\\GetRoles",
		"GetRolesResponse" => "ascio\\dns\\GetRolesResponse",
		"CreateUser" => "ascio\\dns\\CreateUser",
		"CreateUserResponse" => "ascio\\dns\\CreateUserResponse",
		"UpdateUser" => "ascio\\dns\\UpdateUser",
		"UpdateUserResponse" => "ascio\\dns\\UpdateUserResponse",
		"DeleteUser" => "ascio\\dns\\DeleteUser",
		"DeleteUserResponse" => "ascio\\dns\\DeleteUserResponse",
		"GetUser" => "ascio\\dns\\GetUser",
		"GetUserResponse" => "ascio\\dns\\GetUserResponse",
		"CompleteTfaSetup" => "ascio\\dns\\CompleteTfaSetup",
		"CompleteTfaSetupResponse" => "ascio\\dns\\CompleteTfaSetupResponse",
		"VerifyTotp" => "ascio\\dns\\VerifyTotp",
		"VerifyTotpResponse" => "ascio\\dns\\VerifyTotpResponse",
		"InitiateTfaSetup" => "ascio\\dns\\InitiateTfaSetup",
		"InitiateTfaSetupResponse" => "ascio\\dns\\InitiateTfaSetupResponse",
		"SearchUser" => "ascio\\dns\\SearchUser",
		"SearchUserResponse" => "ascio\\dns\\SearchUserResponse",
		"ChangePassword" => "ascio\\dns\\ChangePassword",
		"ChangePasswordResponse" => "ascio\\dns\\ChangePasswordResponse",
		"InitiatePasswordReset" => "ascio\\dns\\InitiatePasswordReset",
		"InitiatePasswordResetResponse" => "ascio\\dns\\InitiatePasswordResetResponse",
		"CompletePasswordReset" => "ascio\\dns\\CompletePasswordReset",
		"CompletePasswordResetResponse" => "ascio\\dns\\CompletePasswordResetResponse",
		"CreateZone" => "ascio\\dns\\CreateZone",
		"CreateZoneResponse" => "ascio\\dns\\CreateZoneResponse",
		"CreateSlaveZone" => "ascio\\dns\\CreateSlaveZone",
		"CreateSlaveZoneResponse" => "ascio\\dns\\CreateSlaveZoneResponse",
		"UpdateZoneType" => "ascio\\dns\\UpdateZoneType",
		"UpdateZoneTypeResponse" => "ascio\\dns\\UpdateZoneTypeResponse",
		"DeleteZone" => "ascio\\dns\\DeleteZone",
		"DeleteZoneResponse" => "ascio\\dns\\DeleteZoneResponse",
		"GetZoneLog" => "ascio\\dns\\GetZoneLog",
		"GetZoneLogResponse" => "ascio\\dns\\GetZoneLogResponse",
		"RestoreZone" => "ascio\\dns\\RestoreZone",
		"RestoreZoneResponse" => "ascio\\dns\\RestoreZoneResponse",
		"GetZone" => "ascio\\dns\\GetZone",
		"GetZoneResponse" => "ascio\\dns\\GetZoneResponse",
		"SearchZoneNames" => "ascio\\dns\\SearchZoneNames",
		"SearchZoneNamesResponse" => "ascio\\dns\\SearchZoneNamesResponse",
		"SearchZone" => "ascio\\dns\\SearchZone",
		"SearchZoneResponse" => "ascio\\dns\\SearchZoneResponse",
		"SetZoneOwner" => "ascio\\dns\\SetZoneOwner",
		"SetZoneOwnerResponse" => "ascio\\dns\\SetZoneOwnerResponse",
		"CreateRecord" => "ascio\\dns\\CreateRecord",
		"CreateRecordResponse" => "ascio\\dns\\CreateRecordResponse",
		"UpdateRecord" => "ascio\\dns\\UpdateRecord",
		"UpdateRecordResponse" => "ascio\\dns\\UpdateRecordResponse",
		"DeleteRecord" => "ascio\\dns\\DeleteRecord",
		"DeleteRecordResponse" => "ascio\\dns\\DeleteRecordResponse",
		"GetRecord" => "ascio\\dns\\GetRecord",
		"GetRecordResponse" => "ascio\\dns\\GetRecordResponse",
		"SearchOperatorType" => "ascio\\dns\\SearchOperatorType",
		"SearchUserField" => "ascio\\dns\\SearchUserField",
		"ResetPasswordReason" => "ascio\\dns\\ResetPasswordReason",
		"RedirectionType" => "ascio\\dns\\RedirectionType",
		"ZoneType" => "ascio\\dns\\ZoneType",
		"SearchZoneField" => "ascio\\dns\\SearchZoneField",
		"ZoneInfoLevel" => "ascio\\dns\\ZoneInfoLevel",
	];


	public function getRoles() : GetRolesResponse {
		return $this->call("GetRoles"[]);
	}
	public function createUser(User $user) : CreateUserResponse {
		return $this->call("CreateUser", ["user" => $user]);
	}
	public function updateUser(User $user) : UpdateUserResponse {
		return $this->call("UpdateUser", ["user" => $user]);
	}
	public function deleteUser(string $userName) : DeleteUserResponse {
		return $this->call("DeleteUser", ["userName" => $userName]);
	}
	public function getUser(string $userName) : GetUserResponse {
		return $this->call("GetUser", ["userName" => $userName]);
	}
	public function completeTfaSetup(string $secretKey, string $tfaCode) : CompleteTfaSetupResponse {
		return $this->call("CompleteTfaSetup", ["secretKey" => $secretKey, "tfaCode" => $tfaCode]);
	}
	public function verifyTotp(string $tfaCode) : VerifyTotpResponse {
		return $this->call("VerifyTotp", ["tfaCode" => $tfaCode]);
	}
	public function initiateTfaSetup(string $userName) : InitiateTfaSetupResponse {
		return $this->call("InitiateTfaSetup", ["userName" => $userName]);
	}
	public function searchUser(ArrayOfSearchUserClause $searchUserClauses) : SearchUserResponse {
		return $this->call("SearchUser", ["searchUserClauses" => $searchUserClauses]);
	}
	public function changePassword(string $userName, string $newPassword) : ChangePasswordResponse {
		return $this->call("ChangePassword", ["userName" => $userName, "newPassword" => $newPassword]);
	}
	public function initiatePasswordReset(string $partnerUserName, string $userName, string $reason) : InitiatePasswordResetResponse {
		return $this->call("InitiatePasswordReset", ["partnerUserName" => $partnerUserName, "userName" => $userName, "reason" => $reason]);
	}
	public function completePasswordReset(string $resetToken, string $userName, string $password) : CompletePasswordResetResponse {
		return $this->call("CompletePasswordReset", ["resetToken" => $resetToken, "userName" => $userName, "password" => $password]);
	}
	public function createZone(string $zoneName, string $owner, ArrayOfRecord $records) : CreateZoneResponse {
		return $this->call("CreateZone", ["zoneName" => $zoneName, "owner" => $owner, "records" => $records]);
	}
	public function createSlaveZone(string $zoneName, string $owner, string $masterIp) : CreateSlaveZoneResponse {
		return $this->call("CreateSlaveZone", ["zoneName" => $zoneName, "owner" => $owner, "masterIp" => $masterIp]);
	}
	public function updateZoneType(string $zoneName, string $zoneType, string $masterIp) : UpdateZoneTypeResponse {
		return $this->call("UpdateZoneType", ["zoneName" => $zoneName, "zoneType" => $zoneType, "masterIp" => $masterIp]);
	}
	public function deleteZone(string $zoneName) : DeleteZoneResponse {
		return $this->call("DeleteZone", ["zoneName" => $zoneName]);
	}
	public function getZoneLog(string $zoneName) : GetZoneLogResponse {
		return $this->call("GetZoneLog", ["zoneName" => $zoneName]);
	}
	public function getZone(string $zoneName) : GetZoneResponse {
		return $this->call("GetZone", ["zoneName" => $zoneName]);
	}
	public function restoreZone(string $zoneName) : RestoreZoneResponse {
		return $this->call("RestoreZone", ["zoneName" => $zoneName]);
	}
	public function searchZoneNames(ArrayOfSearchZoneClause $searchZoneClauses) : SearchZoneNamesResponse {
		return $this->call("SearchZoneNames", ["searchZoneClauses" => $searchZoneClauses]);
	}
	public function searchZone(ArrayOfSearchZoneClause $searchZoneClauses, string $zoneInfoLevel) : SearchZoneResponse {
		return $this->call("SearchZone", ["searchZoneClauses" => $searchZoneClauses, "zoneInfoLevel" => $zoneInfoLevel]);
	}
	public function setZoneOwner(string $zoneName, string $owner) : SetZoneOwnerResponse {
		return $this->call("SetZoneOwner", ["zoneName" => $zoneName, "owner" => $owner]);
	}
	public function createRecord(string $zoneName, Record $record) : CreateRecordResponse {
		return $this->call("CreateRecord", ["zoneName" => $zoneName, "record" => $record]);
	}
	public function updateRecord(Record $record) : UpdateRecordResponse {
		return $this->call("UpdateRecord", ["record" => $record]);
	}
	public function deleteRecord(int $recordId) : DeleteRecordResponse {
		return $this->call("DeleteRecord", ["recordId" => $recordId]);
	}
	public function getRecord(int $recordId) : GetRecordResponse {
		return $this->call("GetRecord", ["recordId" => $recordId]);
	}
}