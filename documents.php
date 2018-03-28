
<?php
require_once("includes\\opendb.php");
session_start();
if(!isset($_SESSION['username']))
{
	header("location: index.php");  // Redirecting To Home Page
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<title>CSS</title>

<script src="libtreeview/jquery.js" type="text/javascript"></script>
<script src="libtreeview/jquery-ui.custom.js" type="text/javascript"></script>

<link href="srctreeview/skin-lion/ui.fancytree.css" rel="stylesheet" type="text/css">
<script src="srctreeview/jquery.fancytree.js" type="text/javascript"></script>


<script type="text/javascript" src="script.js"></script>

       
   <style type="text/css">
    #tree {
	vertical-align: top;
	width: 430px;
    }
    iframe {
      border:1px solid #999;
    border-radius:8px;
    box-shadow:0 0 10px #999;
    }
   </style>
  <!-- Add code to initialize the tree when the document is loaded: -->
  <script type="text/javascript">
  $(function(){

    // Attach the dynatree widget to an existing <div id="tree"> element
    // and pass the tree options as an argument to the dynatree() function:
    

	$("#tree").fancytree({

		autoScroll: true,
      minExpandLevel: 1,
	  
	  
      postinit: function(isReloading, isError) {
        this.reactivate();
      },
	  

      focus: function(event, data) {
        // Auto-activate focused node after 2 seconds
        data.node.scheduleAction("activate", 2000);
      },
      activate: function(event, data) {
        var node = data.node;
        // Use <a> href and target attributes to load the content:
        if( node.data.href ){
          // Open target
          window.open(node.data.href, node.data.target);
          // or open target in iframe
//                $("[name=contentFrame]").attr("src", node.data.href);
        }
      }
    });
  });
  </script>

</head>
<body>
<?php
//include ("menu_list.php");
?>

