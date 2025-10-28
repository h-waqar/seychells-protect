<?php

$php_file_name = "save_booking_sy";


function send_certificate_email($to_email)
{
    // Set the subject and sender
    $subject = 'Your Certificate of Medical Protection';
    $headers = array(
        'Content-Type: text/html; charset=UTF-8',
        'From: ' . get_bloginfo('name') . ' <' . get_option('admin_email') . '>'
    );

    // HTML email body (paste your exact HTML below)
    $message = <<<HTML
<table cellpadding="0" cellspacing="0" border="0" width="100%" bgcolor="#FFFFFF">
            <tbody><tr>
              <td valign="top" bgcolor="#FFFFFF" width="100%">
                <table width="100%" role="content-container" align="center" cellpadding="0" cellspacing="0" border="0">
                  <tbody><tr>
                    <td width="100%">
                      <table width="100%" cellpadding="0" cellspacing="0" border="0">
                        <tbody><tr>
                          <td>
                            
                                    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="width:100%;max-width:615px" align="center">
                                      <tbody><tr>
                                        <td role="modules-container" style="padding:0px 0px 0px 0px;color:#000000;text-align:left" bgcolor="#FFFFFF" width="100%" align="left"><table role="module" border="0" cellpadding="0" cellspacing="0" width="100%" style="display:none!important;opacity:0;color:transparent;height:0;width:0">
    <tbody><tr>
      <td role="module-content">
        <p>Thank you for purchasing Medical Protection with Seychelles Medical</p>
      </td>
    </tr>
  </tbody></table><table role="module" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout:fixed">
    <tbody>
      <tr>
        <td style="font-size:6px;line-height:10px;padding:18px 0px 18px 0px" valign="top" align="center">
          <img border="0" style="display:block;color:#000000;text-decoration:none;font-family:Helvetica,arial,sans-serif;font-size:16px;max-width:100%!important;width:100%;height:auto!important" width="615" alt="" src="https://ci3.googleusercontent.com/meips/ADKq_NbwDd0xLHu33tZfzbZYP1j7qcA1GW3icsdL-vAWwU25Pcn9NoMZOkOZifYR_ahtDmTPVxNlEw6XvyyjM8W5EklUCJGW_2VOO1R0a5nRyWbBoZue1U3CQauu4X9th2KSFrsmoMhsZ6BK2tvLzedTkaxTKODr4Yz31-mlNKICqzqnODRkBuQRLw=s0-d-e1-ft#http://cdn.mcauto-images-production.sendgrid.net/2be3c6b0d2805038/1977b2b5-9a58-4053-a3a0-02d2b3c5d87c/550x64.jpg" class="CToWUd" data-bit="iit">
        </td>
      </tr>
    </tbody>
  </table><table role="module" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout:fixed">
    <tbody>
      <tr>
        <td style="padding:18px 0px 18px 0px;line-height:22px;text-align:inherit;background-color:#d2ebff" height="100%" valign="top" bgcolor="#d2ebff" role="module-content"><div><div style="font-family:inherit;text-align:center"><span style="font-family:inherit;font-size:24px;color:#808080"><strong>CERTIFICATE OF MEDICAL PROTECTION</strong></span></div><div></div></div></td>
      </tr>
    </tbody>
  </table><table border="0" cellpadding="0" cellspacing="0" align="center" width="100%" role="module" style="padding:18px 0px 18px 0px" bgcolor="#FFFFFF">
    <tbody>
      <tr role="module-content">
        <td height="100%" valign="top"><table width="297" style="width:297px;border-spacing:0;border-collapse:collapse;margin:0px 10px 0px 0px" cellpadding="0" cellspacing="0" align="left" border="0" bgcolor="">
      <tbody>
        <tr>
          <td style="padding:0px;margin:0px;border-spacing:0"><table role="module" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout:fixed">
    <tbody>
      <tr>
        <td style="padding:0px 0px 0px 0px;line-height:22px;text-align:inherit" height="100%" valign="top" bgcolor="" role="module-content"><div><div style="font-family:inherit;text-align:inherit"><span style="color:#808080;font-family:arial,helvetica,sans-serif;font-size:18px;font-style:normal;font-variant-caps:normal;font-weight:400;letter-spacing:normal;text-align:start;text-indent:0px;text-transform:none;word-spacing:0px;background-color:rgb(255,255,255);text-decoration-line:none;float:none;display:inline">Dear Traveller,</span></div><div></div></div></td>
      </tr>
    </tbody>
  </table></td>
        </tr>
      </tbody>
    </table><table width="297" style="width:297px;border-spacing:0;border-collapse:collapse;margin:0px 0px 0px 10px" cellpadding="0" cellspacing="0" align="left" border="0" bgcolor="">
      <tbody>
        <tr>
          <td style="padding:0px;margin:0px;border-spacing:0"><table role="module" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout:fixed">
    <tbody>
      <tr>
        <td style="padding:0px 0px 0px 0px;line-height:22px;text-align:inherit" height="100%" valign="top" bgcolor="" role="module-content"><div><div style="font-family:inherit;text-align:inherit"><span style="color:#808080;font-family:arial,helvetica,sans-serif;font-size:18px;font-style:normal;font-variant-caps:normal;font-weight:400;letter-spacing:normal;text-align:start;text-indent:0px;text-transform:none;word-spacing:0px;background-color:rgb(255,255,255);text-decoration-line:none;float:none;display:inline">Your Reference: </span><span style="color:#808080;font-family:arial,helvetica,sans-serif;font-size:18px;font-style:normal;font-variant-caps:normal;font-weight:400;letter-spacing:normal;text-align:start;text-indent:0px;text-transform:none;word-spacing:0px;background-color:rgb(255,255,255);text-decoration-line:none;float:none;display:inline"><strong>E25W8XM4</strong></span></div><div></div></div></td>
      </tr>
    </tbody>
  </table></td>
        </tr>
      </tbody>
    </table></td>
      </tr>
    </tbody>
  </table><table border="0" cellpadding="0" cellspacing="0" align="center" width="100%" role="module" style="padding:18px 0px 0px 0px" bgcolor="#FFFFFF">
    <tbody>
      <tr role="module-content">
        <td height="100%" valign="top"><table width="297" style="width:297px;border-spacing:0;border-collapse:collapse;margin:0px 10px 0px 0px" cellpadding="0" cellspacing="0" align="left" border="0" bgcolor="">
      <tbody>
        <tr>
          <td style="padding:0px;margin:0px;border-spacing:0"><table role="module" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout:fixed">
    <tbody>
      <tr>
        <td style="padding:0px 0px 10px 0px;line-height:22px;text-align:inherit" height="100%" valign="top" bgcolor="" role="module-content"><div><div style="font-family:inherit;text-align:inherit"><span style="color:#808080;font-family:arial,helvetica,sans-serif;font-size:18px;font-style:normal;font-variant-caps:normal;font-weight:400;letter-spacing:normal;text-align:start;text-indent:0px;text-transform:none;word-spacing:0px;background-color:rgb(255,255,255);text-decoration-line:none;float:none;display:inline">Package: </span><span style="color:#808080;font-family:arial,helvetica,sans-serif;font-size:18px;font-style:normal;font-variant-caps:normal;font-weight:400;letter-spacing:normal;text-align:start;text-indent:0px;text-transform:none;word-spacing:0px;background-color:rgb(255,255,255);text-decoration-line:none;float:none;display:inline"><strong>Essential Protection</strong></span></div><div></div></div></td>
      </tr>
    </tbody>
  </table><table role="module" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout:fixed">
    <tbody>
      <tr>
        <td style="padding:0px 0px 10px 0px;line-height:22px;text-align:inherit" height="100%" valign="top" bgcolor="" role="module-content"><div><div style="font-family:inherit;text-align:inherit;margin-left:0px"><span style="box-sizing:border-box;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;margin-top:0px;margin-right:0px;margin-bottom:0px;margin-left:0px;font-style:inherit;font-variant-caps:inherit;font-weight:inherit;line-height:inherit;font-family:inherit;font-size-adjust:inherit;font-kerning:inherit;font-variant-alternates:inherit;font-variant-ligatures:inherit;font-variant-numeric:inherit;font-variant-east-asian:inherit;font-feature-settings:inherit;font-size:18px;vertical-align:baseline;border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-top-style:none;border-right-style:none;border-bottom-style:none;border-left-style:none;border-top-color:currentcolor;border-right-color:currentcolor;border-bottom-color:currentcolor;border-left-color:currentcolor;letter-spacing:normal;text-align:start;text-indent:0px;text-transform:none;word-spacing:0px;text-decoration-line:none;color:#808080;background-color:rgb(255,255,255);float:none;display:inline">Coverage start date: </span><span style="box-sizing:border-box;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;margin-top:0px;margin-right:0px;margin-bottom:0px;margin-left:0px;font-style:inherit;font-variant-caps:inherit;font-weight:inherit;line-height:inherit;font-family:inherit;font-size-adjust:inherit;font-kerning:inherit;font-variant-alternates:inherit;font-variant-ligatures:inherit;font-variant-numeric:inherit;font-variant-east-asian:inherit;font-feature-settings:inherit;font-size:18px;vertical-align:baseline;border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-top-style:none;border-right-style:none;border-bottom-style:none;border-left-style:none;border-top-color:currentcolor;border-right-color:currentcolor;border-bottom-color:currentcolor;border-left-color:currentcolor;letter-spacing:normal;text-align:start;text-indent:0px;text-transform:none;word-spacing:0px;text-decoration-line:none;color:#808080;background-color:rgb(255,255,255);float:none;display:inline"><strong>02 Nov 2025</strong></span></div><div></div></div></td>
      </tr>
    </tbody>
  </table></td>
        </tr>
      </tbody>
    </table><table width="297" style="width:297px;border-spacing:0;border-collapse:collapse;margin:0px 0px 0px 10px" cellpadding="0" cellspacing="0" align="left" border="0" bgcolor="">
      <tbody>
        <tr>
          <td style="padding:0px;margin:0px;border-spacing:0"><table role="module" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout:fixed">
    <tbody>
      <tr>
        <td style="padding:0px 0px 10px 0px;line-height:22px;text-align:inherit" height="100%" valign="top" bgcolor="" role="module-content"><div><div style="font-family:inherit;text-align:inherit"><span style="box-sizing:border-box;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;margin-top:0px;margin-right:0px;margin-bottom:0px;margin-left:0px;font-style:inherit;font-variant-caps:inherit;font-weight:inherit;line-height:inherit;font-family:inherit;font-size-adjust:inherit;font-kerning:inherit;font-variant-alternates:inherit;font-variant-ligatures:inherit;font-variant-numeric:inherit;font-variant-east-asian:inherit;font-feature-settings:inherit;font-size:18px;vertical-align:baseline;border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-top-style:none;border-right-style:none;border-bottom-style:none;border-left-style:none;border-top-color:currentcolor;border-right-color:currentcolor;border-bottom-color:currentcolor;border-left-color:currentcolor;letter-spacing:normal;text-align:start;text-indent:0px;text-transform:none;word-spacing:0px;text-decoration-line:none;color:#808080;background-color:rgb(255,255,255);float:none;display:inline">Purchase amount: </span><span style="box-sizing:border-box;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;margin-top:0px;margin-right:0px;margin-bottom:0px;margin-left:0px;font-style:inherit;font-variant-caps:inherit;font-weight:inherit;line-height:inherit;font-family:inherit;font-size-adjust:inherit;font-kerning:inherit;font-variant-alternates:inherit;font-variant-ligatures:inherit;font-variant-numeric:inherit;font-variant-east-asian:inherit;font-feature-settings:inherit;font-size:18px;vertical-align:baseline;border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-top-style:none;border-right-style:none;border-bottom-style:none;border-left-style:none;border-top-color:currentcolor;border-right-color:currentcolor;border-bottom-color:currentcolor;border-left-color:currentcolor;letter-spacing:normal;text-align:start;text-indent:0px;text-transform:none;word-spacing:0px;text-decoration-line:none;color:#808080;background-color:rgb(255,255,255);float:none;display:inline"><strong>€27.65</strong></span></div><div></div></div></td>
      </tr>
    </tbody>
  </table><table role="module" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout:fixed">
    <tbody>
      <tr>
        <td style="padding:0px 0px 10px 0px;line-height:22px;text-align:inherit" height="100%" valign="top" bgcolor="" role="module-content"><div><div style="font-family:inherit;text-align:inherit;margin-left:0px"><span style="box-sizing:border-box;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;margin-top:0px;margin-right:0px;margin-bottom:0px;margin-left:0px;font-style:inherit;font-variant-caps:inherit;font-weight:inherit;line-height:inherit;font-family:inherit;font-size-adjust:inherit;font-kerning:inherit;font-variant-alternates:inherit;font-variant-ligatures:inherit;font-variant-numeric:inherit;font-variant-east-asian:inherit;font-feature-settings:inherit;font-size:18px;vertical-align:baseline;border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-top-style:none;border-right-style:none;border-bottom-style:none;border-left-style:none;border-top-color:currentcolor;border-right-color:currentcolor;border-bottom-color:currentcolor;border-left-color:currentcolor;letter-spacing:normal;text-align:start;text-indent:0px;text-transform:none;word-spacing:0px;text-decoration-line:none;color:#808080;background-color:rgb(255,255,255);float:none;display:inline">Coverage end date: </span><span style="box-sizing:border-box;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;margin-top:0px;margin-right:0px;margin-bottom:0px;margin-left:0px;font-style:inherit;font-variant-caps:inherit;font-weight:inherit;line-height:inherit;font-family:inherit;font-size-adjust:inherit;font-kerning:inherit;font-variant-alternates:inherit;font-variant-ligatures:inherit;font-variant-numeric:inherit;font-variant-east-asian:inherit;font-feature-settings:inherit;font-size:18px;vertical-align:baseline;border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-top-style:none;border-right-style:none;border-bottom-style:none;border-left-style:none;border-top-color:currentcolor;border-right-color:currentcolor;border-bottom-color:currentcolor;border-left-color:currentcolor;letter-spacing:normal;text-align:start;text-indent:0px;text-transform:none;word-spacing:0px;text-decoration-line:none;color:#808080;background-color:rgb(255,255,255);float:none;display:inline"><strong>08 Nov 2025</strong></span></div><div></div></div></td>
      </tr>
    </tbody>
  </table></td>
        </tr>
      </tbody>
    </table></td>
      </tr>
    </tbody>
  </table><table role="module" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout:fixed">
    <tbody>
      <tr>
        <td style="padding:0px 0px 0px 0px" role="module-content" height="100%" valign="top" bgcolor="">
          <table border="0" cellpadding="0" cellspacing="0" align="center" width="100%" height="2px" style="line-height:2px;font-size:2px">
            <tbody>
              <tr>
                <td style="padding:0px 0px 2px 0px" bgcolor="#d2ebff"></td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table><table role="module" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout:fixed">
    <tbody>
      <tr>
        <td style="padding:18px 0px 10px 0px;line-height:22px;text-align:inherit" height="100%" valign="top" bgcolor="" role="module-content"><div><div style="font-family:inherit;text-align:inherit"><span style="font-size:18px;color:#808080">Welcome to Seychelles Medical</span></div>
<div style="font-family:inherit;text-align:inherit"><span style="font-size:18px;color:#808080">Your 24/7 Private Medical Support</span></div>
<div style="font-family:inherit;text-align:inherit"><br></div>
<div style="font-family:inherit;text-align:inherit"><span style="font-style:normal;font-variant-caps:normal;font-weight:400;letter-spacing:normal;text-align:inherit;text-indent:0px;text-transform:none;word-spacing:0px;text-decoration-line:none;font-size:18px;font-family:arial,helvetica,sans-serif;color:#808080">You are now fully covered with immediate access to world-class medical care, anytime, anywhere in Seychelles. Relax and enjoy your stay knowing that expert help is always a phone call away.</span></div>
<div style="font-family:inherit;text-align:inherit"><br></div>
<div style="font-family:inherit;text-align:inherit"><span style="font-style:normal;font-variant-caps:normal;font-weight:400;letter-spacing:normal;text-align:inherit;text-indent:0px;text-transform:none;word-spacing:0px;text-decoration-line:none;font-size:18px;font-family:arial,helvetica,sans-serif;color:#808080">Here’s what your coverage includes:</span></div>
<ul>
  <li color="rgb(128, 128, 128)" style="text-align:inherit;font-family:arial,helvetica,sans-serif;color:rgb(128,128,128);font-size:18px;font-size:18px"><span style="font-style:normal;font-variant-caps:normal;font-weight:400;letter-spacing:normal;text-align:inherit;text-indent:0px;text-transform:none;word-spacing:0px;text-decoration-line:none;font-size:18px;font-family:arial,helvetica,sans-serif;color:#808080">24/7 direct access to our medical team</span></li>
  <li color="rgb(128, 128, 128)" style="text-align:inherit;font-family:arial,helvetica,sans-serif;color:rgb(128,128,128);font-size:18px;font-size:18px"><span style="font-style:normal;font-variant-caps:normal;font-weight:400;letter-spacing:normal;text-align:inherit;text-indent:0px;text-transform:none;word-spacing:0px;text-decoration-line:none;font-size:18px;font-family:arial,helvetica,sans-serif;color:#808080">Initial phone consultation with a qualified doctor</span></li>
  <li color="rgb(128, 128, 128)" style="text-align:inherit;font-family:arial,helvetica,sans-serif;color:rgb(128,128,128);font-size:18px;font-size:18px"><span style="font-style:normal;font-variant-caps:normal;font-weight:400;letter-spacing:normal;text-align:inherit;text-indent:0px;text-transform:none;word-spacing:0px;text-decoration-line:none;font-size:18px;font-family:arial,helvetica,sans-serif;color:#808080">Optional video consultations</span></li>
  <li color="rgb(128, 128, 128)" style="text-align:inherit;font-family:arial,helvetica,sans-serif;color:rgb(128,128,128);font-size:18px;font-size:18px"><span style="font-style:normal;font-variant-caps:normal;font-weight:400;letter-spacing:normal;text-align:inherit;text-indent:0px;text-transform:none;word-spacing:0px;text-decoration-line:none;font-size:18px;font-family:arial,helvetica,sans-serif;color:#808080">Hotel or villa visits when required</span></li>
  <li color="rgb(128, 128, 128)" style="text-align:inherit;font-family:arial,helvetica,sans-serif;color:rgb(128,128,128);font-size:18px;font-size:18px"><span style="font-style:normal;font-variant-caps:normal;font-weight:400;letter-spacing:normal;text-align:inherit;text-indent:0px;text-transform:none;word-spacing:0px;text-decoration-line:none;font-size:18px;font-family:arial,helvetica,sans-serif;color:#808080">Private medical consultations</span></li>
  <li color="rgb(128, 128, 128)" style="text-align:inherit;font-family:arial,helvetica,sans-serif;color:rgb(128,128,128);font-size:18px;font-size:18px"><span style="font-style:normal;font-variant-caps:normal;font-weight:400;letter-spacing:normal;text-align:inherit;text-indent:0px;text-transform:none;word-spacing:0px;text-decoration-line:none;font-size:18px;font-family:arial,helvetica,sans-serif;color:#808080">Assistance with medication refills</span></li>
</ul>
<div color="rgb(128, 128, 128)" style="font-family:arial,helvetica,sans-serif;text-align:inherit;color:rgb(128,128,128);font-size:18px"><br></div>
<div color="rgb(128, 128, 128)" style="font-family:arial,helvetica,sans-serif;text-align:inherit;color:rgb(128,128,128);font-size:18px"><span style="font-style:normal;font-variant-caps:normal;font-weight:400;letter-spacing:normal;text-align:inherit;text-indent:0px;text-transform:none;word-spacing:0px;text-decoration-line:none;font-size:18px;font-family:arial,helvetica,sans-serif;color:#808080">Contact Us:</span></div>
<div style="font-family:inherit;text-align:inherit"><br></div>
<div style="font-family:inherit;text-align:inherit"><span style="font-style:normal;font-variant-caps:normal;font-weight:400;letter-spacing:normal;text-align:inherit;text-indent:0px;text-transform:none;word-spacing:0px;text-decoration-line:none;font-size:18px;font-family:arial,helvetica,sans-serif;color:#808080">Call of WhatsApp (24/7):</span></div>
<div style="font-family:inherit;text-align:inherit"><br></div>
<div style="font-family:inherit;text-align:inherit"><span style="color:#808080;font-size:20px"><strong>24 / 7 - Medical Team at </strong></span><a href="tel:+248%20257%208899" target="_blank"><span style="color:#808080;font-size:20px"><u><strong>+248 257 8899</strong></u></span></a></div>
<div style="font-family:inherit;text-align:inherit"><br></div>
<div style="font-family:inherit;text-align:inherit"><span style="box-sizing:border-box;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;margin-top:0px;margin-right:0px;margin-bottom:0px;margin-left:0px;font-style:inherit;font-variant-caps:inherit;font-weight:inherit;line-height:inherit;font-family:inherit;font-size-adjust:inherit;font-kerning:inherit;font-variant-alternates:inherit;font-variant-ligatures:inherit;font-variant-numeric:inherit;font-variant-east-asian:inherit;font-feature-settings:inherit;font-size:18px;vertical-align:baseline;border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-top-style:none;border-right-style:none;border-bottom-style:none;border-left-style:none;border-top-color:currentcolor;border-right-color:currentcolor;border-bottom-color:currentcolor;border-left-color:currentcolor;letter-spacing:normal;text-align:start;text-indent:0px;text-transform:none;word-spacing:0px;text-decoration-line:none;color:#808080">Email:&nbsp;</span><a href="mailto:doctor@doctor247.sc?subject=&amp;body=" target="_blank"><span style="box-sizing:border-box;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;margin-top:0px;margin-right:0px;margin-bottom:0px;margin-left:0px;font-style:inherit;font-variant-caps:inherit;font-weight:inherit;line-height:inherit;font-family:inherit;font-size-adjust:inherit;font-kerning:inherit;font-variant-alternates:inherit;font-variant-ligatures:inherit;font-variant-numeric:inherit;font-variant-east-asian:inherit;font-feature-settings:inherit;font-size:18px;vertical-align:baseline;border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-top-style:none;border-right-style:none;border-bottom-style:none;border-left-style:none;border-top-color:currentcolor;border-right-color:currentcolor;border-bottom-color:currentcolor;border-left-color:currentcolor;outline-color:currentcolor;outline-style:none;outline-width:medium;color:#808080;text-decoration-line:none;letter-spacing:normal;text-align:start;text-indent:0px;text-transform:none;word-spacing:0px"><u>doctor@doctor247.sc</u></span></a></div>
<div style="font-family:inherit;text-align:inherit"><span style="box-sizing:border-box;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;margin-top:0px;margin-right:0px;margin-bottom:0px;margin-left:0px;font-style:inherit;font-variant-caps:inherit;font-weight:inherit;line-height:inherit;font-family:inherit;font-size-adjust:inherit;font-kerning:inherit;font-variant-alternates:inherit;font-variant-ligatures:inherit;font-variant-numeric:inherit;font-variant-east-asian:inherit;font-feature-settings:inherit;font-size:18px;vertical-align:baseline;border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-top-style:none;border-right-style:none;border-bottom-style:none;border-left-style:none;border-top-color:currentcolor;border-right-color:currentcolor;border-bottom-color:currentcolor;border-left-color:currentcolor;outline-color:currentcolor;outline-style:none;outline-width:medium;color:#808080;text-decoration-line:none;letter-spacing:normal;text-align:start;text-indent:0px;text-transform:none;word-spacing:0px">(Include your reference number in all messages)</span></div>
<div style="font-family:inherit;text-align:inherit"><br></div>
<div style="font-family:inherit;text-align:inherit"><span style="font-size:18px;color:#808080">This number accepts WhatsApp messages, WhatsApp calls, and regular phone calls.</span></div>
<div style="font-family:inherit;text-align:inherit"><br></div>
<div style="font-family:inherit;text-align:inherit"><span style="font-style:normal;font-variant-caps:normal;font-weight:400;letter-spacing:normal;text-align:inherit;text-indent:0px;text-transform:none;word-spacing:0px;text-decoration-line:none;font-size:18px;font-family:arial,helvetica,sans-serif;color:#808080">In a Serious Emergency:</span></div>
<ol>
  <li color="rgb(128, 128, 128)" style="text-align:inherit;font-family:arial,helvetica,sans-serif;color:rgb(128,128,128);font-size:18px;font-size:18px"><span style="font-style:normal;font-variant-caps:normal;font-weight:400;letter-spacing:normal;text-align:inherit;text-indent:0px;text-transform:none;word-spacing:0px;text-decoration-line:none;font-size:18px;font-family:arial,helvetica,sans-serif;color:#808080">Dial 999</span></li>
  <li color="rgb(128, 128, 128)" style="text-align:inherit;font-family:arial,helvetica,sans-serif;color:rgb(128,128,128);font-size:18px;font-size:18px"><span style="font-style:normal;font-variant-caps:normal;font-weight:400;letter-spacing:normal;text-align:inherit;text-indent:0px;text-transform:none;word-spacing:0px;text-decoration-line:none;font-size:18px;font-family:arial,helvetica,sans-serif;color:#808080">Inform your hotel staff</span></li>
  <li color="rgb(128, 128, 128)" style="text-align:inherit;font-family:arial,helvetica,sans-serif;color:rgb(128,128,128);font-size:18px;font-size:18px"><span style="font-style:normal;font-variant-caps:normal;font-weight:400;letter-spacing:normal;text-align:inherit;text-indent:0px;text-transform:none;word-spacing:0px;text-decoration-line:none;font-size:18px;font-family:arial,helvetica,sans-serif;color:#808080">Once stable, contact us</span></li>
</ol>
<div style="font-family:inherit;text-align:inherit"><br></div>
<div style="font-family:inherit;text-align:inherit"><span style="font-style:normal;font-variant-caps:normal;font-weight:400;letter-spacing:normal;text-align:inherit;text-indent:0px;text-transform:none;word-spacing:0px;text-decoration-line:none;font-family:arial,helvetica,sans-serif;font-size:18px;color:#808080">Need Additional Assistance?</span></div>
<div style="font-family:inherit;text-align:inherit"><span style="font-style:normal;font-variant-caps:normal;font-weight:400;letter-spacing:normal;text-align:inherit;text-indent:0px;text-transform:none;word-spacing:0px;text-decoration-line:none;font-family:arial,helvetica,sans-serif;font-size:18px;color:#808080">Our dedicated Support Team is also available to assist with any coordination or follow-up needs:</span></div>
<ul>
  <li color="rgb(128, 128, 128)" style="text-align:inherit;font-family:arial,helvetica,sans-serif;color:rgb(128,128,128);font-size:18px;font-size:18px"><span style="font-style:normal;font-variant-caps:normal;font-weight:400;letter-spacing:normal;text-align:inherit;text-indent:0px;text-transform:none;word-spacing:0px;text-decoration-line:none;font-family:arial,helvetica,sans-serif;font-size:18px;color:#808080">UK: </span><a href="tel:+44%2020%203287%206999" target="_blank"><span style="font-style:normal;font-variant-caps:normal;font-weight:400;letter-spacing:normal;text-align:inherit;text-indent:0px;text-transform:none;word-spacing:0px;text-decoration-line:none;font-family:arial,helvetica,sans-serif;font-size:18px;color:#808080"><u>+44 20 3287 6999</u></span></a></li>
  <li color="rgb(128, 128, 128)" style="text-align:inherit;font-family:arial,helvetica,sans-serif;color:rgb(128,128,128);font-size:18px;font-size:18px"><span style="font-style:normal;font-variant-caps:normal;font-weight:400;letter-spacing:normal;text-align:inherit;text-indent:0px;text-transform:none;word-spacing:0px;text-decoration-line:none;font-family:arial,helvetica,sans-serif;font-size:18px;color:#808080">USA: </span><a href="tel:+1%20917%20495%202020" target="_blank"><span style="font-style:normal;font-variant-caps:normal;font-weight:400;letter-spacing:normal;text-align:inherit;text-indent:0px;text-transform:none;word-spacing:0px;text-decoration-line:none;font-family:arial,helvetica,sans-serif;font-size:18px;color:#808080"><u>+1 917 495 2020</u></span></a></li>
</ul>
<div style="font-family:inherit;text-align:inherit"><br></div>
<div style="font-family:inherit;text-align:inherit"><span style="font-style:normal;font-variant-caps:normal;font-weight:400;letter-spacing:normal;text-align:inherit;text-indent:0px;text-transform:none;word-spacing:0px;text-decoration-line:none;font-family:arial,helvetica,sans-serif;font-size:18px;color:#808080">Travellers with active Seychelles Medical Protection may enjoy use of our electric courtesy cars.&nbsp;Bookings must be made in advance online at </span><a href="http://url7254.govtas.com/ls/click?upn=u001.ZCx8SEvFUnsHCsy3GeLa6P4IF78lhxDEloLwlgOkK6I-3DfZ4J_QuxSzMMqNJXVCubCpqeo1dhSX6-2FlmTYtFwLcdsp22qMj6XTRgQVZ2dncJTY0h56-2FlSB4MyE6OcOlJVmqvUxIhB7nmrKNOemHc9-2BQxTq6x5-2Ba5dyeJlx99spNBQlwjpKlizuHhZb1Bs3XcVIu6wucvH29FnKO1BSiCFlv5irHNHxE7zdYg5Yx8pi6ei3jqtq5ehAm1-2B2XdTtNHmaXcQIiVT3QyVC-2BYUbV69MhEahtasWNagmO-2FzWHRNd5AKKMWpGVnlz0vuqiz6hzvdkhl7SHi9TdL2xg4y98x05RnoBmM5v-2BPHHFMBl-2F-2BEgFXLzX4nvuNv1VImTyiLKWT99jESU-2BvDmBTNf6ODOeQ37g37vOjWe-2Bcm0-2B9LuGi43aDGtbkUtQs7dTkrodJhYp5-2FjbzWC813tX2BkoLilnW-2FGcLH8cqgo-3D" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://url7254.govtas.com/ls/click?upn%3Du001.ZCx8SEvFUnsHCsy3GeLa6P4IF78lhxDEloLwlgOkK6I-3DfZ4J_QuxSzMMqNJXVCubCpqeo1dhSX6-2FlmTYtFwLcdsp22qMj6XTRgQVZ2dncJTY0h56-2FlSB4MyE6OcOlJVmqvUxIhB7nmrKNOemHc9-2BQxTq6x5-2Ba5dyeJlx99spNBQlwjpKlizuHhZb1Bs3XcVIu6wucvH29FnKO1BSiCFlv5irHNHxE7zdYg5Yx8pi6ei3jqtq5ehAm1-2B2XdTtNHmaXcQIiVT3QyVC-2BYUbV69MhEahtasWNagmO-2FzWHRNd5AKKMWpGVnlz0vuqiz6hzvdkhl7SHi9TdL2xg4y98x05RnoBmM5v-2BPHHFMBl-2F-2BEgFXLzX4nvuNv1VImTyiLKWT99jESU-2BvDmBTNf6ODOeQ37g37vOjWe-2Bcm0-2B9LuGi43aDGtbkUtQs7dTkrodJhYp5-2FjbzWC813tX2BkoLilnW-2FGcLH8cqgo-3D&amp;source=gmail&amp;ust=1761020722985000&amp;usg=AOvVaw2qPo8nb85Kn_1oe466Comg"><span style="font-style:normal;font-variant-caps:normal;font-weight:400;letter-spacing:normal;text-align:inherit;text-indent:0px;text-transform:none;word-spacing:0px;text-decoration-line:none;font-family:arial,helvetica,sans-serif;font-size:18px;color:#808080"><u>Doctor247.sc</u></span></a></div>
<div style="font-family:inherit;text-align:inherit"><br></div>
<div style="font-family:inherit;text-align:inherit"><span style="font-style:normal;font-variant-caps:normal;font-weight:400;letter-spacing:normal;text-align:inherit;text-indent:0px;text-transform:none;word-spacing:0px;text-decoration-line:none;font-family:arial,helvetica,sans-serif;font-size:18px;color:#808080">A €35 daily mobility and service fee ensures vehicle readiness and on road assistance.</span></div>
<div style="font-family:inherit;text-align:inherit"><br></div>
<div style="font-family:inherit;text-align:inherit"><span style="font-style:normal;font-variant-caps:normal;font-weight:400;letter-spacing:normal;text-align:inherit;text-indent:0px;text-transform:none;word-spacing:0px;text-decoration-line:none;font-family:arial,helvetica,sans-serif;font-size:18px;color:#808080">Cars are offered on a first-come, first-served basis and can be collected and dropped off exclusively on Mahé at our Eden Island offices.</span></div><div></div></div></td>
      </tr>
    </tbody>
  </table><table role="module" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout:fixed">
    <tbody>
      <tr>
        <td style="padding:0px 0px 0px 0px" role="module-content" height="100%" valign="top" bgcolor="">
          <table border="0" cellpadding="0" cellspacing="0" align="center" width="100%" height="2px" style="line-height:2px;font-size:2px">
            <tbody>
              <tr>
                <td style="padding:0px 0px 2px 0px" bgcolor="#d2ebff"></td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table><table role="module" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout:fixed">
    <tbody>
      <tr>
        <td style="padding:10px 0px 18px 0px;line-height:22px;text-align:inherit" height="100%" valign="top" bgcolor="" role="module-content"><div><div style="font-family:inherit;text-align:start"><span style="box-sizing:border-box;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;margin-top:0px;margin-right:0px;margin-bottom:0px;margin-left:0px;font-style:inherit;font-variant-caps:inherit;font-weight:inherit;line-height:inherit;font-family:inherit;font-size-adjust:inherit;font-kerning:inherit;font-variant-alternates:inherit;font-variant-ligatures:inherit;font-variant-numeric:inherit;font-variant-east-asian:inherit;font-feature-settings:inherit;font-size:18px;vertical-align:baseline;border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-top-style:none;border-right-style:none;border-bottom-style:none;border-left-style:none;border-top-color:currentcolor;border-right-color:currentcolor;border-bottom-color:currentcolor;border-left-color:currentcolor;color:#808080;letter-spacing:normal;text-align:inherit;text-indent:0px;text-transform:none;word-spacing:0px;text-decoration-line:none">Thank you for choosing Seychelles Medical.</span></div>
<div style="font-family:inherit;text-align:start"><span style="box-sizing:border-box;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;margin-top:0px;margin-right:0px;margin-bottom:0px;margin-left:0px;font-style:inherit;font-variant-caps:inherit;font-weight:inherit;line-height:inherit;font-family:inherit;font-size-adjust:inherit;font-kerning:inherit;font-variant-alternates:inherit;font-variant-ligatures:inherit;font-variant-numeric:inherit;font-variant-east-asian:inherit;font-feature-settings:inherit;font-size:18px;vertical-align:baseline;border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-top-style:none;border-right-style:none;border-bottom-style:none;border-left-style:none;border-top-color:currentcolor;border-right-color:currentcolor;border-bottom-color:currentcolor;border-left-color:currentcolor;color:#808080;letter-spacing:normal;text-align:inherit;text-indent:0px;text-transform:none;word-spacing:0px;text-decoration-line:none">We’ve got your back, 24 hours a day.</span></div>
<div style="font-family:inherit;text-align:start"><br></div>
<div style="font-family:inherit;text-align:inherit;margin-left:0px"><span style="box-sizing:border-box;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;margin-top:0px;margin-right:0px;margin-bottom:0px;margin-left:0px;font-style:inherit;font-variant-caps:inherit;font-weight:inherit;line-height:inherit;font-family:inherit;font-size-adjust:inherit;font-kerning:inherit;font-variant-alternates:inherit;font-variant-ligatures:inherit;font-variant-numeric:inherit;font-variant-east-asian:inherit;font-feature-settings:inherit;font-size:18px;vertical-align:baseline;border-top-width:0px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;border-top-style:none;border-right-style:none;border-bottom-style:none;border-left-style:none;border-top-color:currentcolor;border-right-color:currentcolor;border-bottom-color:currentcolor;border-left-color:currentcolor;color:#808080;letter-spacing:normal;text-align:inherit;text-indent:0px;text-transform:none;word-spacing:0px;text-decoration-line:none">SMS Private Doctors 24/7</span></div><div></div></div></td>
      </tr>
    </tbody>
  </table></td>
                                      </tr>
                                    </tbody></table>
                                    
                          </td>
                        </tr>
                      </tbody></table>
                    </td>
                  </tr>
                </tbody></table>
              </td>
            </tr>
</tbody></table>
HTML;

    // Send the email
    wp_mail($to_email, $subject, $message, $headers);
}




