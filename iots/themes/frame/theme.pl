
#############
sub getvars {
#############
        $titlebg = "#000000";
        $titletext = "#000000";
        $windowbg = "#eeeeee";
        $windowbg2 = "#ffffff";
        $windowbg3 = "#eeeeee";
}


##############
sub menuitem {
##############

my ($url, $title) = @_;
print qq~<img src="$themesurl/$usertheme/images/dot.gif">&nbsp;<a href="$pageurl/$cgi\?action=$url" class="menu">$title</a>
~;

}

###############
sub boxheader {
###############

my ($title) = @_;
print qq~<tr><td>
<CENTER>
  <TABLE BORDER="0" CELLSPACING="0" CELLPADDING="0" ALIGN="Center" WIDTH="100%">
    <TR>
      <TD><IMG src="$themesurl/$usertheme/pictures/group1-1.gif" width="21" height="26" border="0"></TD>
      <TD><IMG src="$themesurl/$usertheme/pictures/group1-2.gif" width="49" height="26" border="0"></TD>
      <TD width="100%" BACKGROUND="$themesurl/$usertheme/pictures/group1-3.gif"><IMG src="$themesurl/$usertheme/pictures/group1-3.gif" width="49" height="26" border="0"></TD>
      <TD><IMG src="$themesurl/$usertheme/pictures/group1-4.gif" width="38" height="26" border="0"></TD>
      <TD><IMG src="$themesurl/$usertheme/pictures/group1-5.gif" width="22" height="26" border="0"></TD>
    </TR>
    <TR>
      <TD VALIGN="Top" BACKGROUND="$themesurl/$usertheme/pictures/group3-1.gif"><IMG src="$themesurl/$usertheme/pictures/group2-1.gif"
	    width="21" height="51" border="0"></TD>
      <TD ROWSPAN="3" COLSPAN="3" BGCOLOR="#000000" BACKGROUND="$themesurl/$usertheme/pictures/group2-2.gif" VALIGN="Top">
	  <CENTER><font color=white>&nbsp;$title</FONT></CENTER><HR>
	  <table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
<td width="100%">
<table border="0" cellpadding="0" cellspacing="3" width="100%" >
~;

}

###############
sub boxfooter {
###############

print qq~
</table>
</td>
</tr>
</table>
	</TD>
      <TD VALIGN="Top" BACKGROUND="$themesurl/$usertheme/pictures/group3-5.gif"><IMG src="$themesurl/$usertheme/pictures/group2-5.gif"
	    width="22" height="51" border="0"></TD>
    </TR>
    <TR>
      <TD BACKGROUND="$themesurl/$usertheme/pictures/group3-1.gif"><IMG src="$themesurl/$usertheme/pictures/group3-1.gif" width="21"
	    height="84" border="0"></TD>
      <TD BACKGROUND="$themesurl/$usertheme/pictures/group3-5.gif"><IMG src="$themesurl/$usertheme/pictures/group3-5.gif" width="22"
	    height="84" border="0"></TD>
    </TR>
    <TR>
      <TD VALIGN="Bottom" BACKGROUND="$themesurl/$usertheme/pictures/group3-1.gif"><IMG src="$themesurl/$usertheme/pictures/group4-1.gif"
	    width="21" height="30" border="0"></TD>
      <TD VALIGN="Bottom" BACKGROUND="$themesurl/$usertheme/pictures/group3-5.gif"><IMG src="$themesurl/$usertheme/pictures/group4-5.gif"
	    width="22" height="30" border="0"></TD>
    </TR>
    <TR>
      <TD><IMG src="$themesurl/$usertheme/pictures/group5-1.gif" width="21" height="12" border="0"></TD>
      <TD><IMG src="$themesurl/$usertheme/pictures/group5-2.gif" width="49" height="12" border="0"></TD>
      <TD BACKGROUND="$themesurl/$usertheme/pictures/group5-3.gif"><IMG src="$themesurl/$usertheme/pictures/group5-3.gif" width="26"
	    height="12" border="0"></TD>
      <TD><IMG src="$themesurl/$usertheme/pictures/group5-4.gif" width="38" height="12" border="0"></TD>
      <TD><IMG src="$themesurl/$usertheme/pictures/group5-5.gif" width="22" height="12" border="0"></TD>
    </TR>
  </TABLE>
</CENTER>
</td>
</tr>
~;

}