<br />
<table width="100%" align="center">
  <tr>
    <td width="413" valign="top">

      <div id="tree">
      <ul>
        <li class="expanded folder"><strong>Templates</strong>
        <ul>
        
    <li class="expanded folder"><font color="#990000"><strong>SCREENING</strong></font>
    <ul>
          <li class="folder"><strong>English</strong>
                <ul>
                <li class="folder"><font color="#0066FF">Whistleblower</font>
                	<ul>
                        <li>
                        <a href="documents/templates/whistleblower/Acknowledgement_receipt_ispeakoutnow.php" target="contentFrame">
                        Acknowledgement receipt I SPEAK OUT NOW
                        </a></li>
                
                        <li>
                        <a href="documents/templates/whistleblower/Acknowledgement_receipt_navex.php" target="contentFrame">
                        Acknowledgement receipt NAVEX
                        </a></li>
                
                        <li>
                        <a href="documents/templates/whistleblower/Acknowledgement_receipt_request_info.php" target="contentFrame">
                        Acknowledgement receipt and request further info
                        </a></li>
                       
                        <li>
                        <a href="documents/templates/whistleblower/Acknowledgement_disagreement.php" target="contentFrame">
                             Acknowledgement DISAGREMENT
                        </a></li>
                        <li>
                        <a href="documents/templates/whistleblower/Request_info.php" target="contentFrame">
                             Request further information
                        </a></li>
                        <li>
                        <a href="documents/templates/whistleblower/Allegation_outcome_nfa.php" target="contentFrame">
                             Outcome - NO FURTHER ACTION
                        </a></li>
                        <li>
                        <a href="documents/templates/whistleblower/Allegation_outcome_ir.php" target="contentFrame">
                             Outcome - INFORMATION REPORT
                        </a></li>
                        <li>
                        <a href="documents/templates/whistleblower/Allegation_outcome_referral.php" target="contentFrame">
                             Outcome - REFERRAL CT-HR-EA
                        </a></li>
                        <li>
                        <a href="documents/templates/whistleblower/Allegation_outcome_oc.php" target="contentFrame">
                             Outcome - OPEN CASE
                        </a></li>
                        <li>
                        <a href="documents/templates/whistleblower/Allegation_outcome_sur.php" target="contentFrame">
                             Outcome - STILL UNDER REVIEW
                        </a></li>
                	</ul>
                </li>
                
                
                <li class="folder"><font color="#0066FF">Secretariat</font>
                	<ul>
                        <li>
                        <a href="documents/templates/secretariat/Acknowledgement_receipt_ig.php" target="contentFrame">
                        Acknowledgement receipt
                        </a></li>

                        <li>
                        <a href="documents/templates/secretariat/Allegation_outcomet_nfa.php" target="contentFrame">
                             Outcome - NO FURTHER ACTION
                        </a></li>
                        <li>
                        <a href="documents/templates/secretariat/Allegation_outcomet_ir.php" target="contentFrame">
                             Outcome - INFORMATION REPORT
                        </a></li>
                        <li>
                        <a href="documents/templates/secretariat/Allegation_outcome_rea.php" target="contentFrame">
                             Outcome - REFERRAL EXTERNAL AGENCY
                        </a></li>
                        <li>
                        <a href="documents/templates/secretariat/Allegation_outcome_op.php" target="contentFrame">
                             Outcome - OPEN CASE
                        </a></li>
                        <li>
                        <a href="documents/templates/secretariat/Allegation_outcome_sur.php" target="contentFrame">
                             Outcome - STILL UNDER REVIEW
                        </a></li>
                        <li>
                        <a href="documents/templates/secretariat/memo_referral.php" target="contentFrame">
                             OIG MEMO Referral
                        </a></li>
                	</ul>
                </li>
                
                <li class="folder"><font color="#0066FF">External Agency</font>
                	<ul>
                        <li>
                        <a href="documents/templates/external/Acknowledgement_receipt_ig.php" target="contentFrame">
                        Acknowledgement receipt
                        </a></li>

                        <li>
                        <a href="documents/templates/external/Allegation_outcome.php" target="contentFrame">
                             Outcome
                        </a></li>
                        <li>
                        <a href="documents/templates/external/Allegation_referral.php" target="contentFrame">
                             OIG MEMO Referral
                        </a></li>
                	</ul>
                </li>
                
                
         </ul>  </li>
         
         
         
         
         
         
                   <li class="folder"><strong>French</strong>
                <ul>
                <li class="folder"><font color="#0066FF">Whistleblower</font>
                	<ul>
                        <li>
                        <a href="documents/templates/French/whistleblower/Acknowledgement_receipt_ispeakoutnow.php" target="contentFrame">
                        Acknowledgement receipt I SPEAK OUT NOW
                        </a></li>
                
                        <li>
                        <a href="documents/templates/French/whistleblower/Acknowledgement_receipt_navex.php" target="contentFrame">
                        Acknowledgement receipt NAVEX
                        </a></li>
                
                        <li>
                        <a href="documents/templates/French/whistleblower/Acknowledgement_receipt_request_info.php" target="contentFrame">
                        Acknowledgement receipt and request further info
                        </a></li>
                       
                        <li>
                        <a href="documents/templates/French/whistleblower/Acknowledgement_disagreement.php" target="contentFrame">
                             Acknowledgement DISAGREMENT
                        </a></li>
                        <li>
                        <a href="documents/templates/French/whistleblower/Request_info.php" target="contentFrame">
                             Request further information
                        </a></li>
                        <li>
                        <a href="documents/templates/French/whistleblower/Allegation_outcome_nfa.php" target="contentFrame">
                             Outcome - NO FURTHER ACTION
                        </a></li>
                        <li>
                        <a href="documents/templates/French/whistleblower/Acknowledgement_disagreement.php" target="contentFrame">
                             Outcome - INFORMATION REPORT
                        </a></li>
                        <li>
                        <a href="documents/templates/French/whistleblower/Allegation_outcome_referral.php" target="contentFrame">
                             Outcome - REFERRAL CT-HR-EA
                        </a></li>
                        <li>
                        <a href="documents/templates/French/whistleblower/Allegation_outcome_oc.php" target="contentFrame">
                             Outcome - OPEN CASE
                        </a></li>
                        <li>
                        <a href="documents/templates/French/whistleblower/Allegation_outcome_sur.php" target="contentFrame">
                             Outcome - STILL UNDER REVIEW
                        </a></li>
                	</ul>
                </li>
                
                
                <li class="folder"><font color="#0066FF">External Agency</font>
                	<ul>
                        <li>
                        <a href="documents/templates/French/external/Acknowledgement_receipt_ig.php" target="contentFrame">
                        Acknowledgement receipt
                        </a></li>

                        <li>
                        <a href="documents/templates/French/external/Allegation_outcome.php" target="contentFrame">
                             Outcome
                        </a></li>
                        <li>
                        <a href="documents/templates/French/external/Allegation_referral.php" target="contentFrame">
                             OIG MEMO Referral
                        </a></li>
                	</ul>
                </li>
                
                
         </ul>  </li>
         
         
         <li class="folder"><strong>Spanish</strong>
                <ul>
                <li class="folder"><font color="#0066FF">Whistleblower</font>
                	<ul>
                        <li>
                        <a href="documents/Acknowledge receipt of email allegation in IG inbox_Template.php" target="contentFrame">
                        Acknowledgement receipt I SPEAK OUT NOW
                        </a></li>
                
                        <li>
                        <a href="documents/templates/Acknowledgement receipt_ispeakoutnow.php" target="contentFrame">
                        Acknowledgement receipt NAVEX
                        </a></li>
                
                        <li>
                        <a href="documents/Acknowledge receipt of email allegation in navex_Template.php" target="contentFrame">
                        Acknowledgement receipt and request further info
                        </a></li>
                       
                        <li>
                        <a href="" target="contentFrame">
                             Acknowledgement DISAGREMENT
                        </a></li>
                        <li>
                        <a href="" target="contentFrame">
                             Request further information
                        </a></li>
                        <li>
                        <a href="" target="contentFrame">
                             Outcome - NO FURTHER ACTION
                        </a></li>
                        <li>
                        <a href="" target="contentFrame">
                             Outcome - INFORMATION REPORT
                        </a></li>
                        <li>
                        <a href="" target="contentFrame">
                             Outcome - REFERRAL CT-HR-EA
                        </a></li>
                        <li>
                        <a href="" target="contentFrame">
                             Outcome - OPEN CASE
                        </a></li>
                        <li>
                        <a href="" target="contentFrame">
                             Outcome - STILL UNDER REVIEW
                        </a></li>
                	</ul>
                </li>
                
                
                               
                <li class="folder"><font color="#0066FF">External Agency</font>
                	<ul>
                        <li>
                        <a href="documents/Acknowledge receipt of email allegation in IG inbox_Template.php" target="contentFrame">
                        Acknowledgement receipt
                        </a></li>

                        <li>
                        <a href="" target="contentFrame">
                             Outcome
                        </a></li>
                        <li>
                        <a href="" target="contentFrame">
                             OIG MEMO Referral
                        </a></li>
                	</ul>
                </li>
                
                
         </ul>  </li>
         
         
         <li class="folder"><strong>Russian</strong>
                <ul>
                <li class="folder"><font color="#0066FF">Whistleblower</font>
                	<ul>
                        <li>
                        <a href="documents/templates/Russian/whistleblower/Acknowledgement_receipt_ispeakoutnow.php" target="contentFrame">
                        Acknowledgement receipt I SPEAK OUT NOW
                        </a></li>
                
                        <li>
                        <a href="documents/templates/Russian/whistleblower/Acknowledgement_receipt_navex.php" target="contentFrame">
                        Acknowledgement receipt NAVEX
                        </a></li>
                
                        <li>
                        <a href="documents/templates/Russian/whistleblower/Acknowledgement_receipt_request_info.php" target="contentFrame">
                        Acknowledgement receipt and request further info
                        </a></li>
                       
                        <li>
                        <a href="documents/templates/Russian/whistleblower/Acknowledgement_disagreement.php" target="contentFrame">
                             Acknowledgement DISAGREMENT
                        </a></li>
                        <li>
                         <a href="documents/templates/Russian/whistleblower/Request_info.php" target="contentFrame">
                             Request further information
                        </a></li>
                        <li>
                        <a href="documents/templates/Russian/whistleblower/Allegation_outcome_nfa.php" target="contentFrame">
                             Outcome - NO FURTHER ACTION
                        </a></li>
                        <li>
                        <a href="documents/templates/Russian/whistleblower/Allegation_outcome_ir.php" target="contentFrame">
                             Outcome - INFORMATION REPORT
                        </a></li>
                        <li>
                        <a href="documents/templates/Russian/whistleblower/Allegation_outcome_referral.php" target="contentFrame">
                             Outcome - REFERRAL CT-HR-EA
                        </a></li>
                        <li>
                        <a href="documents/templates/Russian/whistleblower/Allegation_outcome_oc.php" target="contentFrame">
                             Outcome - OPEN CASE
                        </a></li>
                        <li>
                        <a href="documents/templates/Russian/whistleblower/Allegation_outcome_sur.php" target="contentFrame">
                             Outcome - STILL UNDER REVIEW
                        </a></li>
                	</ul>
                </li>
                
                
                                
                <li class="folder"><font color="#0066FF">External Agency</font>
                	<ul>
                        <li>
                        <a href="documents/templates/Russian/external/Acknowledgement_receipt_ig.php" target="contentFrame">
                        Acknowledgement receipt
                        </a></li>

                        <li>
                       <a href="documents/templates/Russian/external/Allegation_outcome.php" target="contentFrame">
                             Outcome
                        </a></li>
                        <li>
                        <a href="documents/templates/Russian/external/Allegation_referral.php" target="contentFrame">
                             OIG MEMO Referral
                        </a></li>
                	</ul>
                </li>
                
                
         </ul>  </li>
         </ul>     
   
  
       <li class="expanded folder"><font color="#990000"><strong>INVESTIGATIONS</strong></font>
         <ul>


