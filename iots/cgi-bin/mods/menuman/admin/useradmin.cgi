#!/usr/bin/perl -w
$| = 1;

use CGI::Carp qw(fatalsToBrowser);

###############################################################################
# WebApp Menu Manager Mod                                                     #
#                                                                             #
# This program is free software; you can redistribute it and/or               #
# modify it under the terms of the GNU General Public License                 #
# as published by the Free Software Foundation; either version 2              #
# of the License, or (at your option) any later version.                      #
#                                                                             #
# This program is distributed in the hope that it will be useful,             #
# but WITHOUT ANY WARRANTY; without even the implied warranty of              #
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the               #
# GNU General Public License for more details.                                #
#                                                                             #
# You should have received a copy of the GNU General Public License           #
# along with this program; if not, write to the Free Software                 #
# Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA. #
#                                                                             #
#-----------------------------------------------------------------------------#
#                                                                             #
#  Written by Ted Loomos                                                      #
#  Get the latest updates from www.devdesk.com                                #
#                                                                             #
#  Revision History:                                                          #
#  2002-09-12  Script Created                                                 #
#                                                                             #
###############################################################################

$scriptname = "WebAPP";
$scriptver = "0.9.7";

eval {
        require "../../../config.pl";
        require "$sourcedir/subs.pl";
        require "../config.dat";

        if ($IIS != 2) {
                if ($IIS == 0) {
                        if ($ENV{'SERVER_SOFTWARE'} =~ m!IIS!) { $IIS = 1; }
                }
                if (($IIS) && ($0 =~ m!(.*)(\\|\/)!)) { chdir($1); }
                if ($IIS == 1) { print "HTTP/1.0 200 OK\n"; }
        }
};
if ($@) {
        print "Content-type: text/html\n\n";
        print qq~<h1>Software Error:</h1>
Execution of <b>$scriptname</b> has been aborted due a compilation error:<br>
<pre>$@</pre>
<p>If this problem persits, please contact the webmaster and inform him about date and time you've recieved this error.</p>
~;
        exit;
}
getlanguage();
ban();

#getcgi();
&parse_form;

getdate();
logips();
loadcookie();
loaduser();
logvisitors();

####################################
# A Wonderful Mod by Me!
####################################

if ($lang_support eq "1") { mod_langsupp(); }

# Start making your changes here! #

if ($username eq "$anonuser") { error("$err{'011'}"); }

require "../config.pl";

$navbar = " $btn{'014'} $menuManager{'001'}";

$action = $info{action};
$op         = $info{op};
$menu   = $username;
$id                = $info{id};

if ($action eq "View") {
        viewMenu();
} elsif ($action eq "Add" || $action eq "Edit") {
        editMenuItem();
} elsif ($action eq "Save") {
        saveMenuItem();
} elsif ($action eq "Up" || $action eq "Down") {
        moveMenuItem();
}

print_top();
viewMenu();
print_bottom();

exit;

sub viewMenu {

        print_top();

        @menuitems = ();

        if (-e "$mm_dataDir/$menu.dat") {
                open (MENUFILE,"<$mm_dataDir/$menu.dat") || error("$err{'016'} $mm_dataDir/$menu.dat");
                @menuitems=<MENUFILE>;
                close (MENUFILE);
        }

        print qq~
        <font face='Arial' size='2'>
        <i>Items for: $menu</i>
        <table width='100%' border='1'>
        <tr>
          <td bgcolor='#00007D'><font size='2'>$msg{'354'}</font></td>
          <td bgcolor='#00007D'><font size='2'>$menuManager{'004'}</font></td>
          <td bgcolor='#00007D'><font size='2'>$menuManager{'005'}</font></td>
        </tr>
        ~;

        foreach $rec (@menuitems){
                chomp($rec);
                ($id,$url,$title,$access,$target,$icon)=split(/\|/,$rec);

                if ($title =~ m/^\$/) {$title = "$title (". (eval "$title") .")"}

                print qq~
                        <tr>
                          <td>
                              <font size="2">
                              <a href="useradmin.cgi?id=$id&action=Edit">$nav{'096'}</a> -
                              <a href="useradmin.cgi?id=$id&action=Save&op=Delete">$nav{'097'}</a> -
                              <a href="useradmin.cgi?id=$id&action=Up">$menuManager{'007'}</a> -
                              <a href="useradmin.cgi?id=$id&action=Down">$menuManager{'008'}</a>
                              </font></td>
                          <td><font size="2">$title</font></td>
                          <td><font size="2">$url</font></td>
                        </tr>
                ~;
        }

        print qq~
                </table>
                <p><a href="useradmin.cgi\?action=Add">$menuManager{'009'}</a></p>
                </font>
        ~;

        print_bottom();
        exit;
}