#############
sub getvars {
#############
        $titlebg = "#000000";
        $titletext = "#000000";
        $windowbg = "#eeeeee";
        $windowbg2 = "#ffffff";
        $windowbg3 = "#eeeeee";
}

#####################
sub nav_bar {
#####################

print qq~
<table border="0" cellpadding="0" cellspacing="0" width="100%" class="menutable"$background>
<tr>
<td>&nbsp;$nav{'002'} $navbar</td>
</tr>
</table>
<table bgcolor="$bgcolor" border="0" cellpadding="0" cellspacing="0" width="100%" class="menubordercolor">
<tr>
<td width="100%">
<table bgcolor="$bgcolor" border="0" cellpadding="0" cellspacing="3" width="100%" class="menubackcolor">
<tr>
<td valign="top" width="100%">
~;

}

#####################
sub logo_block {
#####################

print qq~<CENTER>
<TABLE BORDER="0" CELLSPACING="0" CELLPADDING="0" WIDTH="100%">

        <TR>
			<TD><CENTER>
              <IMG SRC="$themesurl/$usertheme/images/logo.gif">
            </CENTER>
          </TD>
        </TR>

      </TABLE></CENTER>
<BR>~;

}


####################
sub checkforbanner {
####################

        if ($dispfrad ne "0") { banner_disp(); }

}

####################
sub show_banner {
####################

print qq~

<div align="center">
<table class="pagetable">
<tr><td>
<table class="bannertable">
    <tr>
      <td class="bannertexttitle">
<div align="center">
~;

        require "$sourcedir/ads.pl";
        OutputJava();

print qq~

</div>


</td>
    </tr>
  </table>
</td>
</tr>
</table>
</div>
~;

}

#######################
sub menu_bar {
#######################

print qq~<table border="0" cellpadding="0" cellspacing="0" width="100%" class="navbar"$background>
          <tr>
            <td width="20%" align="center">&nbsp;<a href="$pageurl/$cgi" class="nav">$nav{'002'}</a>&nbsp;</td>
            <td width="20%" align="center">&nbsp;<a href="$pageurl/$cgi?action=topics" class="nav">$nav{'004'}</a>&nbsp;</td>
            <td width="20%" align="center">&nbsp;<a href="$pageurl/$cgi?action=forum&amp;board=" class="nav">$nav{'003'}</a>&nbsp;</td>
            <td width="20%" align="center">&nbsp;<a href="$pageurl/$cgi?action=links" class="nav">$nav{'005'}</a>&nbsp;</td>
                        <td width="20%" align="center">&nbsp;<a href="$pageurl/$cgi?action=downloads" class="nav">$nav{'056'}</a>&nbsp;</td>
          </tr>
        </table>~;

}

#######################
sub main_menu {
#######################

      boxheader("$nav{'038'}");

      menuitem(" ", "$nav{'002'}");
      menuitem("topics", "$nav{'004'}");
      menuitem("forum&board=", "$nav{'003'}");
      menuitem("links", "$nav{'005'}");
      menuitem("downloads", "$nav{'056'}");
      menuitem("top10", "$nav{'007'}");
      menuitem("palm", "$nav{'153'}");

###########################################################################
# Adding a new link Example (possible uses: with new mods)
#
# print qq~<tr>
# <td class="cat"><img src="$themesurl/$usertheme/images/dot.gif">&nbsp;<a href="http://www.mydomain.com/cgi-bin/mods/newmod/newmod.cgi" class="menu">New Mod</a></td>
# </tr>~;
#
###########################################################################

         boxfooter();



}