<li class="folder"><strong>English</strong>
<ul>
                <li class="folder"><font color="#0066FF">Whistleblower</font>
                	<ul>
                        <li>
                        <a href="documents/templates/whistleblower/investigation_outcome_ccm.php" target="contentFrame">
                        Outcome Case Closure MEMO
                        </a></li>
                
                        <li>
                        <a href="documents/templates/whistleblower/investigation_outcome_report.php" target="contentFrame">
                        Outcome Case Investigation Report
                        </a></li>
                	</ul>
                </li>
                
                <li class="folder"><font color="#0066FF">Secretariat</font>
                	<ul>
                        <li>
                        <a href="documents/templates/secretariat/investigation_outcome_ccm.php" target="contentFrame">
                        Outcome Case Closure MEMO
                        </a></li>
                	</ul>
                </li>
                
                <li class="folder"><font color="#0066FF">External Agency</font>
                	<ul>
                        <li>
                        <a href="documents/templates/external/investigation_outcome_ccm.php" target="contentFrame">
                        Outcome Case Closure
                        </a></li>
                        <li>
                        <a href="documents/templates/external/investigation_outcome_report.php" target="contentFrame">
                        Outcome Case Investigation Report
                        </a></li>
                	</ul>
                </li>
        </ul>
</li>

