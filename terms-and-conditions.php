<?php
include("functions.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Stellafoam - Terms and conditions</title>
	<?php
		include  'meta.php';
    ?>

    <style type="text/css">
	#content{
		padding:20px;
		text-align:center;
	}
	#footer {
		text-align:center;
		clear: both;
		padding: 15px;
		width: 934px;
		background: #f5f3f2;
	}
	#footer a{
		color:#016bb5;
		font-size:13px;
	}
	dt{
		background: #fff url(subnav-title-bg.jpg) 0 1px no-repeat;
	}
    #content .inner-content {
        margin: 20px 0;
        text-align: left;
    }
    #content .inner-content p {
        line-height: 1.6;
    }
	</style>
	<link rel="stylesheet" type="text/css" href="style.css" media="all" />
	<link rel="stylesheet" type="text/css" href="navigation.css" media="all" />
	<link rel="stylesheet" type="text/css" href="typography_core.css" media="all" />
    <?php
		include  'analytics.php';
    ?>
</head>
<body id="build">
	<div id="pageWrapper">
        <div style="width:190px;float:right"></div>
        <?php
			include  'header.php';
    	?>

        <div id="breadcrumb"><a href="/" title="Homepage">Homepage</a> > Terms and conditions
        	<div style="float:right;margin-right:2px;">
             	<?php
					$amount = 0;
					if(isset($_COOKIE["stellafoamorder"])){
						$amount = count(explode('|',$_COOKIE["stellafoamorder"]));
					}
					echo '<strong>Order List:</strong> '.$amount.' items - ';
				?>
                <a href="/cart.php">View basket</a>
        	</div>
        </div>
        <div id="content">
			<div id="title" style="margin:30px 0px 30px 0px;">STELLAFOAM LIMITED TERMS OF SALE</div>
            <p>The customer's attention is drawn in particular to the provisions of clause 9</p>
            <div class="inner-content">
                <p><h3 style="margin-top: 20px; margin-bottom: 10px;">1. Interpretation</h3></p>
                <p>1.1 Definitions</p>
                <p>In these Conditions, the following definitions apply:</p>
                <p>Business Day: a day (other than a Saturday, Sunday or public holiday) when banks in London are open for business.</p>
                <p>Conditions: the terms and conditions set out in this document as amended from time to time in accordance with clause 11.6.</p>
                <p>Contract: the contract between Stellafoam and the Customer for the sale and purchase of the Goods in accordance with these Conditions.</p>
                <p>Customer: the person or firm who purchases the Goods from Stellafoam.</p>
                <p>Force Majeure Event: has the meaning given in clause 10.</p>
                <p>Goods: the goods (or any part of them) set out in the Order.</p>
                <p>Stellafoam: Stellafoam Limited (company number 00676869).</p>
                <p>Order: the Customer's order for the Goods, as set out in the Customer's purchase order form or in the Customer's written acceptance of Stellafoam's quotation, as the case may be.</p>
                <p>Specification: any specification for the Goods, including any related plans and drawings, that is agreed in writing by the Customer and Stellafoam.</p>
                <p>1.2 Construction</p>
                <p>In these Conditions, the following rules apply:</p>
                <p>(a) A person includes a natural person, corporate or unincorporated body (whether or not having separate legal personality).</p>
                <p>(b) A reference to a party includes its personal representatives, successors or permitted assigns.</p>
                <p>(c) A reference to a statute or statutory provision is a reference to such statute or provision as amended or re-enacted. A reference to a statute or statutory provision includes any subordinate legislation made under that statute or statutory provision, as amended or re-enacted.</p>
                <p>(d) Any phrase introduced by the terms including, include, in particular or any similar expression shall be construed as illustrative and shall not limit the sense of the words preceding those terms.</p>
                <p>(e) A reference to writing or written includes faxes and e-mails.</p>
                <p><h3 style="margin-top: 20px; margin-bottom: 10px;">2. Basis of Contract</h3></p>
                <p>2.1 These Conditions apply to the Contract to the exclusion of any other terms that the Customer seeks to impose or incorporate, or which are implied by trade, custom, practice or course of dealing.</p>
                <p>2.2 The Order constitutes an offer by the Customer to purchase the Goods in accordance with these Conditions. The Customer is responsible for ensuring that the terms of the Order and any applicable Specification are complete and accurate.</p>
                <p>2.3 The Order shall only be deemed to be accepted when Stellafoam issues a written acceptance of the Order, at which point the Contract shall come into existence.</p>
                <p>2.4 The Contract constitutes the entire agreement between the parties. The Customer acknowledges that it has not relied on any statement, promise or representation made or given by or on behalf of Stellafoam which is not set out in the Contract.</p>
                <p>2.5 Any samples, drawings, descriptive matter, or advertising produced by Stellafoam and any descriptions or illustrations contained in Stellafoam's catalogues or brochures are produced for the sole purpose of giving an approximate idea of the Goods</p>
                <p>described in them. They shall not form part of the Contract or have any contractual force.</p>
                <p>2.6 A quotation for the Goods given by Stellafoam shall not constitute an offer. A quotation shall only be valid for the period of time (if any) specified therein.</p>
                <p><h3 style="margin-top: 20px; margin-bottom: 10px;">3. Goods</h3></p>
                <p>3.1 The Goods are described in Stellafoam's sales literature (as modified by any applicable Specification) or in the Specification. The sales literature (including product prices) was correct at time of print, but is subject to change from time to time. The Customer should ensure that they have the up to date price for the Goods before making an Order.</p>
                <p>3.2 To the extent that the Goods are to be manufactured in accordance with a Specification supplied by the Customer, the Customer shall indemnify Stellafoam against all liabilities, costs, expenses, damages and losses (including any direct, indirect or consequential losses, loss of profit, loss of reputation and all interest, penalties and legal and other professional costs and expenses) suffered or incurred by Stellafoam in connection with any claim made against Stellafoam for actual or alleged infringement of a third party's intellectual property rights arising out of or in connection with Stellafoam's use of the Specification. This clause 3.2 shall survive termination of the Contract.</p>
                <p>3.3 Stellafoam reserves the right to amend the specification of the Goods if required by any applicable statutory or regulatory requirements.</p>
                <p><h3 style="margin-top: 20px; margin-bottom: 10px;">4. Delivery</h3></p>
                <p>4.1 Stellafoam shall ensure that each delivery of the Goods is accompanied by a delivery note which shows the date of the Order, all relevant Customer and Stellafoam reference numbers, the type and quantity of the Goods (including the code numberof the Goods, where applicable), special storage instructions (if any) and, if the Order is being delivered by instalments, the outstanding balance of Goods remaining to be delivered.</p>
                <p>4.2 Stellafoam shall deliver the Goods to the location set out in the Order or such other location as the parties may agree (Delivery Location) at any time after Stellafoam notifies the Customer that the Goods are ready.</p>
                <p>4.3 Delivery of the Goods shall be completed on the Goods' arrival at the Delivery Location.</p>
                <p>4.4 Any dates quoted for delivery are approximate only, and the time of delivery is not of the essence. Stellafoam shall not be liable for any delay in delivery of the Goods that is caused by a Force Majeure Event or the Customer's failure to provide Stellafoam with adequate delivery instructions or any other instructions that are relevant to the supply of the Goods or any other default of the Customer.</p>
                <p>4.5 The Customer shall provide, at its own expense, the labour necessary for unloading the Goods, such labour to be available during normal working hours on the day notified by Stellafoam for delivery. Stellafoam shall not be liable for any damage that occurs in the course of unloading. The Customer shall unload the Goods with reasonable speed. If Stellafoam’s delivery vehicle is kept waiting for an unreasonable time or is obliged to return to Stellafoam without completing delivery through lack of assistance or if additional staff have to accompany Stellafoam’s driver to unload the Goods, an appropriate additional charge will be made.</p>
                <p>4.6 Where Stellafoam in its absolute discretion determines that mechanical handling or cranage is appropriate for delivery, such facilities must be provided by the Customer on site to facilitate the unloading of the Goods from the delivery vehicle.</p>
                <p>4.7 The Customer warrants that the delivery address will be capable of receiving delivery by large lorry. Stellafoam reserves the right to refuse to deliver Goods to premises considered at the discretion of Stellafoam to be unsuitable and to charge an appropriate fee in respect of any failed delivery.</p>
                <p>4.8 If Stellafoam fails to deliver the Goods, its liability shall be limited to the costs and expenses incurred by the Customer in obtaining replacement goods of similar description and quality in the cheapest market available, less the price of the Goods. Stellafoam shall have no liability for any failure to deliver the Goods to the extent that such failure is caused by a Force Majeure Event or the Customer's failure to provide Stellafoam with adequate delivery instructions or any other instructions that are relevant to the supply of the Goods.</p>
                <p>4.9 If the Customer fails to accept delivery of the Goods within two Business Days of Stellafoam notifying the Customer that the Goods are ready, then, except where such failure or delay is caused by a Force Majeure Event or Stellafoam's failure to comply with its obligations under the Contract:</p>
                <p>(a) delivery of the Goods shall be deemed to have been completed at 9:00am on the second Business Day after the day on which Stellafoam notified the Customer that the Goods were ready; and</p>
                <p>(b) Stellafoam shall store the Goods until delivery takes place, and charge the Customer for all related costs and expenses (including insurance).</p>
                <p>4.10 If 14 Business Days after the day on which Stellafoam notified the Customer that the Goods were ready for delivery the Customer has not accepted delivery of the Goods, Stellafoam may resell or otherwise dispose of part or all of the Goods and, after deducting reasonable storage and selling costs, account to the Customer for any excess over the price of the Goods or charge the Customer for any shortfall below the price of the Goods.</p>
                <p>4.11 If the Customer wishes to claim that there is any shortage on the delivery of any Goods or that any of the Goods are delivered damaged, the Customer shall give notice in writing to Stellafoam within 48 hours of delivery, failing which the Goods shall be deemed to have been delivered undamaged and in accordance with the delivery documents.</p>
                <p>(a) If short delivery does take place, the Customer shall not reject the Goods but shall accept the Goods delivered as part performance of the Contract</p>
                <p>(b) If short delivery or damaged Goods are complained of, Stellafoam shall be under no liability in respect thereof unless a reasonable opportunity is provided to Stellafoam before any use thereof is made by the Customer</p>
                <p>(c)Stellafoam’s liability for short delivery or damaged Goods shall be strictly limited to the provision of any Goods not delivered or the replacement or, at Stellafoam’s option, repair of any damaged Goods.</p>
                <p>4.12 Stellafoam reserves the right to make delivery by instalments and to tender a separate invoice in respect of each instalment.</p>
                <p><h3 style="margin-top: 20px; margin-bottom: 10px;">5. Quality</h3></p>
                <p>5.1 Subject as follows, Stellafoam warrants that on delivery and for the shorter of (i) 6 months and (ii) in respect of each product, the warranty period (if any) given by the relevant manufacturer to Stellafoam (details of which available on request) (warranty period), the Goods shall:</p>
                <p>(a) conform in all material respects with their description and any applicable Specification;</p>
                <p>(b) be free from material defects in design, material and workmanship;</p>
                <p>(c) be of satisfactory quality (within the meaning of the Sale of Goods Act 1979); and</p>
                <p>(d) be fit for any purpose for which the Goods are being bought provided that the Customer had made known that purpose to Stellafoam in writing and a person authorised to sign on behalf of Stellafoam has confirmed such purpose in writing. Product descriptions / illustrations contained in Stellafoam’s sales literature are for assistance purposes only and do not constitute representations in respect of the Goods. It is the Customer’s responsibility to ensure that the Goods meet the Customer’s requirements, including as regards matching products.</p>
                <p>5.2 Subject to clause 5.3, if:</p>
                <p>(a) the Customer gives notice in writing to Stellafoam during the warranty period within a reasonable time of discovery that some or all of the Goods do not comply with the warranty set out in clause 5.1;</p>
                <p>(b) Stellafoam is given a reasonable opportunity of examining such Goods; and</p>
                <p>(c) the Customer (if asked to do so by Stellafoam) returns such Goods to Stellafoam’s place of business at the Customer’s cost, Stellafoam shall, at its option, repair or replace the defective Goods, or refund the price of the defective Goods in full.</p>
                <p>5.3 Stellafoam shall not be liable for Goods' failure to comply with the warranty set out in clause 5.1 in any of the following events:</p>
                <p>(a) the Customer makes any further use of such Goods after giving notice in accordance with clause 5.2;</p>
                <p>(b) the defect arises because the Customer failed to follow Stellafoam's oral or written instructions as to the storage, commissioning, installation, use and maintenance of the Goods or (if there are none) good trade practice regarding the same;</p>
                <p>(c) the defect arises as a result of Stellafoam following any drawing, design or Specification supplied by the Customer;</p>
                <p>(d) the Customer alters or repairs such Goods without the written consent of Stellafoam;</p>
                <p>(e) the defect arises as a result of fair wear and tear, wilful damage, negligence, or abnormal storage or working conditions; or</p>
                <p>(f) the Goods differ from their description or any applicable Specification as a result of changes made to ensure they comply with applicable statutory or regulatory requirements.</p>
                <p>5.4 Except as provided in this clause 5, Stellafoam shall have no liability to the Customer in respect of the Goods' failure to comply with the warranty set out in clause 5.1.</p>
                <p>5.5 The terms implied by sections 13 to 15 of the Sale of Goods Act 1979 are, to the fullest extent permitted by law, excluded from the Contract.</p>
                <p>5.6 These Conditions shall apply to any repaired or replacement Goods supplied by Stellafoam.</p>
                <p><h3 style="margin-top: 20px; margin-bottom: 10px;">6. Title and Risk</h3></p>
                <p>6.1 The risk in the Goods shall pass to the Customer on completion of delivery.</p>
                <p>6.2 Title to the Goods shall not pass to the Customer until the earlier of:</p>
                <p>(a) Stellafoam receives payment in full (in cash or cleared funds) for the Goods and any other goods or services that Stellafoam has supplied to the Customer; and</p>
                <p>(b) the Customer resells the Goods, in which case title to the Goods shall pass to the Customer at the time specified in clause 6.4.</p>
                <p>6.3 Until title to the Goods has passed to the Customer, the Customer shall:</p>
                <p>(a) hold the Goods on a fiduciary basis as Stellafoam's bailee;</p>
                <p>(b) store the Goods separately from all other goods held by the Customer so that they remain readily identifiable as Stellafoam's property;</p>
                <p>(c) not remove, deface or obscure any identifying mark or packaging on or relating to the Goods;</p>
                <p>(d) maintain the Goods in satisfactory condition and keep them insured against all risks for their full price from the date of delivery;</p>
                <p>(e) notify Stellafoam immediately if it becomes subject to any of the events listed in clause 8.2; and</p>
                <p>(g) give Stellafoam such information relating to the Goods as Stellafoam may require from time to time.</p>
                <p>6.4 Subject to clause 6.5, the Customer may resell or use the Goods in the ordinary course of its business (but not otherwise) before Stellafoam receives payment for the Goods. However, if the Customer resells the Goods before that time: it does so as principal and not as Stellafoam’s agent; and title to the Goods shall pass from Stellafoam to the Customer immediately before the time at which resale by the Customer occurs.6.5 If before title to the Goods passes to the Customer the Customer becomes subject to any of the events listed in clause 8.2, or Stellafoam reasonably believes that any such event is about to happen and notifies the Customer accordingly, then, without limiting any other right or remedy Stellafoam may have:</p>
                <p>(a) the Customer’s right to resell the Goods or use them in the ordinary course of its business ceases immediately; and</p>
                <p>(b) Stellafoam may at any time require the Customer to deliver up the Goods and, if the Customer fails to do so promptly, enter any premises of the Customer or of any third party where the Goods are stored in order to recover them.</p>
                <p><h3 style="margin-top: 20px; margin-bottom: 10px;">7. Price and Payment</h3></p>
                <p>7.1 The price of the Goods shall be the price set out in Stellafoam’s written acceptance of the Order or as otherwise agreed in writing by Stellafoam.</p>
                <p>7.2 Stellafoam may, by giving notice to the Customer at any time before delivery, increase the price of the Goods to reflect any increase in the cost of the Goods that is due to:</p>
                <p>(a) any factor beyond Stellafoam's control (including foreign exchange fluctuations, shipping and freight rate increases and increases in taxes and duties);</p>
                <p>(b) any request by the Customer to change the delivery date(s), quantities or types of Goods ordered, or the Specification; or</p>
                <p>(c) any delay caused by any instructions of the Customer or failure of the Customer to give Stellafoam adequate or accurate information or instructions.</p>
                <p>7.3 Unless otherwise stated, the price of the Goods is inclusive of the costs and charges of packaging and insurance. Unless otherwise stated and subject to variation by Stellafoam, for orders of over £150 plus VAT, the order price includes the cost of delivery by Stellafoam to the Customer’s premises as specified in the Order (which must comply with clause 4) in one delivery, on week days during normal working hours. Orders of under £150 plus VAT are subject to a delivery charge of £35 plus</p>
                <p>VAT. Re-deliveries due to the fault of the Customer are, at Stellafoam’s discretion, subject to a re-delivery charge of £35 plus VAT.</p>
                <p>7.4 The price of the Goods is exclusive of amounts in respect of value added tax (VAT). The Customer shall, on receipt of a valid VAT invoice from Stellafoam, pay to Stellafoam such additional amounts in respect of VAT as are chargeable on the supply of the Goods.</p>
                <p>7.5 Stellafoam may invoice the Customer for the Goods at any time on or after Stellafoam accepts the Order in respect of bespoke / made to measure products and at any time on or after the completion of delivery in respect of any other products.</p>
                <p>Stellafoam may require the Customer to pay a deposit in cleared funds prior to shipping.</p>
                <p>7.6 Customers with Stellafoam accounts shall pay the invoice in full and in cleared funds within 30 days of the end of the month of purchase or within such other period as may be agreed in writing and signed by Stellafoam. Payment shall be made to the bank account nominated in writing by Stellafoam. Time of payment is of the essence. Customers without Stellafoam accounts shall pay cash on delivery.</p>
                <p>7.7 If the Customer fails to make any payment due to Stellafoam under the Contract by the due date for payment (due date), then the Customer shall pay interest on the overdue amount at the rate from time to time in force under the Late Payment of Commercial Debts (Interest) Act 1988. Such interest shall accrue on a daily basis from the due date until the date of actual payment of the overdue amount, whether before or after judgment. The Customer shall pay the interest together with the overdue amount.</p>
                <p>7.8 The Customer shall pay all amounts due under the Contract in full without any deduction or withholding except as required by law and the Customer shall not be entitled to assert any credit, set-off or counterclaim against Stellafoam in order to justify withholding payment of any such amount in whole or in part. Stellafoam may at any time, without limiting any other rights or remedies it may have, set off any amount owing to it by the Customer against any amount payable by Stellafoam to the Customer.</p>
                <p><h3 style="margin-top: 20px; margin-bottom: 10px;">8. Customer's Insolvency or Incapacity</h3></p>
                <p>8.1 If the Customer becomes subject to any of the events listed in clause 8.2, or Stellafoam reasonably believes that the Customer is about to become subject to any of them and notifies the Customer accordingly, then, Stellafoam may terminate the Contract with immediate effect by giving written notice to the Customer.</p>
                <p>8.2 For the purposes of clause 8.1, the relevant events are:</p>
                <p>(a) the Customer suspends, or threatens to suspend, payment of its debts, or is unable to pay its debts as they fall due or admits inability to pay its debts, or (being a company) is deemed unable to pay its debts within the meaning of section 123 of the Insolvency Act 1986, or (being an individual) is deemed either unable to pay its debts or as having no reasonable prospect of so doing, in either case, within the meaning of section 268 of the Insolvency Act 1986, or (being a partnership) has any partner to whom any of the foregoing apply;</p>
                <p>(b) the Customer commences negotiations with all or any class of its creditors with a view to rescheduling any of its debts, or makes a proposal for or enters into any compromise or arrangement with its creditors other than (where the Customer is a company) where these events take place for the sole purpose of a scheme for a solvent amalgamation of the Customer with one or more other companies or the solvent reconstruction of the Customer;</p>
                <p>(c) (being a company) a petition is filed, a notice is given, a resolution is passed, or an order is made, for or in connection with the winding up of the Customer, other than for the sole purpose of a scheme for a solvent amalgamation of the Customer with one or more other companies or the solvent reconstruction of the Customer;</p>
                <p>(d) (being an individual) the Customer is the subject of a bankruptcy petition or order;</p>
                <p>(e) a creditor or encumbrancer of the Customer attaches or takes possession of, or a distress, execution, sequestration or other such process is levied or enforced on or sued against, the whole or any part of its assets and such attachment or process is not discharged within 14 days;</p>
                <p>(f) (being a company) an application is made to court, or an order is made, for the appointment of an administrator or if a notice of intention to appoint an administrator is given or if an administrator is appointed over the Customer;</p>
                <p>(g) (being a company) a floating charge holder over the Customer's assets has become entitled to appoint or has appointed an administrative receiver;</p>
                <p>(h) a person becomes entitled to appoint a receiver over the Customer's assets or a receiver is appointed over the Customer's assets;</p>
                <p>(i) any event occurs, or proceeding is taken, with respect to the Customer in any jurisdiction to which it is subject that has an effect equivalent or similar to any of the events mentioned in clause 8.2(a) to clause 8.2(h) (inclusive);</p>
                <p>(j) the Customer suspends, threatens to suspends, ceases or threatens to cease to carry on all or substantially the whole of its business;</p>
                <p>(k) the Customer's financial position deteriorates to such an extent that in Stellafoam's opinion the Customer's capability to adequately fulfil its obligations under the Contract has been placed in jeopardy; and</p>
                <p>(l) (being an individual) the Customer dies or, by reason of illness or incapacity (whether mental or physical), is incapable of managing his or her own affairs or becomes a patient under any mental health legislation.</p>
                <p>8.3 Without limiting its other rights or remedies, Stellafoam may suspend provision of the Goods under the Contract or any other contract between the Customer and Stellafoam if the customer becomes subject to any of the events listed in clause 8.2, or Stellafoam reasonably believes that the Customer is about to become subject to any of them, or if the Customer fails to pay any amount due under any contract on the due date for payment.</p>
                <p>8.4 On termination of the Contract for any reason the Customer shall immediately pay to Stellafoam all of Stellafoam’s outstanding unpaid invoices and interest.</p>
                <p>8.5 Termination of the Contract, however arising, shall not affect any of the parties' rights and remedies that have accrued as at termination. Clauses which expressly or by implication survive termination of the Contract shall continue in full force and effect.</p>
                <p><h3 style="margin-top: 20px; margin-bottom: 10px;">9. Limitation of liability</h3></p>
                <p>9.1 Nothing in these Conditions shall limit or exclude Stellafoam's liability for:</p>
                <p>(a) death or personal injury caused by its negligence, or the negligence of its employees, agents or subcontractors (as applicable);</p>
                <p>(b) fraud or fraudulent misrepresentation;</p>
                <p>(c) breach of the terms implied by section 12 of the Sale of Goods Act 1979;</p>
                <p>(d) defective products under the Consumer Protection Act 1987; or</p>
                <p>(e) any matter in respect of which it would be unlawful for Stellafoam to exclude or restrict liability.</p>
                <p>9.2 Subject to clause 9.1:</p>
                <p>(a) Stellafoam shall under no circumstances whatever be liable to the Customer, whether in contract, tort (including negligence), breach of statutory duty, or otherwise, for any loss of profit, or any indirect or consequential loss arising under or in connection with the Contract; and</p>
                <p>(b) Stellafoam's total liability to the Customer in respect of all other losses arising under or in connection with the Contract, whether in contract, tort (including negligence), breach of statutory duty, or otherwise, shall in no circumstances exceed the price of the Goods.</p>
                <p><h3 style="margin-top: 20px; margin-bottom: 10px;">10. Force Majeure</h3></p>
                <p>Neither party shall be liable for any failure or delay in performing its obligations under the Contract to the extent that such failure or delay is caused by a Force Majeure Event. A Force Majeure Event means any event beyond a party's reasonable
                control, which by its nature could not have been foreseen, or, if it could have been foreseen, was unavoidable, including strikes, lock-outs or other industrial disputes (whether involving its own workforce or a third party's), failure of energy sources or
                transport network, acts of God, war, terrorism, riot, civil commotion, interference by civil or military authorities, nationa l or international calamity, armed conflict, malicious damage, breakdown of plant or machinery, nuclear, chemical or biological
                contamination, sonic boom, explosions, collapse of building structures, fires, floods, storms, earthquakes, loss at sea, epidemics or similar events, natural disasters or extreme adverse weather conditions, or default of suppliers or subcontractors.</p>
                <p><h3 style="margin-top: 20px; margin-bottom: 10px;">11. General</h3></p>
                <p>11.1 Assignment and subcontracting</p>
                <p>(a) Stellafoam may at any time assign, transfer, charge, subcontract or deal in any other manner with all or any of its rights or obligations under the Contract.</p>
                <p>(b) The Customer may not assign, transfer, charge, subcontract or deal in any other manner with all or any of its rights or obligations under the Contract without the prior written consent of Stellafoam.</p>
                <p>11.2 Notices</p>
                <p>(a) Any notice or other communication given to a party under or in connection with the Contract shall be in writing, addressed to that party at its registered office (if it is a company) or its principal place of business (in any other case) or such other address as that party may have specified to the other party in writing in accordance with this clause, and shall be delivered personally, sent by pre-paid first class post, recorded delivery, commercial courier, fax or e-mail.</p>
                <p>(b) A notice or other communication shall be deemed to have been received: if delivered personally, when left at the address referred to in clause 11.2(a); if sent by pre-paid first class post or recorded delivery, at 9.00 am on the second Business Day after posting; if delivered by commercial courier, on the date and at the time that the courier's delivery receipt is signed; or, if sent by fax or e-mail, one Business Day after transmission.</p>
                <p>(c) The provisions of this clause shall not apply to the service of any proceedings or other documents in any legal action.</p>
                <p>11.3 Severance</p>
                <p>(a) If any court or competent authority finds that any provision of the Contract (or part of any provision) is invalid, illegal or unenforceable, that provision or part-provision shall, to the extent required, be deemed to be deleted, and the validity and enforceability of the other provisions of the Contract shall not be affected.</p>
                <p>(b) If any invalid, unenforceable or illegal provision of the Contract would be valid, enforceable and legal if some part of it were deleted, the provision shall apply with the minimum modification necessary to make it legal, valid and enforceable.</p>
                <p>11.4 Waiver</p>
                <p>A waiver of any right or remedy under the Contract is only effective if given in writing and shall not be deemed a waiver of any subsequent breach or default. No failure or delay by a party to exercise any right or remedy provided under the Contract or</p>
                by law shall constitute a waiver of that or any other right or remedy, nor shall it preclude or restrict the further exercise of that or any other right or remedy. No single or partial exercise of such right or remedy shall preclude or restrict the further
                exercise of that or any other right or remedy.</p>
                <p>11.5 Third party rights</p>
                <p>A person who is not a party to the Contract shall not have any rights under or in connection with it.</p>
                <p>11.6 Variation</p>
                <p>Except as set out in these Conditions, no variation of the Contract, including the introduction of any additional terms and conditions, shall be effective unless it is in writing and signed by Stellafoam.</p>
                <p>11.7 Governing law and jurisdiction</p>
                <p>The Contract, and any dispute or claim arising out of or in connection with it or its subject matter or formation (including non-contractual disputes or claims), shall be governed by, and construed in accordance with, English law, and the parties
                irrevocably submit to the exclusive jurisdiction of the courts of England and Wales.</p>
            </div>
		</div>
        <?php
			include  'footer.php';
    	?>
    </div>
	<?php
		include  'copyright.php';
	?>
</body>
</html>