########################
sub search_block {
########################

if ($searchmod eq "2") {


boxheader("$nav{'039'}");
print qq~<tr>
<td align="center">
<table cellspacing="3" cellpadding="0" border="0" width="100%">
<form method="POST" action="$pageurl/$cgi\?action=search">
<input type="hidden" name="action" value="search">
<tr>
<td align="center"><input type="text" name="pattern" size="16" class="text"></td>
</tr>
<tr>
<td align="center"><input type="submit" class="searchbutton" value="$btn{'001'}"></td>
</tr>
<tr>
<td align="center"><a href="$pageurl/$cgi?action=search&keyword=AdvancedSearch&amp;page=0&amp;articleson=on&amp;forumson=off&amp;linkson=off&amp;downloadson=off" class="menu">$nav{'154'}</a></td>
</tr>
<input type="hidden" name="articleson" value="on">
<input type="hidden" name="forumson" value="on">
<input type="hidden" name="linkson" value="off">
<input type="hidden" name="downloadson" value="off">
</form>
</table>
</td>
</tr>
~;
        boxfooter();


}

}

#######################
sub search_module {
#######################

print qq~
<tr>
    <td align="right" valign="bottom" width="50%"><form method="POST" action="$pageurl/$cgi\?action=search"><input type="hidden" name="action" value="search"><input type="text" name="pattern" size="16" class="text"><input type="submit" class="searchbutton" value="$btn{'001'}">
                <br><a href="$pageurl/$cgi?action=search&keyword=AdvancedSearch&amp;page=0&amp;articleson=on&amp;forumson=off&amp;linkson=off&amp;downloadson=off" class="helps">$nav{'154'}</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="hidden" name="articleson" value="on">
                <input type="hidden" name="forumson" value="on">
                <input type="hidden" name="linkson" value="off">
                <input type="hidden" name="downloadson" value="off"></form></td>
</tr>
~;

}

########################
sub mysite_block {
########################

        if ($username eq "$anonuser") {
        login_panel();
        } else {
        member_panel();
        }

}

##########################
sub status_block {
##########################


        boxheader("$nav{'040'}");
        userstatus();
        boxfooter();


}

############################
sub leftblock_block {
############################

        require "$sourcedir/block.pl";
        block_left();

}

#############################
sub poll_block {
#############################

if ($pollmod eq "" || $pollmod eq "1") {


        boxheader("$nav{'041'}");
        require "$sourcedir/poll.pl"; poll();
        boxfooter();

}

}

###########################
sub rightblock_block {
###########################

                require "$sourcedir/block.pl";
                block_right();

}

######################
sub calendar_block {
######################

if ($modulecal == 1) {


boxheader("$msg{'284'}");
require "$sourcedir/showcal.pl";
displayCal();
boxfooter();

}

}

#######################
sub newsletter_block {
#######################

if ($modulenl eq "1") {
if ($modulenlmem eq "1" && $username ne "$anonuser") {
newsletter_display();
}
if ($modulenlmem eq "0") {
newsletter_display();
}
}
}

########################
sub newsletter_display {
########################


        boxheader("$mnu{'038'}");
        print qq~<form action="$pageurl/$cgi\?action=subscribe" method="POST">
<tr>
<td align="center" class="cat">
$msg{'487'}<p class="cat">$msg{'007'}<br><input type="text" name="joinnl" value="" size="12">
</td>
</tr>
<tr>
<td align="center" class="cat">~; print "$msg{'176'}"; print qq~<input type="radio" name="action" value="subscribe" checked></td></tr><tr><td align="center" class="cat">~; print "$msg{'177'}"; print qq~<input type="radio" name="action" value="remove"></td></tr>
<tr><td align="center">
<input type="submit" value="$btn{'016'}" class="newsletterbutton"></td></tr>
</form>
</td>
</tr>
~;
        boxfooter();
}