sub        editMenuItem {

        print_top();

        if ($action eq "Edit") {
                open (MENUFILE,"<$mm_dataDir/$menu.dat") || error("$err{'016'} $mm_dataDir/$menu.dat");
                @menuitems = <MENUFILE>;
                close (MENUFILE);

                MENUITEM: foreach $rec (@menuitems){
                        chomp($rec);
                        ($id,$url,$title,$access,$target,$icon)=split(/\|/,$rec);
                        if ($id == $info{id}) {
                                last MENUITEM;
                        }
                }
        } else {
                $url    = "";
                $title  = "";
                $target = "";
                $icon   = "\$themesurl/\$usertheme/images/dot.gif";
        }

        $targetSelections = "<option value=''>$menuManager{'018'}</option>";
        if ($target eq "_blank") {$sel="selected"} else {$sel=""}
        $targetSelections .= "<option value='_blank' $sel>$menuManager{'019'}</option>";


        print qq~
        <TABLE class=menubackcolor cellSpacing=0 cellPadding=3 width="100%" border=0>
          <TR>
           <TD vAlign=top width="100%"><FONT face=Arial><I>$action $menuManager{'010'}</I><BR>
            <form onSubmit="submitonce(this)" action=useradmin.cgi method=get>
            <input type="hidden" name="action" value="Save">
            <input type="hidden" name="op" value="$action">
            <input type="hidden" name="id" value="$id">
             <TABLE border=1>
               <TR>
                                <TD><font size="2">$menuManager{'004'}</font></TD>
                                <TD><INPUT name=title value="$title" size="50" style="width:200"></TD>
                                <TD><font size="2">$menuManager{'011'}</font></TD></TR>
                        <TR>
                                <TD><font size="2">$menuManager{'005'}</font></TD>
                                <TD><INPUT name=url value="$url" size="200" style="width:400"></TD>
                                <TD><font size="2">$menuManager{'012'}</font></TD></TR>
                        <TR>
                                <TD><font size="2">$menuManager{'014'}</font></TD>
                                <TD><select name=target style="width:200">$targetSelections</select></TD>
                                <TD><font size="2">$menuManager{'015'}</font></TD></TR>
                        <TR>
                                <TD><font size="2">$menuManager{'016'}</font></TD>
                                <TD><INPUT name=icon value="$icon" size="200" style="width:400"></TD>
                                <TD><font size="2">$menuManager{'017'}</font></TD></TR>
                  </TABLE>
                  <INPUT type=submit value="$action $menuManager{'010'}">
                 </FORM></FONT>
                </TD>
           </TR>
        </TABLE>
        ~;

        print_bottom();
        exit;

}