function cs_save_booking_sy()
{
    $response = [
        "success" => false,
        "message" => "Something went wrong",
    ];

    $data = $_POST['data'] ?? [];

    $email = sanitize_email($data['email']);

    $post_id = wp_insert_post([
        "post_title"   => "New Booking - " . $email,
        "post_content" => "",
        "post_type"    => "protection",
        "post_status"  => "private",
    ]);

    if (is_wp_error($post_id)) {
        $response['message'] = "Post creation failed.";
        die(json_encode($response));
    }

    // Personal Information
    update_field("phone_number", sanitize_text_field($data['phone_number']), $post_id);
    update_field("email", $email, $post_id);

    if (isset($data['applicants']) && is_array($data['applicants'])) {
        $applicants_data = [];
        foreach ($data['applicants'] as $applicant) {
            $applicants_data[] = [
                "emergency_contact_name" => sanitize_text_field($applicant['name']),
                "emergency_contact_dob" => sanitize_text_field($applicant['dob']),
            ];
        }
        update_field("emergency_contacts", $applicants_data, $post_id);
    }

    // Trip Information
    update_field("arrival_date", sanitize_text_field($data['arrival_date']), $post_id);
    update_field("departure_date", sanitize_text_field($data['departure_date']), $post_id);
    update_field("home_address", sanitize_text_field($data['address_in_seychelles']), $post_id);

    // Medical Protection
    update_field("medical_protection", sanitize_text_field($data['medical_protection']), $post_id);
    update_field("amount", sanitize_text_field($data['amount']), $post_id);


    $response['success'] = true;
    $response['message'] = "Booking saved successfully.";
    $response['post_id'] = $post_id;


    //  send mail to the customer
    // send_certificate_email("customerEmail");

    die(json_encode($response));
}

add_action("wp_ajax_nopriv_" . $php_file_name, "cs_" . $php_file_name);
add_action("wp_ajax_" . $php_file_name, "cs_" . $php_file_name);



// add_action("init", function () {

//     send_certificate_email("faheemh127@gmail.com");
// });