########################
sub info_block {
########################

if ($infoblockmod eq "1") {


                if ($username ne "$anonuser") {

                open(FILE, "$memberdir/$username.pref") || error("$err{'010'}");
                file_lock(FILE);
                chomp(@preferences = <FILE>);
                unfile_lock(FILE);
                close(FILE);

                if ($preferences[1] == 1 || $preferences[1] eq "" ) {

        boxheader("$msg{'486'}");
        print qq~<tr>
<td align="center" class="cat"><a href="$link1" target="_blank"><img alt="" border="0" src="$image1"></a></td>
</tr>
<tr>
<td align="center" class="cat"><a href="$link2" target="_blank"><img alt="" border="0" src="$image2"></a></td>
</tr>
<tr>
<td align="center" class="cat"><a href="$link3" target="_blank"><img alt="" border="0" src="$image3"></a></td>
</tr>
~;
        boxfooter();

}
} else {
        boxheader("$msg{'486'}");
        print qq~<tr>
<td align="center" class="cat"><a href="$link1" target="_blank"><img alt="" border="0" src="$image1"></a></td>
</tr>
<tr>
<td align="center" class="cat"><a href="$link2" target="_blank"><img alt="" border="0" src="$image2"></a></td>
</tr>
<tr>
<td align="center" class="cat"><a href="$link3" target="_blank"><img alt="" border="0" src="$image3"></a></td>
</tr>
~;
        boxfooter();
}
}

        if ($infoblockmod eq "2") {


boxheader("$msg{'486'}");
        print qq~<tr>
<td align="center" class="cat"><a href="$link1" target="_blank"><img alt="" border="0" src="$image1"></a></td>
</tr>
<tr>
<td align="center" class="cat"><a href="$link2" target="_blank"><img alt="" border="0" src="$image2"></a></td>
</tr>
<tr>
<td align="center" class="cat"><a href="$link3" target="_blank"><img alt="" border="0" src="$image3"></a></td>
</tr>
~;
        boxfooter();
}
}

###########################
sub mycontent_block {
###########################

        if ($showcon eq "1") {

print qq~

<div align="center">
<table class="pagetable" width="100%">
<tr>
<td>

<table  width="100%">
    <tr>
      <td>
<div align="center">
~;
      boxheader("$nav{'093'}" );
      latestforumposts();
      if (@myforumnum) {
            for ($myflcounter = 0; $myflcounter < @myforumnum && $myflcounter < 5; $myflcounter++) {
                  print qq~<tr>
<td><img src="$themesurl/$usertheme/images/dot.gif">&nbsp;$myforumdata{$myforumnum[$myflcounter]}</td>
</tr>
~;
            }
      }
      else {
            print qq~<tr>
<td>$msg{'179'}</td>
</tr>
~;
      }
      boxfooter();

      print qq~

</div>
  </td>
    </tr>
  </table>
</td>
</tr>
</table>
~;

}

}

######################
sub mycontent_block2 {
######################

        if ($showcon2 eq "1") {

print qq~

<div align="center">
<table class="pagetable" width="100%">
<tr>
<td>

<table class="mycontenttable" width="100%">
    <tr>
      <td>
<div align="center">
~;
      boxheader("$nav{'093'}" );
      latestforumposts();
      if (@myforumnum) {
            for ($myflcounter = 0; $myflcounter < @myforumnum && $myflcounter < 5; $myflcounter++) {
                  print qq~<tr>
<td><img src="$themesurl/$usertheme/images/dot.gif">&nbsp;$myforumdata{$myforumnum[$myflcounter]}</td>
</tr>
~;
            }
      }
      else {
            print qq~<tr>
<td>$msg{'179'}</td>
</tr>
~;
      }
      boxfooter();

      print qq~

</div>
  </td>
    </tr>
  </table>
</td>
</tr>
</table>
~;

}

}

###########################
sub about_bar {
###########################

print qq~~;

}

############################
sub wepapp_bar {
############################

print qq~~;

}

