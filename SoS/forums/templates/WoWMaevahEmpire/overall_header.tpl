<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html dir="{S_CONTENT_DIRECTION}">
<head>
<meta http-equiv="Content-Type" content="text/html; charset={S_CONTENT_ENCODING}">
<meta http-equiv="Content-Style-Type" content="text/css">
{META}
{NAV_LINKS}
<title>{SITENAME} :: {PAGE_TITLE}</title>
<!-- link rel="stylesheet" href="templates/WoWMaevahEmpire/{T_HEAD_STYLESHEET}" type="text/css" -->
<style type="text/css">
<!--
/*
  The original WoWMaevahEmpire Theme for phpBB version 2+
  Created by Moonclaw/Ma�vah   http://www.wowcr.net  NOTE: These CSS definitions are stored within the main page body so that you can use the phpBB2
  theme administration centre. When you have finalised your style you could cut the final CSS code
  and place it in an external file, deleting this section to save bandwidth.
*/

/* General page style. The scroll bar colours only visible in IE5.5+ */
body { 
	background-image:url('templates/WoWMaevahEmpire/images/wowmaevahempirebackgrounda01.gif');
	background-color: {T_BODY_BGCOLOR};
	scrollbar-face-color: {T_TR_COLOR2};
	scrollbar-highlight-color: {T_TD_COLOR2};
	scrollbar-shadow-color: {T_TR_COLOR2};
	scrollbar-3dlight-color: {T_TR_COLOR3};
	scrollbar-arrow-color:  {T_BODY_LINK};
	scrollbar-track-color: {T_TR_COLOR1};
	scrollbar-darkshadow-color: {T_TH_COLOR1};
}

/* General font families for common tags */
font,th,td,p { font-family: {T_FONTFACE1} }
a:link,a:active,a:visited { color : {T_BODY_LINK}; }
a:hover		{ text-decoration: underline; color : {T_BODY_HLINK}; }
hr	{ height: 0px; border: solid {T_TR_COLOR3} 0px; border-top-width: 1px;}

/* This is the border line & background colour round the entire page */
.bodyline	{
	background-image:url('templates/WoWMaevahEmpire/images/wowmaevahempirebackgrounda01.gif');
	background-color: none;
	border: 0px {T_TH_COLOR1} solid; 
}

/* This is the outline round the main forum tables */
.forumline	{ background-color: {T_TD_COLOR2}; border: 1px {T_TH_COLOR2} solid; background-image:url('templates/WoWMaevahEmpire/images/wowmaevahempirebackgrounda01.gif'); }