<li class="folder"><strong>French</strong>
<ul>
                <li class="folder"><font color="#0066FF">Whistleblower</font>
                	<ul>
                        <li>
                        <a href="documents/templates/French/whistleblower/investigation_outcome_ccm.php" target="contentFrame">
                        Outcome Case Closure MEMO
                        </a></li>
                
                        <li>
                        <a href="documents/templates/French/whistleblower/investigation_outcome_report.php" target="contentFrame">
                        Outcome Case Investigation Report
                        </a></li>
                	</ul>
                </li>
                
                <li class="folder"><font color="#0066FF">External Agency</font>
                	<ul>
                        <li>
                        <a href="documents/templates/French/external/investigation_outcome_ccm.php" target="contentFrame">
                        Outcome Case Closure
                        </a></li>
                        <li>
                        <a href="documents/templates/French/external/investigation_outcome_report.php" target="contentFrame">
                        Outcome Case Investigation Report
                        </a></li>
                	</ul>
                </li>
        </ul>
</li>

<li class="folder"><strong>Spanish</strong>
<ul>
                <li class="folder"><font color="#0066FF">Whistleblower</font>
                	<ul>
                        <li>
                        <a href="documents/Acknowledge receipt of email allegation in IG inbox_Template.php" target="contentFrame">
                        Outcome Case Closure MEMO
                        </a></li>
                
                        <li>
                        <a href="documents/templates/Acknowledgement receipt_ispeakoutnow.php" target="contentFrame">
                        Outcome Case Investigation Report
                        </a></li>
                	</ul>
                </li>

        </ul>
</li>

<li class="folder"><strong>Russian</strong>
<ul>
                <li class="folder"><font color="#0066FF">Whistleblower</font>
                	<ul>
                        <li>
                        <a href="documents/templates/Russian/whistleblower/investigation_outcome_report.php" target="contentFrame">
                        Outcome Case Closure MEMO
                        </a></li>
                
                        <li>
                        <a href="documents/templates/Russian/whistleblower/investigation_outcome_report.php" target="contentFrame">
                        Outcome Case Investigation Report
                        </a></li>
                	</ul>
                </li>
                

        </ul>
</li>

















        <li>
        <a href="documents/SOP-Inv.pdf" target="contentFrame">
             SOP
        </a></li>
        
        <li>
        <a href="" target="contentFrame">
             Case Timeline
        </a></li>
        
		<li class="folder"><strong>Declaration Forms</strong>
                      <ul>
                        <li>
                        <a href="" target="contentFrame">
                             Andrew's Team
                        </a></li>
                                            
                        <li>
                        <a href="" target="contentFrame">
                            Christopher's Team
                        </a></li>
                        
                        <li>
                        <a href="" target="contentFrame">
                           David's Team
                        </a></li>
                        
                        <li>
                        <a href="" target="contentFrame">
                            Sarah's Team
                        </a></li>
                    </ul>
                </li>
      </ul>
      </li>
      </div>
    </td>

    <td width="1025">
      <iframe src="" name="contentFrame" width="100%" height="850" scrolling="yes" marginheight="0" marginwidth="0" frameborder="0">
        <p>Your browser does not support iframes</p>
      </iframe>
    </td>
  </tr>
  </table>

    
    </body>
</html>