#############################
sub login_panel {
#############################

getcgi();

$returnpage1 = $action;
$returnpage2 = $currentboard;
$returnpage3 = $cat;
$returnpage4 = $viewcat;
$returnpage5 = $num;
$returnpage6 = $id;


boxheader("$nav{'012'}");
print qq~

        <form method="post" action="$pageurl/$cgi?action=login2">
        <input type="hidden" name="returnpage1" value="$returnpage1">
        <input type="hidden" name="returnpage2" value="$returnpage2">
        <input type="hidden" name="returnpage3" value="$returnpage3">
        <input type="hidden" name="returnpage4" value="$returnpage4">
        <input type="hidden" name="returnpage5" value="$returnpage5">
        <input type="hidden" name="returnpage6" value="$returnpage6">
        <tr>
        <td align="center" class="whocat">$msg{'006'}<br><input type="text" name="username" size="8"></td>
        </tr>
        <tr>
        <td align="center" class="whocat">$msg{'009'}<br><input type="password" name="passwrd" size="8"></td>
        </tr>
        <tr>
        <td align="center" class="whocat"><input type="checkbox" name="rememberme" checked>&nbsp;$msg{'410'}</td>
        </tr>
        <tr>
        <td colspan="2" align="center"><input type="submit" class="button" value="$btn{'017'}"><HR></td>
        </tr>
        <tr>
        <td colspan="2" align="center" class="whocat"><a href="$pageurl/$cgi?action=reminder">$nav{'014'}</a><HR></td>
        </tr>
        <tr>
        <td colspan="2" align="center" class="whocat">$msg{'340'}<a href="$pageurl/$cgi\?action=register" class="menu"><u>$msg{'341'}</u></a>.</td>
        </tr>

        </form>
        ~;

boxfooter();


}

######################
sub member_panel {
######################


boxheader("$pagename");

        menuitem("editprofile&amp;username=$username", "$nav{'016'}");

        if ($hidememlist ne "1") {menuitem("memberlist", "$nav{'019'}");}

      if ($enable_userarticles eq "1" && $username ne "$anonuser") {
      menuitem("postnews", "$nav{'023'}");
      }

      if ($enable_userarticles eq "0" && $username eq "admin") {
      menuitem("postnews", "$nav{'023'}");
      }

        if ($username eq "admin") {
        menuitem("admin\&amp\;op=siteadmin", "$nav{'042'}");

        if ($hidememlist eq "1") {menuitem("memberlist", "$nav{'019'}");}
        }

        if ($username ne "$anonuser" && $username ne "admin") {

        open(FILE, "$memberdir/$username.dat") || error("$err{'010'}");
        file_lock(FILE);
        chomp(@memsettings = <FILE>);
        unfile_lock(FILE);
        close(FILE);

        if ($memsettings[7] eq "$root") {
                menuitem("adminlite\&amp\;op=siteadmin", "$nav{'042'}");
        }

}

         menuitem("logout", "$nav{'034'}");

        boxfooter();


}

###############
sub newsheader {
###############

print qq~
</td>
</tr>
</table>
</td>
</tr>
</table>
<br>
~;

}

#################
sub newstop {
#################

$post = qq~

<tr><td>
<CENTER>
  <TABLE BORDER="0" CELLSPACING="0" CELLPADDING="0" ALIGN="Center" WIDTH="100%">
    <TR>
      <TD><IMG src="$themesurl/$usertheme/pictures/group1-1.gif" width="21" height="26" border="0"></TD>
      <TD><IMG src="$themesurl/$usertheme/pictures/group1-2.gif" width="49" height="26" border="0"></TD>
      <TD width="100%" BACKGROUND="$themesurl/$usertheme/pictures/group1-3.gif"><CENTER>
&nbsp;
	  </CENTER></TD>
      <TD><IMG src="$themesurl/$usertheme/pictures/group1-4.gif" width="38" height="26" border="0"></TD>
      <TD><IMG src="$themesurl/$usertheme/pictures/group1-5.gif" width="22" height="26" border="0"></TD>
    </TR>
    <TR>
      <TD VALIGN="Top" BACKGROUND="$themesurl/$usertheme/pictures/group3-1.gif"><IMG src="$themesurl/$usertheme/pictures/group2-1.gif"
	    width="21" height="51" border="0"></TD>
      <TD ROWSPAN="3" COLSPAN="3" BGCOLOR="#000000" BACKGROUND="$themesurl/$usertheme/pictures/group2-2.gif" VALIGN="Top">
	  <CENTER><font color=white>&nbsp;$subject</FONT></CENTER><HR>
	  <table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
<td width="100%">

<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
<td class="newssubtitle">$curcatname: $postdate $msg{'042'} <a href="$cgi?action=anonemail&sendto=$poster" class="smallnewslink">$nick</a>
</td>
</tr>
<tr>
<td>&nbsp;</td>
</tr>
<tr>
<td valign="top" class="newstextnormal">
~;

}