sub        saveMenuItem {

        if (-e "$mm_dataDir/$menu.dat") {
                open (MENUFILE,"<$mm_dataDir/$menu.dat") || error("$err{'016'} $mm_dataDir/$menu.dat");
                @menuitems = <MENUFILE>;
                close (MENUFILE);
        }

        open (MENUFILE,">$mm_dataDir/$menu.dat") || error("$err{'016'} $mm_dataDir/$menu.dat");
        foreach $rec (@menuitems){
                chomp($rec);
                ($id,$url,$title,$access,$target)=split(/\|/,$rec);
                if ($op eq "Edit" || $op eq "Delete") {
                        if ($id == $info{id}) {
                                if ($op eq "Edit") {
                                        print MENUFILE "$id|$info{url}|$info{title}||$info{target}|$info{icon}\n";
                                }
                        } else {
                                print MENUFILE "$rec\n";
                        }
                } else {
                        print MENUFILE "$rec\n";
                }
        }
        if ($op eq "Add") {
                $id++;
                print MENUFILE "$id|$info{url}|$info{title}||$info{target}|$info{icon}\n";
        }
        close (MENUFILE);

        if (($#menuitems == -1) && ($op eq "Add")) {
                chmod 0777, "$mm_dataDir/$menu.dat";
        }
        if (($#menuitems == 0) && ($op eq "Delete")) {
                unlink ("$mm_dataDir/$menu.dat");
        }
}

sub        moveMenuItem {

        open (MENUFILE,"<$mm_dataDir/$menu.dat") || error("$err{'016'} $mm_dataDir/$menu.dat");
        @menuitems = <MENUFILE>;
        close (MENUFILE);

        MENUITEM: for ($ndx=0; $ndx<= $#menuitems; $ndx++) {
                ($fid,$furl,$ftitle,$faccess,$ftarget,$ficon)=split(/\|/,$menuitems[$ndx]);
                if ($fid == $info{id}) {
                        last MENUITEM;
                }
        }

        $swap=false;
        if ($action eq "Up" && $ndx != 0) {
                $tondx = $ndx - 1;
                $swap=true;

        } elsif ($action eq "Down" && $ndx != $#menuitems) {
                $tondx = $ndx + 1;
                $swap=true;
        }

        if ($swap) {
                chomp($menuitems[$ndx]);
                chomp($menuitems[$tondx]);
                ($fid,$furl,$ftitle,$faccess,$ftarget,$ficon)=split(/\|/,$menuitems[$ndx]);
                ($tid,$turl,$ttitle,$taccess,$ttarget,$ticon)=split(/\|/,$menuitems[$tondx]);

                $menuitems[$ndx]   = "$fid|$turl|$ttitle|$taccess|$ttarget|$ticon\n";
                $menuitems[$tondx] = "$tid|$furl|$ftitle|$faccess|$ftarget|$ficon\n";
        }

        open (MENUFILE,">$mm_dataDir/$menu.dat") || error("$err{'016'} $mm_dataDir/$menu.dat");
        foreach $rec (@menuitems){
                print MENUFILE $rec;
        }
        close (MENUFILE);

}

# Finish making your changes here! #

###########################
sub mod_langsupp {
###########################

$modlangfail = "0";

if ($username ne $anonuser) {
                open(FILE, "$memberdir/$username.dat");
                file_lock(FILE);
                @settings = <FILE>;
                unfile_lock(FILE);
                close(FILE);

                for( $i = 0; $i < @settings; $i++ ) {
                        $settings[$i] =~ s~[\n\r]~~g;
                }

                if ($settings[0] ne $password && $action ne "logout") { error("$err{'002'}"); }
                else {
                        $realname = $settings[1];
                        $realemail = $settings[2];
                        $userlang = $settings[15];
                }

}

                if ($userlang eq "") { $userlang = $language; }

                         if ($modlangfail ne "1") {
                         @modlanguage = $userlang;
                         foreach $rec (@modlanguage){
                         chomp($rec);
                         ($modlang,$dummy)=split(/\./,$rec);
                         }
                         } else {
                         @modlanguage = $language;
                         foreach $rec (@modlanguage){
                         chomp($rec);
                         ($modlang,$dummy)=split(/\./,$rec);
                         }
                }

eval {
        require "../language/$modlang.dat";

        if ($IIS != 2) {
                if ($IIS == 0) {
                        if ($ENV{'SERVER_SOFTWARE'} =~ m!IIS!) { $IIS = 1; }
                }
                if (($IIS) && ($0 =~ m!(.*)(\\|\/)!)) { chdir($1); }
                if ($IIS == 1) { print "HTTP/1.0 200 OK\n"; }
        }
};

if ($@) {$modlangfail = "1"; mod_langsuppfail();}

}

########################
sub mod_langsuppfail {
########################

eval {
        require "../language/$mod_lang";

        if ($IIS != 2) {
                if ($IIS == 0) {
                        if ($ENV{'SERVER_SOFTWARE'} =~ m!IIS!) { $IIS = 1; }
                }
                if (($IIS) && ($0 =~ m!(.*)(\\|\/)!)) { chdir($1); }
                if ($IIS == 1) { print "HTTP/1.0 200 OK\n"; }
        }
};
if ($@) {
print "Content-type: text/html\n\n";
print qq~<h1>Software Error:</h1>
Execution of <b>$scriptname</b> has been aborted due a compilation error:<br>
<pre>$@</pre>
<p>If this problem persits, please contact the webmaster and inform him about date and time you've recieved this error.</p>
~;
        exit;
}

}
########################################
# Code to get the data from GET & POST #
########################################
sub parse_form {

        read(STDIN, $buffer, $ENV{'CONTENT_LENGTH'});
        if (length($buffer) < 5) {
                $buffer = $ENV{QUERY_STRING};
        }
        @pairs = split(/&/, $buffer);
        foreach $pair (@pairs) {
                ($name, $value) = split(/=/, $pair);

                $value =~ tr/+/ /;
                $value =~ s/%([a-fA-F0-9][a-fA-F0-9])/pack("C", hex($1))/eg;
                if ($name =~ /^multiple-/) {
                        $name =~ s/multiple-//;
                        push (@{$info{$name}}, $value);
                } else {
                        $info{$name} = $value;
                }
        }
}

1;