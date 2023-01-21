<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>PDF</title>

</head>
<body style=" font-family:'Courier New';">
	<hr>
	<?php if(empty($response)){?>
    <p style=" font-family:'Courier New';font-size: 15px; font-weight:bold;color:Black">Consumer Data Not Found</p>
	<?php } else { ?>
	
	<p style=" font-family:'Courier New';font-size: 15px; font-weight:bold;color:Black">Consumer Name: <?php  if(!empty($response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['PersonalInfo']['Name']['FullName'])){ echo $response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['PersonalInfo']['Name']['FullName'];}?></p>

	<table style="width:100%;position:fixed;font-size: 9px;" cellpadding="1">
		<tr  style="background-color: #C24641;">
			<th style="width:33%;padding-left:5px;color:white">Personal Information</th>
			<th style="width:33%;color:white">Identification</th>
			<th style="width:33%;color:white">Contact Details</th>
		</tr>
		<tbody style="margin-top: 5rem">
			<tr>
			<td>Previous Name : <?php if(isset($response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['PersonalInfo']['Name']['FullName'])) { echo $response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['PersonalInfo']['Name']['FullName'] ;}?></td>
			<td>PAN : <?php if(isset($response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['IdentityInfo']['PANId'])){ echo $response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['IdentityInfo']['PANId'][0]['IdNumber'];}?></td>
				<td></td>
			</tr>
			<tr>
			<td>Alias Name:<?php if(isset($response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['PersonalInfo']['AliasName']['FullName'])) { echo $response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['PersonalInfo']['AliasName']['FullName'] ;}?></td>
				
				<td>Voter ID : <?php if(isset( $response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['IdentityInfo']['VoterID'])){    echo $response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['IdentityInfo']['VoterID'][0]['IdNumber'];}?></td>
				<td>Home :<?php if(isset($response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['PhoneInfo'][0]['Number'])){ echo $response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['PhoneInfo'][0]['Number'];}?></td>
			</tr>
			<tr>
				<td>DOB : <?php if(isset( $response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['PersonalInfo']['DateOfBirth'])){echo $response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['PersonalInfo']['DateOfBirth'];}?></td>
				
			   <td>Passport ID: <?php if(isset( $response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['IdentityInfo']['PassportID'])){    echo $response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['IdentityInfo']['PassportID'][0]['IdNumber'];}?></td>
				<td>Office:<?php if(isset($response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['PhoneInfo'][4]['Number'])){ echo $response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['PhoneInfo'][4]['Number'];}?></td>
			</tr>
			<tr>
			<td>Age : <?php if(isset($response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['PersonalInfo']['Age']['Age'])){echo $response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['PersonalInfo']['Age']['Age'];}?></td>
				
				<td>UID: <?php if(isset($response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['IdentityInfo']['NationalIDCard'])){ echo $response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['IdentityInfo']['NationalIDCard'][0]['IdNumber'];}?></td>
				<td>Mobile:<?php if(isset($response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['PhoneInfo'][2]['Number'])){ echo $response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['PhoneInfo'][2]['Number'];}?></td></td>
			</tr>
			<tr>
			<td>Gender :  <?php  if(isset($response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['PersonalInfo']['Gender'])){ echo $response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['PersonalInfo']['Gender'];}?></td>
				
				<td>Drivers License: <?php if(isset( $response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['IdentityInfo']['DriverLicence'])){    echo $response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['IdentityInfo']['DriverLicence'][0]['IdNumber'];}?></td>
				<td>Alt. Home/Other No :<?php if(isset($response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['PhoneInfo'][1]['Number'])){ echo $response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['PhoneInfo'][1]['Number'];}?></td></td>
			</tr>
			<tr>
			<td>Total Income : <?php if(isset($response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['PersonalInfo']['TotalIncome'])){ echo $response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['PersonalInfo']['TotalIncome'];}?></td>
				
				<td>Ration Card:<?php if(isset( $response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['IdentityInfo']['RationCard'])){    echo $response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['IdentityInfo']['RationCard'][0]['IdNumber'];}?></td>
				<td>Alt. Office:<?php if(isset($response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['PhoneInfo'][5]['Number'])){ echo $response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['PhoneInfo'][5]['Number'];}?></td></td>
			</tr>
			<tr>
			<td>Occupation : <?php if(isset($response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['PersonalInfo']['Occupation'])){ echo $response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['PersonalInfo']['Occupation'];}?></td>
				
				<td>Photo Credit Card:</td>
				<td>Alt. Mobile:<?php if(isset($response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['PhoneInfo'][3]['Number'])){ echo $response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['PhoneInfo'][3]['Number'];}?></td></td></td>
			</tr>
			<tr>
				<td>ID - Other: <?php if(isset( $response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['IdentityInfo']['OtherId'])){    echo $response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['IdentityInfo']['OtherId'][0]['IdNumber'];}?></td>
				<td>Email:<?php if(isset($response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['EmailAddressInfo'][0]['EmailAddress'])){ echo $response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['EmailAddressInfo'][0]['EmailAddress'];}?></td></td></td></td>
			</tr>

		</tbody>
	</table>

	<hr>

	<p style="font-size: 12px; font-weight:bold;color:darkgray">Consumer Address:</p>
	<table style="width:100%;position:fixed;font-size: 9px;" cellpadding="1">
		<tr  style="background-color: #C24641;">
			<th style="width:10%;padding-left:5px;color:white">Type</th>
			<th style="width:60%;color:white">Address</th>
			<th style="width:10%;color:white">State</th>
			<th style="width:10%;color:white">Postal</th>
			<th style="width:10%;color:white">Date Reported</th>
		</tr>
		<tbody>
		<?php if(isset($response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['AddressInfo']))
		{ foreach($response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['IDAndContactInfo']['AddressInfo'] as $address)
			{ ?>
			<tr class="separated">
				<td><?php if(isset($address['Type'])){ echo $address['Type'];}?></td>
				<td><?php if(isset($address['Address'])){ echo $address['Address'];}?></td>
				<td><?php if(isset($address['State'])){echo $address['State'];}?></td>
				<td><?php if(isset($address['Postal'])){echo $address['Postal'];}?></td>
				<td><?php if(isset($address['ReportedDate'])){echo $address['ReportedDate'];}?></td>
			</tr>
		<?php  } } ?>
			
		
		</tbody>
	</table>

	<hr>
	<p style="font-size: 12px; font-weight:bold;color:darkgray">Equifax Scores:</p>

	<table style="width:100%;position:fixed;font-size: 9px;" cellpadding="1">
		<tr  style="background-color: #C24641;">
			<th style="width:33%;padding-left:5px;color:white;font-size: 9px;">Score Name</th>
			<th style="width:33%;color:white;font-size: 9px;">Score</th>
			<th style="width:33%;color:white;font-size: 9px;">Score Elements</th>
			
		</tr>
		<tbody style="margin-top: 5rem">
			<tr><td></td><td></td></tr>
			<tr class="separated">
				<td  style="width:20%">Equifax Risk Score</td>
				<td  style="width:20%; font-weight:bold;color:Black;"><?php if(isset($response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RecentActivities']['TotalInquiries'])){echo $response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['ScoreDetails'][0]['Value'];}?></td>
				<td  style="width:50%">1. Number of commercial trades.<br>
				    2. Delinquency or past due amount occurences.<br>
					3. Vintage of trades.<br>
					4. Number of business loan trades.<br>
					5.Number of or lack of agri loan trades.<br>
				</td>
			</tr>
		</tbody>
	</table>

	

		<hr>
		<p style="font-size: 12px; font-weight:bold;color:darkgray">Recent Activity:</p>
		<table style="width:100%;position:fixed;font-size: 9px;" cellpadding="2">
			<tr  style="background-color: #C24641;">
				<th style="width:20%"></th>
				<th style="width:13%"></th>
				<th style="color:white;width:15%">Recent Activity (last 90 days)</th>
				<th style="width:20%"></th>
			</tr>
			<tbody>

				<tr class="separated">
					<td>Total Inquiries :<?php if(isset($response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RecentActivities']['TotalInquiries'])){echo $response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RecentActivities']['TotalInquiries'];}?></td>
					<td>Accounts Opened :<?php  if(isset($response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RecentActivities']['AccountsOpened'])){echo $response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RecentActivities']['AccountsOpened'];}?></td>
					<td style="padding-left: 5rem">Accounts Updated :<?php  if(isset($response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RecentActivities']['AccountsUpdated'])){ echo $response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RecentActivities']['AccountsUpdated'];}?></td>
					<td>Accounts Delinquen :<?php   if(isset($response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RecentActivities']['AccountsDeliquent'])){echo $response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RecentActivities']['AccountsDeliquent'];}?></td>
				</tr>
			</tbody>
		</table>

		<hr>

		<p style="font-size: 12px; font-weight:bold;color:darkgray">Summary:</p>
		<table style="width:100%;position:fixed;font-size: 9px;" cellpadding="2">
			<tr  style="background-color: #C24641;">
				<th style="color:white;text-align:center">Credit Report Summary</th>
			</tr>
		</table>

		<table style="width:100%;position:fixed;font-size: 9px;">
			<tr>
				<th style="width:25%;"></th>
				<th style="width:5%;"></th>
				<th style="width:20%;"></th>
				<th style="width:15%;"></th>
				<th style="width:20%;"></th>
				<th style="width:20%;"></th>
			</tr>
			<tr class="separated"> 
				<td>Number of Accounts :</td><td class="bold">  <?php if(isset($response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfAccounts'])){ echo $response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfAccounts'];}?></td>
				<td>Total Balance Amount :</td><td class="bold"> <?php  if(isset($response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['TotalBalanceAmount'])){echo $response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['TotalBalanceAmount'];}?></td>
				<td>Recent Account :</td><td class="bold"> <?php  if(isset($response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['RecentAccount'])){echo $response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['RecentAccount'];}?></td>
			</tr>
			<tr class="separated"> 
				<td>Number of Active Accounts :</td><td class="bold"> <?php if(isset($response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfActiveAccounts'])){echo $response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfActiveAccounts'];}?></td>
				<td>Total Past Due Amount :</td><td class="bold"> <?php if(isset($response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['TotalPastDue'])){ echo $response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['TotalPastDue'];}?></td>
				<td>Oldest Account :</td><td class="bold"> <?php  if(isset($response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['OldestAccount'])){echo $response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['OldestAccount'];}?></td>

			</tr>
			<tr class="separated"> 
				<td>Number of Past Due Accounts :</td><td class="bold"><?php  if(isset($response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfPastDueAccounts'])){echo $response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfPastDueAccounts'];}?></td>
				<td>Total High Credi :</td><td class="bold"><?php  if(isset($response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['TotalHighCredit'])){echo $response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['TotalHighCredit'];}?></td>
				<td>Total Credit Limit :</td><td class="bold"><?php  if(isset($response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['TotalCreditLimit'])){echo $response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['TotalCreditLimit'];}?></td>

			</tr>
			<tr class="separated"> 
				<td>Number of Write-off Accounts :</td><td class="bold"><?php  if(isset($response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfWriteOffs'])){ echo $response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfWriteOffs'];}?></td>
				<td>Total Sanction Amount :</td><td class="bold"><?php  if(isset($response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['TotalSanctionAmount'])){ echo $response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['TotalSanctionAmount'];}?></td>
				<td>Single Highest Credit :</td><td class="bold"><?php  if(isset($response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['SingleHighestCredit'])){ echo $response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['SingleHighestCredit'];}?></td>
			</tr>
			<tr class="separated"> 
				<td>Number of Zero Balance Accounts :</td><td class="bold"><?php if(isset($response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfZeroBalanceAccounts'])){ echo $response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['NoOfZeroBalanceAccounts'];}?></td>
				<td>Total Monthly Payment Amount :</td><td class="bold"><?php if(isset($response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['TotalMonthlyPaymentAmount'])){ echo $response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['TotalMonthlyPaymentAmount'];}?></td>
				<td>Single Highest Sanction Amount :</td><td class="bold"><?php if(isset($response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['SingleHighestSanctionAmount'])){ echo $response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['SingleHighestSanctionAmount'];}?></td>
			</tr>
			<tr class="separated"> 
				<td>Most Severe Status < 24 Months :</td><td class="bold"> <?php if(isset($response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['MostSevereStatusWithIn24Months'])){ echo $response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['MostSevereStatusWithIn24Months'];}?></td>
				<td>Average Open Balance :</td><td class="bold"><?php if(isset($response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['AverageOpenBalance'])){ echo $response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['AverageOpenBalance'];}?></td>
				<td>Single Highest Balance :</td><td class="bold"><?php if(isset($response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['SingleHighestBalance'])){ echo $response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountsSummary']['SingleHighestBalance'];}?></td>
			</tr>

		</table>

		<hr>

		<p style="font-size: 12px; font-weight:bold;color:darkgray">Account Details:</p>
		<?php if(isset($response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountDetails'])){foreach($response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['RetailAccountDetails'] as $account){?>
		<table style="width:100%;position:fixed; margin-top:20px;font-size: 9px;" cellpadding="2">
			<tr  style="background-color: #C24641;">
				<th style="color:white;text-align:center; width=100%;">Account</th>
			</tr>
		</table>

		<table style="width:100%;position:fixed;font-size: 9px;">
			<tr class="">
				<td style="width:30%;font-size: 9px;">Acct :<span class="bold">  <?php if(isset($account['AccountNumber'])){ echo $account['AccountNumber']; } ?></span></td>
				<td style="width:30%;font-size: 9px;">Balance :<span class="bold">  <?php if(isset($account['Balance'])){ echo $account['Balance']; } ?></span></td>
				<td style="width:30%;font-size: 9px;">Open :<span class="bold">  <?php if(isset($account['Open'])){ echo $account['Open']; } ?></span></td>
				<td style="width:20%;font-size: 9px;">Date Reported :<span class="bold"> <?php if(isset($account['DateReported'])){ echo $account['DateReported']; } ?></span></td>
			</tr>
			<tr class="">
				<td style="width:30%">Institution :</i><span class="bold"> <?php if(isset($account['Institution'])){ echo $account['Institution']; } ?></span></td>
				<td style="width:30%">Past Due Amount :<span class="bold"> <?php if(isset($account['PastDueAmount'])){ echo $account['PastDueAmount']; } ?></span></td>
				<td style="width:30%">Interest Rate :<span class="bold"> <?php if(isset($account['InterestRate'])){ echo $account['InterestRate']; } ?></span></td>
				<td style="width:20%">Date Opened :<span class="bold"> <?php if(isset($account['DateOpened'])){ echo $account['DateOpened']; } ?></span></td>
			</tr>
			<tr class="">
				<td style="width:30%">Type :<span class="bold"> <?php if(isset($account['AccountType'])){ echo $account['AccountType']; } ?></span></td>
				<td style="width:30%">Last Payment :<span class="bold"> <?php if(isset($account['LastPayment'])){ echo $account['LastPayment']; } ?></span></td>
				<td style="width:30%">Last Payment Date:<span class="bold"> <?php if(isset($account['LastPaymentDate'])){ echo $account['LastPaymentDate']; } ?></span></td>
				<td style="width:20%">Date Closed :<span class="bold"> <?php if(isset($account['DateClosed'])){ echo $account['DateClosed']; } ?></span></td>
			</tr>
			<tr class=" separated2">
				<td style="width:30%">Ownership Type :<span class="bold"> <?php if(isset($account['OwnershipType'])){ echo $account['OwnershipType']; } ?></span></td>
				<td style="width:30%">Write-off Amount :<span class="bold"> <?php if(isset($account['WriteOffAmount'])){ echo $account['WriteOffAmount']; } ?></span></td>
				<td style="width:30%">Sanction Amount :<span class="bold"> <?php if(isset($account['SanctionAmount'])){ echo $account['SanctionAmount']; } ?></span></td>
				<td style="width:20%">Reason:<span class="bold"> <?php if(isset($account['Reason'])){ echo $account['Reason']; } ?></span></td>
			</tr>

			<tr class="">
				<td style="width:30%">Repayment Tenure :<span class="bold"> <?php if(isset($account['RepaymentTenure'])){ echo $account['RepaymentTenure']; } ?></span></td>
				<td style="width:30%">Monthly Payment Amount :<span class="bold"> <?php if(isset($account['InstallmentAmount'])){ echo $account['InstallmentAmount']; } ?></span></td>
				<td style="width:30%">Credit Limit:<span class="bold"> <?php if(isset($account['CreditLimit'])){ echo $account['CreditLimit']; } ?></span></td>
				<td style="width:20%">Collateral Value:<span class="bold"> <?php if(isset($account['CollateralValue'])){ echo $account['CollateralValue']; } ?></span></td>
			</tr>

			<tr class=" separated2">
				<td style="width:30%">Dispute Code:<span class="bold"> <?php if(isset($account['DisputeCode'])){ echo $account['DisputeCode']; } ?></span></td>
				<td style="width:30%">Term Frequency:<span class="bold"> <?php if(isset($account['TermFrequency'])){ echo $account['TermFrequency']; } ?></span></td>
				<td style="width:30%"><span class="bold"> </span></td>
				<td style="width:20%">Collateral Type:<span class="bold"> <?php if(isset($account['CollateralType'])){ echo $account['CollateralType']; } ?></span></td>
			</tr>

			<tr class="">
				<td style="width:10%">Account status :<span class="bold"> <?php if(isset($account['AccountStatus'])){ echo $account['AccountStatus']; } ?></span></td>
			</tr>

			<tr class="">
				<td style="width:10%">Asset Classification :<span class="bold"> <?php if(isset($account['AssetClassification'])){ echo $account['AssetClassification']; } ?></span></td>
			</tr>

			<tr class=" separated2">
				<td style="width:10%">Suit Filed Status:<span class="bold"> <?php if(isset($account['SuitFiledStatus'])){ echo $account['SuitFiledStatus']; } ?></span></td>
				<td style="width:30%"></td>
				<td style="width:30%"></td>
				<td style="width:25%"></td>
			</tr>
		</table>
		<br>


		<table style="width:100%;position:fixed;font-size: 9px;" class="border">
		
		<tr class="size">
			<th style="width:20%;font-weight: lighter;">History:</th>
			<?php  $i=1; $array_first_15 =array_slice($account['History48Months'],0,15);
			foreach($array_first_15 as $acc){?>
			
			<td style="width:2%;font-size: 9px;"><?php echo $acc['key']; ?></td>
			<?php $i++; } ?>
		</tr>
		<tr class="size">
			<th style="width:20%;font-weight: lighter">Account Status:</th>
			<?php $i=1; $array_first_15 =array_slice($account['History48Months'],0,15);
			foreach($array_first_15 as $acc){
			if(isset($acc['PaymentStatus'])){if ($acc['PaymentStatus']=='01+' || $acc['PaymentStatus']=='121+' || $acc['PaymentStatus']=='181+' || $acc['PaymentStatus']=='31+' || $acc['PaymentStatus']=='61+' || $acc['PaymentStatus']=='91+'){?>
			<td style="width:2%;font-size: 9px;" bgcolor="yellow" > <?php if(isset($acc['PaymentStatus'])){ echo $acc['PaymentStatus']; } ?></td>
			<?php }else
			{?> <td style="width:2%;font-size: 9px;"> <?php if(isset($acc['PaymentStatus'])){ echo $acc['PaymentStatus']; } ?>
			<?php } }?>
			<?php } ?>

		</tr>
		<tr class="size">
			<th style="width:20%;font-weight: lighter">Asset Classification:</th>
			<?php $i=1; $array_first_15 =array_slice($account['History48Months'],0,15);
			foreach($array_first_15 as $acc){?>
			<td style="width:2%;font-size: 9px;"> <?php if(isset($acc['AssetClassificationStatus'])){ echo $acc['AssetClassificationStatus']; } ?></td>
			<?php } ?>
		</tr>

		<tr class="size">
			<th style="width:20%;font-weight: lighter;">Suit Field Status:</th>
			<?php $i=1; $array_first_15 =array_slice($account['History48Months'],0,15);
			foreach($array_first_15 as $acc){?>
			<td style="width:2%;font-size: 9px;"><?php if(isset($acc['SuitFiledStatus'])){ echo $acc['SuitFiledStatus']; } ?></td>
			<?php } ?>

		</tr>
	
		<!------------------------------------------------------------------------------------------------------->
		<?php if(isset($account['History48Months'][16])) {?>
		<tr class="size">
			<th style="width:20%;font-weight: lighter;">History:</th>
			<?php  $i=1; $array_remove_first_15 =array_slice($account['History48Months'],15);
						 $array_second_15 =array_slice($array_remove_first_15,0,15);
						 
			foreach( $array_second_15  as $acc){?>
			
			<td style="width:2%;font-size: 9px;"><?php echo $acc['key']; ?></td>
			<?php $i++; } ?>
		</tr>

		<tr class="size">
			<th style="width:20%;font-weight: lighter">Account Status:</th>
			<?php $i=1; $array_remove_first_15 =array_slice($account['History48Months'],15);
						 $array_second_15 =array_slice($array_remove_first_15,0,15);
						 
			foreach( $array_second_15  as $acc){
			if(isset($acc['PaymentStatus'])){if ($acc['PaymentStatus']=='01+' || $acc['PaymentStatus']=='121+' || $acc['PaymentStatus']=='181+' || $acc['PaymentStatus']=='31+' || $acc['PaymentStatus']=='61+' || $acc['PaymentStatus']=='91+'){?>
			<td style="width:2%;font-size: 9px;" bgcolor="yellow" > <?php if(isset($acc['PaymentStatus'])){ echo $acc['PaymentStatus']; } ?></td>
			<?php }else
			{?> <td style="width:2%;font-size: 9px;"> <?php if(isset($acc['PaymentStatus'])){ echo $acc['PaymentStatus']; } ?>
			<?php } }?>
			<?php } ?>

		</tr>
		<tr class="size">
			<th style="width:20%;font-weight: lighter">Asset Classification:</th>
			<?php $i=1; $array_remove_first_15 =array_slice($account['History48Months'],15);
						 $array_second_15 =array_slice($array_remove_first_15,0,15);
						 
			foreach( $array_second_15  as $acc){?>
			<td style="width:2%;font-size: 9px;"> <?php if(isset($acc['AssetClassificationStatus'])){ echo $acc['AssetClassificationStatus']; } ?></td>
			<?php } ?>
		</tr>

		<tr class="size">
			<th style="width:20%;font-weight: lighter;">Suit Field Status:</th>
			<?php $i=1; $array_remove_first_15 =array_slice($account['History48Months'],15);
						 $array_second_15 =array_slice($array_remove_first_15,0,15);
						 
			foreach( $array_second_15  as $acc){?>
			<td style="width:2%;font-size: 9px;"><?php if(isset($acc['SuitFiledStatus'])){ echo $acc['SuitFiledStatus']; } ?></td>
			<?php } ?>

		</tr>
		<?php } ?>
		<!------------------------------------------------------------------------------------------>
		<?php if(isset($account['History48Months'][31])) {?>
		<tr class="size">
			<th style="width:20%;font-weight: lighter;">History:</th>
			<?php  $i=1; $array_remove_first_30 =array_slice($account['History48Months'],30);
						 $array_third_15 =array_slice($array_remove_first_30,0,15);
						 
			foreach( $array_third_15 as $acc){?>
			
			<td style="width:2%;font-size: 9px;"><?php echo $acc['key']; ?></td>
			<?php $i++; } ?>
		</tr>


		<tr class="size">
			<th style="width:20%;font-weight: lighter">Account Status:</th>
			<?php  $i=1; $array_remove_first_30 =array_slice($account['History48Months'],30);
						 $array_third_15 =array_slice($array_remove_first_30,0,15);
						 
			foreach( $array_third_15 as $acc){
			if(isset($acc['PaymentStatus'])){if ($acc['PaymentStatus']=='01+' || $acc['PaymentStatus']=='121+' || $acc['PaymentStatus']=='181+' || $acc['PaymentStatus']=='31+' || $acc['PaymentStatus']=='61+' || $acc['PaymentStatus']=='91+'){?>
			<td style="width:2%;font-size: 9px;" bgcolor="yellow" > <?php if(isset($acc['PaymentStatus'])){ echo $acc['PaymentStatus']; } ?></td>
			<?php }else
			{?> <td style="width:2%;font-size: 9px;"> <?php if(isset($acc['PaymentStatus'])){ echo $acc['PaymentStatus']; } ?>
			<?php } }?>
			<?php } ?>

		</tr>
		<tr class="size">
			<th style="width:20%;font-weight: lighter">Asset Classification:</th>
			<?php  $i=1; $array_remove_first_30 =array_slice($account['History48Months'],30);
						 $array_third_15 =array_slice($array_remove_first_30,0,15);
						 
			foreach( $array_third_15 as $acc){?>
			<td style="width:2%;font-size: 9px;"> <?php if(isset($acc['AssetClassificationStatus'])){ echo $acc['AssetClassificationStatus']; } ?></td>
			<?php } ?>
		</tr>

		<tr class="size">
			<th style="width:20%;font-weight: lighter;">Suit Field Status:</th>
			<?php $i=1; $array_remove_first_30 =array_slice($account['History48Months'],30);
						 $array_third_15 =array_slice($array_remove_first_30,0,15);
						 
			foreach( $array_third_15 as $acc){?>
			<td style="width:2%;font-size: 9px;"><?php if(isset($acc['SuitFiledStatus'])){ echo $acc['SuitFiledStatus']; } ?></td>
			<?php } ?>

		</tr>
		<?php }?>
	  <!------------------------------------------------------------------------------------------>
	  <?php if(isset($account['History48Months'][46])) {?>
		<tr class="size">
			<th style="width:20%;font-weight: lighter;">History:</th>
			<?php  $i=1; $array_remove_first_45 =array_slice($account['History48Months'],45);
						 $array_fourth_15 =array_slice($array_remove_first_45,0,15);
						 
			foreach( $array_fourth_15 as $acc){?>
			
			<td style="width:2%;font-size: 9px;"><?php echo $acc['key']; ?></td>
			<?php $i++; } ?>
		</tr>


		<tr class="size">
			<th style="width:20%;font-weight: lighter">Account Status:</th>
			<?php  $i=1; $array_remove_first_45 =array_slice($account['History48Months'],45);
						 $array_fourth_15 =array_slice($array_remove_first_45,0,15);
						 
			foreach( $array_fourth_15 as $acc){
			if(isset($acc['PaymentStatus'])){if ($acc['PaymentStatus']=='01+' || $acc['PaymentStatus']=='121+' || $acc['PaymentStatus']=='181+' || $acc['PaymentStatus']=='31+' || $acc['PaymentStatus']=='61+' || $acc['PaymentStatus']=='91+'){?>
			<td style="width:2%;font-size: 9px;" bgcolor="yellow" > <?php if(isset($acc['PaymentStatus'])){ echo $acc['PaymentStatus']; } ?></td>
			<?php }else
			{?> <td style="width:2%;font-size: 9px;"> <?php if(isset($acc['PaymentStatus'])){ echo $acc['PaymentStatus']; } ?>
			<?php } }?>
			<?php } ?>

		</tr>
		<tr class="size">
			<th style="width:20%;font-weight: lighter">Asset Classification:</th>
			<?php $i=1; $array_remove_first_45 =array_slice($account['History48Months'],45);
						 $array_fourth_15 =array_slice($array_remove_first_45,0,15);
						 
			foreach( $array_fourth_15 as $acc){?>
			<td style="width:2%;font-size: 9px;"> <?php if(isset($acc['AssetClassificationStatus'])){ echo $acc['AssetClassificationStatus']; } ?></td>
			<?php } ?>
		</tr>

		<tr class="size">
			<th style="width:20%;font-weight: lighter;">Suit Field Status:</th>
			<?php $i=1; $array_remove_first_45 =array_slice($account['History48Months'],45);
						 $array_fourth_15 =array_slice($array_remove_first_45,0,15);
						 
			foreach( $array_fourth_15 as $acc){?>
			<td style="width:2%;font-size: 9px;"><?php if(isset($acc['SuitFiledStatus'])){ echo $acc['SuitFiledStatus']; } ?></td>
			<?php } ?>

		</tr>
		<?php }?>
	</table>

		<?php } }?>
	

	
		<hr>
		<p style="font-size: 12px; font-weight:bold;color:darkgray">Enquiries:</p>
        <?php if(isset($response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['Enquiries'])){foreach($response['CCRResponse']['CIRReportDataLst'][0]['CIRReportData']['Enquiries'] as $Enquirie){?>
		<table style="width:100%;position:fixed;font-size: 9px;" cellpadding="1">
			<tr  style="background-color: #C24641;">
				<th style="width:40%;padding-left:5px;color:white">Institution</th>
				<th style="width:20%;color:white">Date</th>
				<th style="width:13%;color:white">Time</th>
				<th style="width:13%;color:white">Purpose</th>
				<th style="width:13%;color:white">Amount</th>
			</tr>
			<tbody style="margin-top: 5rem">
				<tr class="separated">
					<td><?php if(isset($Enquirie['Institution'])){ echo $Enquirie['Institution']; } ?></td>
					<td><?php if(isset($Enquirie['Date'])){ echo $Enquirie['Date']; } ?></td>
					<td><?php if(isset($Enquirie['Time'])){ echo $Enquirie['Time']; } ?></td>
					<td><?php if(isset($Enquirie['RequestPurpose'])){ echo $Enquirie['RequestPurpose']; } ?></td>
					<td><?php if(isset($Enquirie['Amount'])){ echo $Enquirie['Amount']; } ?></td>
				</tr>
			</tbody>
		</table>
		<?php } }?>

		<hr>
     
		<p style="font-size: 12px; font-weight:bold;color:darkgray">Input Enquiry:</p>

		<table style="width:100%;position:fixed;font-size: 9px;" cellpadding="1">
			<tr  style="background-color: #C24641;">
				<th style="width:33%;padding-left:5px;color:white">Personal Information</th>
				<th style="width:33%;color:white">Identification</th>
				<th style="width:33%;color:white">Contact Details</th>
			</tr>
			<tbody>
				<tr>
					<td>Consumers First Name :<span class="bold"> <?php if(isset($response['CCRResponse']['CIRReportDataLst'][0]['InquiryRequestInfo']['FirstName'])){ echo $response['CCRResponse']['CIRReportDataLst'][0]['InquiryRequestInfo']['FirstName']; } ?></span></td>
					<td>PAN :<span class="bold"> <?php if(isset($response['CCRResponse']['CIRReportDataLst'][0]['InquiryRequestInfo']['IDDetails'][0]['IDValue'])){ echo $response['CCRResponse']['CIRReportDataLst'][0]['InquiryRequestInfo']['IDDetails'][0]['IDValue']; } ?></span></td>
					<td>Address :<span class="bold"> <?php if(isset($response['CCRResponse']['CIRReportDataLst'][0]['InquiryRequestInfo']['InquiryAddresses'][0]['AddressLine1'])){ echo $response['CCRResponse']['CIRReportDataLst'][0]['InquiryRequestInfo']['InquiryAddresses'][0]['AddressLine1']; } ?></span></td>
				</tr>
				<tr>
					<td>DOB :<span class="bold"> <?php if(isset($response['CCRResponse']['CIRReportDataLst'][0]['InquiryRequestInfo']['DOB'])){ echo $response['CCRResponse']['CIRReportDataLst'][0]['InquiryRequestInfo']['DOB']; } ?></span></td>
					<td>Voter ID:<span class="bold"></span></td>
					<td></td>
				</tr>
				<tr>
					<td>Gender :<span class="bold"> <?php if(isset($response['CCRResponse']['CIRReportDataLst'][0]['InquiryRequestInfo']['Gender'])){ echo $response['CCRResponse']['CIRReportDataLst'][0]['InquiryRequestInfo']['Gender']; } ?></span></td>
					<td>UID:<span class="bold"></span></td>
					<td>State:<span class="bold"> <?php if(isset($response['CCRResponse']['CIRReportDataLst'][0]['InquiryRequestInfo']['InquiryAddresses'][0]['State'])){ echo $response['CCRResponse']['CIRReportDataLst'][0]['InquiryRequestInfo']['InquiryAddresses'][0]['State']; } ?></span></td>
				</tr>
				<tr>
					<td>Inquiry / Request Purpose :<span class="bold"><?php if(isset($response['CCRResponse']['CIRReportDataLst'][0]['InquiryRequestInfo']['InquiryPurpose'])){ echo $response['CCRResponse']['CIRReportDataLst'][0]['InquiryRequestInfo']['InquiryPurpose']; } ?></span></td>
					<td>Drivers License:<span class="bold"></span></td>
					<td>Postal :<span class="bold"> <?php if(isset($response['CCRResponse']['CIRReportDataLst'][0]['InquiryRequestInfo']['InquiryAddresses'][0]['Postal'])){ echo $response['CCRResponse']['CIRReportDataLst'][0]['InquiryRequestInfo']['InquiryAddresses'][0]['Postal']; } ?></span></td>
				</tr>
				<tr>
					<td>Transaction Amount :<span class="bold"> <?php if(isset($response['CCRResponse']['CIRReportDataLst'][0]['InquiryRequestInfo']['TransactionAmount'])){ echo $response['CCRResponse']['CIRReportDataLst'][0]['InquiryRequestInfo']['TransactionAmount']; } ?></span></td>
					<td>Mobile:<span class="bold"><?php if(isset($response['CCRResponse']['CIRReportDataLst'][0]['InquiryRequestInfo']['InquiryPhones'][0]['Number'])){ echo $response['CCRResponse']['CIRReportDataLst'][0]['InquiryRequestInfo']['InquiryPhones'][0]['Number']; } ?></span></td>
					<td>Home :<span class="bold"></span></td>
				</tr>
			</tbody>
		</table>

		<hr>

		<p style="font-size: 12px; font-weight:bold;color:darkgray">Glossary, Terms and Explanations:</p>

		<table style="width:100%;position:fixed;font-size: 9px;" cellpadding="1">
			<tr  style="background-color: #C24641;">
				<th style="width:30%;padding-left:5px;color:white">Code</th>
				<th style="width:70%;color:white">Description</th>
			</tr>
		</table>

		<hr>

		<table style="width:100%;position:fixed;font-size: 9px;" cellpadding="1">
			<tr>
				<th style="width:30%;padding-left:5px;color:white"></th>
				<th style="width:70%;color:white" colspan="2"></th>
			</tr>

			<tbody class="border2">

				<tr>
					<td>000</td>
					<td>current account</td>
				</tr>
				<tr>
					<td>CLSD</td>
					<td>Paid or closed account/zero balance</td>
				</tr>
				<tr>
					<td>NEW</td>
					<td>New Account</td>
				</tr>
				<tr>
					<td>LNSB</td>
					<td>Loan Submitted</td>
				</tr>
				<tr>
					<td>LAND</td>
					<td>Loan Approved - Not yet disbursed</td>
				</tr>
				<tr>
					<td>INAC</td>
					<td>Account is Inactive</td>
				</tr>
				<tr>
					<td>CON</td>
					<td>Contact Member for Status</td>
				</tr>
				<tr>
					<td>01+</td>
					<td>1-30 days past due</td>
				</tr>
				<tr>
					<td>31+</td>
					<td>31-60 days past due</td>
				</tr>
				<tr>
					<td>DEC</td>
					<td>Loan Declined</td>
				</tr>
				<tr>
					<td>61+</td>
					<td>61-90 days past due</td>
				</tr>
				<tr>
					<td>SPM</td>
					<td>Special Mention</td>
				</tr>
				<tr>
					<td>SUB</td>
					<td>Sub-standard</td>
				</tr>
				<tr>
					<td>RES</td>
					<td>Restructured Loan</td>
				</tr>
				<tr>
					<td>RGM</td>
					<td>Restructured Loan - Govt Mandate</td>
				</tr>
				<tr>
					<td>SET</td>
					<td>Settled</td>
				</tr>
				<tr>
					<td>SF</td>
					<td>Suit Filed</td>
				</tr>
				<tr>
					<td>91+ </td>
					<td>91-120 days past due</td>
				</tr>
				<tr>
					<td>121+</td>
					<td>121 - 179 days past due</td>
				</tr>
				<tr>
					<td>181+</td>
					<td>180 or more days past due</td>
				</tr>
				<tr>
					<td>DBT</td>
					<td>Doubtful</td>
				</tr>
				<tr>
					<td>FPD </td>
					<td>First Payment Default</td>
				</tr>
				<tr>
					<td>WDF </td>
					<td>Willful Default</td>
				</tr>
				<tr>
					<td>PWOS  </td>
					<td>Post Written Off/Settled</td>
				</tr>
				<tr>
					<td>WOF  </td>
					<td>Charge Off/Written Off</td>
				</tr>
				<tr>
					<td>STD</td>
					<td>Standard</td>
				</tr>
				<tr>
					<td>SUB</td>
					<td>Sub-standard</td>
				</tr>
				<tr>
					<td>DBT</td>
					<td>Doubtful</td>
				</tr>
				<tr>
					<td>LOSS</td>
					<td>Loss</td>
				</tr>
				<tr>
					<td>SPM </td>
					<td>Special Mention Account</td>
				</tr>
				<tr>
					<td>SFR</td>
					<td>Suit Filed-Restructured</td>
				</tr>
				<tr>
					<td>SF</td>
					<td>Suit Filed</td>
				</tr>
				<tr>
					<td>WDF</td>
					<td>Willful Default</td>
				</tr>
				<tr>
					<td>SFWD</td>
					<td>Suit Filed-Willful Default</td>
				</tr>
				<tr>
					<td>WOF</td>
					<td>Written Off</td>
				</tr>
				<tr>
					<td>SFWO </td>
					<td>Suit Filed and Written Off</td>
				</tr>
				<tr>
					<td>WDWO</td>
					<td>Willful Default and Written Off</td>
				</tr>
				<tr>
					<td>SWDW</td>
					<td>Suit Filed, Willful Default and Written Off</td>
				</tr>
				<tr>
					<td>SET</td>
					<td>Settled</td>
				</tr>
				<tr>
					<td>*</td>
					<td>Data Not Reported</td>
				</tr>
			</tbody>


		</table>


	</pagebreak>

	<pagebreak>

		<hr>

		<p style="text-align:center;font-size: 9px;">Contact Us: Phone: 1800 209 3247 Fax: +91-22-6112-7950 Email: ecissupport@equifaxindia.com</p>

		<hr>

		<p style="font-size: 9px;">This report is to be used subject to and in compliance with the Membership agreement entered into between the Member/Specified User and Equifax Credit Information Services Private
			Limited ("ECIS"), in the case of Members/Specified Users of ECIS. In other cases, the use of this report is governed by the terms and conditions of ECIS, contained in the Application form
		submitted by the customer/user.</p>

		<p style="font-size: 9px;">This report is to be used subject to and in compliance with the Membership agreement entered into between the Member/Specified User and Equifax Credit Information Services Private
			Limited ("ECIS"), in the case of Members/Specified Users of ECIS. In other cases, the use of this report is governed by the terms and conditions of ECIS, contained in the Application form
		submitted by the customer/user</p>

	</pagebreak>


	<?php } ?>



</body>
</html>