##################
sub newsshort {
##################

$post = qq~$post<img src="$imagesurl/topics/$curcat.gif" border="0" align="right" vspace="5" alt="$curcatname">
$message
</tr>
<tr>
<td>&nbsp;</td>
</tr>
</table>
</td>
</tr>
<tr>
<td width="100%">
<table class="newsfootertable">
<tr>
<td align="left" valign="middle">&nbsp;
<a href="$cgi?action=printtopic&amp;id=$id&amp;curcatname=$curcatname&amp;img=$curcat"><img src="$imagesurl/print.gif" border="0" alt="$msg{'106'} - $subject" align="absmiddle"></a>&nbsp;&nbsp;<a href="$cgi?action=emailtopic&amp;id=$id&amp;curcatname=$curcatname"><img src="$imagesurl/friend.gif" border="0" alt="$msg{'055'}" align="absmiddle"></a>&nbsp;&nbsp;$readcount</td>
<td align="right" valign="middle" class="newsfootertext"> [ <a href="$cgi?action=viewnews&amp;id=$id#topcomment" class="newslink">$commentscnt</a> ]&nbsp;</td>
</tr>
</table>
</td>
</tr>
</table>
	</TD>
      <TD VALIGN="Top" BACKGROUND="$themesurl/$usertheme/pictures/group3-5.gif"><IMG src="$themesurl/$usertheme/pictures/group2-5.gif"
	    width="22" height="51" border="0"></TD>
    </TR>
    <TR>
      <TD BACKGROUND="$themesurl/$usertheme/pictures/group3-1.gif"><IMG src="$themesurl/$usertheme/pictures/group3-1.gif" width="21"
	    height="84" border="0"></TD>
      <TD BACKGROUND="$themesurl/$usertheme/pictures/group3-5.gif"><IMG src="$themesurl/$usertheme/pictures/group3-5.gif" width="22"
	    height="84" border="0"></TD>
    </TR>
    <TR>
      <TD VALIGN="Bottom" BACKGROUND="$themesurl/$usertheme/pictures/group3-1.gif"><IMG src="$themesurl/$usertheme/pictures/group4-1.gif"
	    width="21" height="30" border="0"></TD>
      <TD VALIGN="Bottom" BACKGROUND="$themesurl/$usertheme/pictures/group3-5.gif"><IMG src="$themesurl/$usertheme/pictures/group4-5.gif"
	    width="22" height="30" border="0"></TD>
    </TR>
    <TR>
      <TD><IMG src="$themesurl/$usertheme/pictures/group5-1.gif" width="21" height="12" border="0"></TD>
      <TD><IMG src="$themesurl/$usertheme/pictures/group5-2.gif" width="49" height="12" border="0"></TD>
      <TD BACKGROUND="$themesurl/$usertheme/pictures/group5-3.gif"><IMG src="$themesurl/$usertheme/pictures/group5-3.gif" width="26"
	    height="12" border="0"></TD>
      <TD><IMG src="$themesurl/$usertheme/pictures/group5-4.gif" width="38" height="12" border="0"></TD>
      <TD><IMG src="$themesurl/$usertheme/pictures/group5-5.gif" width="22" height="12" border="0"></TD>
    </TR>
  </TABLE>
</CENTER>
<br>
~;

}