/* Main table cell colours and backgrounds */
td.row1	{ background-color: none; border: 1px #191919 ridge;}
td.row2	{ background-image:url('templates/WoWMaevahEmpire/images/wowmaevahempirebackgrounda02.gif'); background-color: none; border: 1px #191919 ridge;}
td.row3	{ background-image:url('templates/WoWMaevahEmpire/images/wowmaevahempirebackgrounda01.gif'); background-color: none; border: 1px #191919 ridge;}

/*
  This is for the table cell above the Topics, Post & Last posts on the index.php page
  By default this is the fading out gradiated silver background.
  However, you could replace this with a bitmap specific for each forum
*/
td.rowpic {
		background-color: {T_TD_COLOR2};
		background-image: url(templates/WoWMaevahEmpire/images/{T_TH_CLASS3});
		background-repeat: repeat-x;
}

/* Header cells - the blue and silver gradient backgrounds */
th	{
	color: {T_FONTCOLOR3}; font-size: {T_FONTSIZE2}px; font-weight : bold; 
	background-color: {T_BODY_LINK}; height: 25px;
	background-image: url(templates/WoWMaevahEmpire/images/{T_TH_CLASS2});
}

td.cat,td.catHead,td.catSides,td.catLeft,td.catRight,td.catBottom {
			background-image: url(templates/WoWMaevahEmpire/images/{T_TH_CLASS1});
			background-color:{T_TR_COLOR3}; border: {T_TH_COLOR3}; border-style: solid; height: 28px;
}

/*
  Setting additional nice inner borders for the main table cells.
  The names indicate which sides the border will be on.
  Don't worry if you don't understand this, just ignore it :-)
*/
td.cat,td.catHead,td.catBottom {
	height: 29px;
	border-width: 0px 0px 0px 0px;
}
th.thHead,th.thSides,th.thTop,th.thLeft,th.thRight,th.thBottom,th.thCornerL,th.thCornerR {
	font-weight: bold; border: {T_TD_COLOR2}; border-style: solid; height: 28px;
}
td.row3Right,td.spaceRow {
	background-color: {T_TR_COLOR3}; border: {T_TH_COLOR3}; border-style: solid; background-image:url('templates/WoWMaevahEmpire/images/wowmaevahempirebackgrounda01.gif');
}

th.thHead,td.catHead { font-size: {T_FONTSIZE3}px; border-width: 1px 1px 0px 1px; }
th.thSides,td.catSides,td.spaceRow	 { border-width: 0px 1px 0px 1px; }
th.thRight,td.catRight,td.row3Right	 { border-width: 0px 1px 0px 0px; }
th.thLeft,td.catLeft	  { border-width: 0px 0px 0px 1px; }
th.thBottom,td.catBottom  { border-width: 0px 1px 1px 1px; }
th.thTop	 { border-width: 1px 0px 0px 0px; }
th.thCornerL { border-width: 1px 0px 0px 1px; }
th.thCornerR { border-width: 1px 1px 0px 0px; }

/* The largest text used in the index page title and toptic title etc. */
.maintitle	{
	font-weight: bold; font-size: 22px; font-family: "{T_FONTFACE2}",{T_FONTFACE1};
	text-decoration: none; line-height : 120%; color : {T_BODY_TEXT}; font-variant: small-caps;
}

/* General text */
.gen { font-size : {T_FONTSIZE3}px; }
.genmed { font-size : {T_FONTSIZE2}px; }
.gensmall { font-size : {T_FONTSIZE1}px; }
.gen,.genmed,.gensmall { color : {T_BODY_TEXT}; }
a.gen,a.genmed,a.gensmall { color: {T_BODY_LINK}; text-decoration: none; }
a.gen:hover,a.genmed:hover,a.gensmall:hover	{ color: {T_BODY_HLINK}; text-decoration: underline; }

/* The register, login, search etc links at the top of the page */
.mainmenu		{ font-size : {T_FONTSIZE2}px; color : {T_BODY_TEXT} }
a.mainmenu		{ text-decoration: none; color : {T_BODY_LINK};  }
a.mainmenu:hover{ text-decoration: underline; color : {T_BODY_HLINK}; }

/* Forum category titles */
.cattitle		{ font-weight: bold; font-size: {T_FONTSIZE3}px ; letter-spacing: 1px; color : {T_BODY_LINK}}
a.cattitle		{ text-decoration: none; color : {T_BODY_LINK}; }
a.cattitle:hover{ text-decoration: underline; }

/* Forum title: Text and link to the forums used in: index.php */
.forumlink		{ font-weight: bold; font-size: {T_FONTSIZE3}px; color : {T_BODY_LINK}; }
a.forumlink 	{ text-decoration: none; color : {T_BODY_LINK}; }
a.forumlink:hover{ text-decoration: underline; color : {T_BODY_HLINK}; }

/* Used for the navigation text, (Page 1,2,3 etc) and the navigation bar when in a forum */
.nav			{ font-weight: bold; font-size: {T_FONTSIZE2}px; color : {T_BODY_TEXT};}
a.nav			{ text-decoration: none; color : {T_BODY_LINK}; }
a.nav:hover		{ text-decoration: underline;}

/* titles for the topics: could specify viewed link colour too */
.topictitle,h1,h2	{ font-weight: bold; font-size: {T_FONTSIZE2}px; color : {T_BODY_TEXT}; }
a.topictitle:link   { text-decoration: none; color : {T_BODY_LINK}; }
a.topictitle:visited { text-decoration: none; color : {T_BODY_VLINK}; }
a.topictitle:hover	{ text-decoration: underline; color : {T_BODY_HLINK}; }

/* Name of poster in viewmsg.php and viewtopic.php and other places */
.name			{ font-size : {T_FONTSIZE2}px; color : {T_BODY_TEXT};}

/* Location, number of posts, post date etc */
.postdetails		{ font-size : {T_FONTSIZE1}px; color : {T_BODY_TEXT}; }

/* The content of the posts (body of text) */
.postbody { font-size : {T_FONTSIZE3}px; line-height: 18px}
a.postlink:link	{ text-decoration: none; color : {T_BODY_LINK} }
a.postlink:visited { text-decoration: none; color : {T_BODY_VLINK}; }
a.postlink:hover { text-decoration: underline; color : {T_BODY_HLINK}}

/* Quote & Code blocks */
.code { 
	font-family: {T_FONTFACE3}; font-size: {T_FONTSIZE2}px; color: {T_FONTCOLOR1};
	background-color: {T_TD_COLOR1}; border: {T_TR_COLOR3}; border-style: ridge;
	border-left-width: 1px; border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px;
	background-image:url('templates/WoWMaevahEmpire/images/wowmaevahempirebackgrounda03.gif');
}

.quote {
	font-family: {T_FONTFACE1}; font-size: {T_FONTSIZE2}px; color: {T_FONTCOLOR1}; line-height: 125%;
	background-color: {T_TD_COLOR1}; border: {T_TR_COLOR3}; border-style: ridge;
	border-left-width: 1px; border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px;
	background-image:url('templates/WoWMaevahEmpire/images/wowmaevahempirebackgrounda03.gif');
}

/* Copyright and bottom info */
.copyright		{ font-size: 10px; font-family:Verdana, Arial, Helvetica, sans-serif; color: {T_FONTCOLOR1}; letter-spacing: -1px;}
a.copyright		{ color: {T_FONTCOLOR1}; text-decoration: none;}
a.copyright:hover { color: {T_BODY_TEXT}; text-decoration: underline; ; }

/* Form elements */
input,textarea, select {
	color : {T_BODY_TEXT};
	font: normal {T_FONTSIZE2}px {T_FONTFACE1};
	border-color : {T_BODY_TEXT};
}

/* The text input fields background colour */
input.post, textarea.post, select {
	background-color : {T_TD_COLOR2};
}

input { text-indent : 2px; }

/* The buttons used for bbCode styling in message post */
input.button {
	background-color : {T_TR_COLOR1};
	color : {T_BODY_TEXT};
	font-size: {T_FONTSIZE2}px; font-family: {T_FONTFACE1};
}

/* The main submit button option */
input.mainoption {
	background-color : {T_TD_COLOR1};
	font-weight : bold;
}

/* None-bold submit button */
input.liteoption {
	background-color : {T_TD_COLOR1};
	font-weight : normal;
}

/* This is the line in the posting page which shows the rollover
  help line. This is actually a text box, but if set to be the same
  colour as the background no one will know ;)
*/
.helpline { background-color: {T_TR_COLOR2}; border-style: none; }

/* Import the fancy styles for IE only (NS4.x doesn't use the @import function) */
@import url("templates/WoWMaevahEmpire/formIE.css"); 
-->
</style>
<!-- BEGIN switch_enable_pm_popup -->
<script language="Javascript" type="text/javascript">
<!--
	if ( {PRIVATE_MESSAGE_NEW_FLAG} )
	{
		window.open('{U_PRIVATEMSGS_POPUP}', '_phpbbprivmsg', 'HEIGHT=225,resizable=yes,WIDTH=400');;
	}
//-->
</script>
<!-- END switch_enable_pm_popup -->
</head>
<body bgcolor="{T_BODY_BGCOLOR}" text="{T_BODY_TEXT}" link="{T_BODY_LINK}" vlink="{T_BODY_VLINK}">

<a name="top"></a>
<CENTER>
<table width="100%" cellspacing="0" cellpadding="10" border="0" align="center"> 
	<tr> 
		<td class="bodyline"><table width="100%" cellspacing="0" cellpadding="0" border="0">
			<tr> 
				<td>
<BR>
<CENTER><a href="{U_INDEX}"><img src="../images/header.gif" border="0" alt="{L_INDEX}" vspace="1" /></a></CENTER>
</td>
                  </TR>
                  <TR>
				<td align="center" width="100%" valign="middle">

<!-- <span class="maintitle">{SITENAME}</span><br /><span class="gen">{SITE_DESCRIPTION}<br />&nbsp; </span> --> 
<BR>
				<CENTER>
                        <table cellspacing="0" cellpadding="2" border="0" WIDTH="100%">
					<tr> 
						<td align="center" valign="top" nowrap="nowrap">

                                    <!-- <span class="mainmenu">&nbsp;

			<a href="../main.html"><img src="templates/WoWMaevahEmpire/images/icon_mini_faq.gif" width="12" height="13" border="0" alt="Home Page" hspace="3" />Home</a>&nbsp; &nbsp;
			<a href="../roster.htm"><img src="templates/WoWMaevahEmpire/images/icon_mini_search.gif" width="12" height="13" border="0" alt="Roster" hspace="3" />Roster</a>&nbsp; &nbsp;
			<a href="index.php"><img src="templates/WoWMaevahEmpire/images/icon_mini_members.gif" width="12" height="13" border="0" alt="Fourms" hspace="3" />Forums</a>&nbsp; &nbsp;
			<a href="apply.php"><img src="templates/WoWMaevahEmpire/images/icon_mini_groups.gif" width="12" height="13" border="0" alt="Guild Application" hspace="3" />Guild Application</a>&nbsp; &nbsp;
			<a href="../eqdkp/listmembers.php"><img src="templates/WoWMaevahEmpire/images/icon_mini_register.gif" width="12" height="13" border="0" alt="DKP" hspace="3" />DKP</a>&nbsp; &nbsp;
			<a href="../images/rules.gif"><img src="templates/WoWMaevahEmpire/images/icon_mini_profile.gif" width="12" height="13" border="0" alt="Rules" hspace="3" />Rules</a>&nbsp;

						</span> -->

<TABLE BORDER="0" CELLSPACING="0" CELLPADDING="0" WIDTH="100%" BACKGROUND="../backbar.jpg">
  <TR>
    <TD><CENTER>
<OBJECT classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"
 codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0"
 WIDTH="654" HEIGHT="31" id="menu" ALIGN="">
 <PARAM NAME=movie VALUE="../menu.swf">
 <PARAM NAME=quality VALUE=high>
 <PARAM NAME=bgcolor VALUE=#000000>

 <EMBED src="../menu.swf" quality=high bgcolor=#000000  WIDTH="654" HEIGHT="31" NAME="menu" ALIGN=""
 TYPE="application/x-shockwave-flash" PLUGINSPAGE="http://www.macromedia.com/go/getflashplayer"></EMBED>

</OBJECT>
</CENTER>
</TD>
  </TR>
</TABLE>

</td>
					</tr>

					<tr> 
						<td align="center" valign="top" nowrap="nowrap">
<span class="mainmenu">&nbsp;
<a href="{U_FAQ}" class="mainmenu"><img src="templates/WoWMaevahEmpire/images/icon_mini_faq.gif" width="12" height="13" border="0" alt="{L_FAQ}" hspace="3" />{L_FAQ}</a>&nbsp; &nbsp;
<a href="{U_SEARCH}" class="mainmenu"><img src="templates/WoWMaevahEmpire/images/icon_mini_search.gif" width="12" height="13" border="0" alt="{L_SEARCH}" hspace="3" />{L_SEARCH}</a>&nbsp; &nbsp;
<a href="{U_MEMBERLIST}" class="mainmenu"><img src="templates/WoWMaevahEmpire/images/icon_mini_members.gif" width="12" height="13" border="0" alt="{L_MEMBERLIST}" hspace="3" />{L_MEMBERLIST}</a>&nbsp; &nbsp;
<a href="{U_GROUP_CP}" class="mainmenu"><img src="templates/WoWMaevahEmpire/images/icon_mini_groups.gif" width="12" height="13" border="0" alt="{L_USERGROUPS}" hspace="3" />{L_USERGROUPS}</a>&nbsp; 
						<!-- BEGIN switch_user_logged_out -->
						&nbsp;<a href="{U_REGISTER}" class="mainmenu"><img src="templates/WoWMaevahEmpire/images/icon_mini_register.gif" width="12" height="13" border="0" alt="{L_REGISTER}" hspace="3" />{L_REGISTER}</a>&nbsp;
						<!-- END switch_user_logged_out -->
						&nbsp;<a href="{U_PROFILE}" class="mainmenu"><img src="templates/WoWMaevahEmpire/images/icon_mini_profile.gif" width="12" height="13" border="0" alt="{L_PROFILE}" hspace="3" />{L_PROFILE}</a>&nbsp; &nbsp;<a href="{U_PRIVATEMSGS}" class="mainmenu"><img src="templates/WoWMaevahEmpire/images/icon_mini_message.gif" width="12" height="13" border="0" alt="{PRIVATE_MESSAGE_INFO}" hspace="3" />{PRIVATE_MESSAGE_INFO}</a>&nbsp; &nbsp;<a href="{U_LOGIN_LOGOUT}" class="mainmenu"><img src="templates/WoWMaevahEmpire/images/icon_mini_login.gif" width="12" height="13" border="0" alt="{L_LOGIN_LOGOUT}" hspace="3" />{L_LOGIN_LOGOUT}</a>&nbsp;</span></td>
					</tr>
				</table></
				</table>
</CENTER>
</td>
			</tr>
		</table>
</CENTER>
		<br />