##################
sub newslong {
##################

$post = qq~$post<img src="$imagesurl/topics/$curcat.gif" border="0" align="right" vspace="5" alt="$curcatname">
$tmpmessage ...
</tr>
<tr>
<td>&nbsp;</td>
</tr>
</table>
</td>
</tr>
<tr>
<td width="100%">
<table class="newsfootertable">
<tr>
<td align="left" valign="middle">&nbsp;
<a href="$cgi?action=printtopic&amp;id=$id&amp;curcatname=$curcatname&amp;img=$curcat"><img src="$imagesurl/print.gif" border="0" alt="$msg{'106'} - $subject" align="absmiddle"></a>&nbsp;&nbsp;<a href="$cgi?action=emailtopic&amp;id=$id&amp;curcatname=$curcatname"><img src="$imagesurl/friend.gif" border="0" alt="$msg{'055'}" align="absmiddle"></a>&nbsp;&nbsp;$readcount</td>
<td align="right" valign="middle" class="newsfootertext"> [ <b><a href="$cgi?action=viewnews&amp;id=$id" class="newslink">$nav{'025'}</a></b> ]&nbsp;&nbsp;[ <a href="$cgi?action=viewnews&amp;id=$id#topcomment" class="newslink">$commentscnt</a> ]&nbsp;</td>
</tr>
</table>
</td>
</tr>
</table>
	</TD>
      <TD VALIGN="Top" BACKGROUND="$themesurl/$usertheme/pictures/group3-5.gif"><IMG src="$themesurl/$usertheme/pictures/group2-5.gif"
	    width="22" height="51" border="0"></TD>
    </TR>
    <TR>
      <TD BACKGROUND="$themesurl/$usertheme/pictures/group3-1.gif"><IMG src="$themesurl/$usertheme/pictures/group3-1.gif" width="21"
	    height="84" border="0"></TD>
      <TD BACKGROUND="$themesurl/$usertheme/pictures/group3-5.gif"><IMG src="$themesurl/$usertheme/pictures/group3-5.gif" width="22"
	    height="84" border="0"></TD>
    </TR>
    <TR>
      <TD VALIGN="Bottom" BACKGROUND="$themesurl/$usertheme/pictures/group3-1.gif"><IMG src="$themesurl/$usertheme/pictures/group4-1.gif"
	    width="21" height="30" border="0"></TD>
      <TD VALIGN="Bottom" BACKGROUND="$themesurl/$usertheme/pictures/group3-5.gif"><IMG src="$themesurl/$usertheme/pictures/group4-5.gif"
	    width="22" height="30" border="0"></TD>
    </TR>
    <TR>
      <TD><IMG src="$themesurl/$usertheme/pictures/group5-1.gif" width="21" height="12" border="0"></TD>
      <TD><IMG src="$themesurl/$usertheme/pictures/group5-2.gif" width="49" height="12" border="0"></TD>
      <TD BACKGROUND="$themesurl/$usertheme/pictures/group5-3.gif"><IMG src="$themesurl/$usertheme/pictures/group5-3.gif" width="26"
	    height="12" border="0"></TD>
      <TD><IMG src="$themesurl/$usertheme/pictures/group5-4.gif" width="38" height="12" border="0"></TD>
      <TD><IMG src="$themesurl/$usertheme/pictures/group5-5.gif" width="22" height="12" border="0"></TD>
    </TR>
  </TABLE>
</CENTER>
<br>
~;

}

########################
sub show_stats {
########################

if ($dispstat eq "0" && $username eq "admin") { print qq~ | <a href="$pageurl/$cgi?action=stats" class="helpsnavlink">$nav{'006'}</a>~; }
if ($dispstat eq "1" && $username ne "$anonuser") { print qq~ | <a href="$pageurl/$cgi?action=stats" class="helpsnavlink">$nav{'006'}</a>~; }
if ($dispstat eq "2") { print qq~ | <a href="$pageurl/$cgi?action=stats" class="helpsnavlink">$nav{'006'}</a>~; }
}

######################
sub banner_disp {
######################

if ($dispfrad eq "1" && $username ne "$anonuser") {

                                                         open(FILE, "$memberdir/$username.pref") || error("$err{'010'}");
                                                        file_lock(FILE);
                                                        chomp(@preferences = <FILE>);
                                                        unfile_lock(FILE);
                                                        close(FILE);

                if ($preferences[2] eq "1") {
                show_banner(); }
 else { }
}

if ($dispfrad eq "2" || $username eq "$anonuser") {
 show_banner(); }

}

######################
sub broadcastmessage {
######################

if ($username ne "$anonuser") {

# This is to broadcast an alert message to everyone online at that time

        open(FILE, "$datadir/broadcast.txt") || error("$err{'001'} $datadir/broadcast.txt");
        file_lock(FILE);
        chomp(@lines = <FILE>);
        unfile_lock(FILE);
        close(FILE);


                if ($lines[0] eq "on") {

                print qq~

<script language="JavaScript1.2">


var ns4=document.layers
var ie4=document.all
var ns6=document.getElementById&&!document.all


var dragswitch=0
var nsx
var nsy
var nstemp

function drag_dropns(name){
if (!ns4)
return
temp=eval(name)
temp.captureEvents(Event.MOUSEDOWN | Event.MOUSEUP)
temp.onmousedown=gons
temp.onmousemove=dragns
temp.onmouseup=stopns
}

function gons(e){
temp.captureEvents(Event.MOUSEMOVE)
nsx=e.x
nsy=e.y
}
function dragns(e){
if (dragswitch==1){
temp.moveBy(e.x-nsx,e.y-nsy)
return false
}
}

function stopns(){
temp.releaseEvents(Event.MOUSEMOVE)
}



function drag_drop(e){
if (ie4&&dragapproved){
crossobj.style.left=tempx+event.clientX-offsetx
crossobj.style.top=tempy+event.clientY-offsety
return false
}
else if (ns6&&dragapproved){
crossobj.style.left=tempx+e.clientX-offsetx
crossobj.style.top=tempy+e.clientY-offsety
return false
}
}

function initializedrag(e){
crossobj=ns6? document.getElementById("showimage") : document.all.showimage

var firedobj=ns6? e.target : event.srcElement
var topelement=ns6? "HTML" : "BODY"

while (firedobj.tagName!=topelement&&firedobj.id!="dragbar"){
firedobj=ns6? firedobj.parentNode : firedobj.parentElement
}

if (firedobj.id=="dragbar"){
offsetx=ie4? event.clientX : e.clientX
offsety=ie4? event.clientY : e.clientY

tempx=parseInt(crossobj.style.left)
tempy=parseInt(crossobj.style.top)

dragapproved=true
document.onmousemove=drag_drop
}
}
document.onmousedown=initializedrag
document.onmouseup=new Function("dragapproved=false")


function hidebox(){
if (ie4||ns6)
crossobj.style.visibility="hidden"
else if (ns4)
document.showimage.visibility="hide"
}

</script>

<div id="showimage" style="position:absolute;width:250px;left:250;top:250">

<table border="0" height="450" width="450" bgcolor="$bmheadercolor" cellspacing="2" cellpadding="0">
  <tr>
    <td width="100%" height="100%"><table border="0" width="100%" height="100%" cellspacing="0" cellpadding="0"
    height="36">
      <tr>
        <td id="dragbar" style="cursor:hand" width="100%"><ilayer width="100%" onSelectStart="return false"><layer width="100%" onMouseover="dragswitch=1;if (ns4) drag_dropns(showimage)" onMouseout="dragswitch=0"><font face="Verdana"
        color="$bmbgcolor"><strong><small>Broadcast Message</small></strong></font></layer></ilayer></td>
        <td style="cursor:hand"><a href="#" onClick="hidebox();return false"><img src="$themesurl/standard/images/close.gif" width="16"
        height="14" border=0></a></td>
      </tr>
      <tr>
        <td width="100%" height="100%" bgcolor="$bmbgcolor" style="padding:4px" colspan="2" VALIGN="Top">

<!-- PUT YOUR CONTENT BETWEEN HERE ---->
<font color="#000000">
$lines[1]
</FONT>
<!-- END YOUR CONTENT HERE----->

</td>
      </tr>
    </table>
    </td>
  </tr>
</table>
</div>


~;

                }
}

# End broadcast java alert message

}


1; # return true