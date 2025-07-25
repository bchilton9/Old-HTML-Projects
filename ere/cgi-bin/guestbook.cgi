#!/usr/bin/perl

####################################
##                                ##
##            REMOTE              ##
##  CopyRight Byron Chilton 2000  ##
##      http://www.d0tt.com       ##
##                                ##
##     DO NOT EDIT THIS FILE      ##
##                                ##
####################################

require "config.pl";

  read(STDIN, $buffer, $ENV{'CONTENT_LENGTH'});
  if (length($buffer) < 5) {
    $buffer = $ENV{QUERY_STRING};
  }
 
  @pairs = split(/&/, $buffer);
  foreach $pair (@pairs) {
    ($name, $value) = split(/=/, $pair);

    $value =~ tr/+/ /;
    $value =~ s/%([a-fA-F0-9][a-fA-F0-9])/pack("C", hex($1))/eg;
    $value =~ s/[\;\|\\ ]/ /ig;
    $INPUT{$name} = $value;
}
print "Content-type: text/html\n\n";
if ($INPUT{'user'}) {
open (FILE, "$data_path/$INPUT{'user'}.mem");
flock (FILE, 2);
$name = <FILE>;
chop ($name);
$cryptpass = <FILE>;
chop ($cryptpass);
$mail = <FILE>;
chop ($mail);
$url = <FILE>;
chop ($url);
$site_title = <FILE>;
chop ($site_title);
flock (FILE, 8);
close(FILE);

if ($name eq "") { 
print "<CENTER><B>Username Error!! The username $INPUT{'user'} was not found!!</B></CENTER>";
}
else {
open (FILE, "$data_path/$INPUT{'user'}.gbc");
flock (FILE, 2);
$text = <FILE>;
chop ($text);
$link = <FILE>;
chop ($link);
$vlink = <FILE>;
chop ($vlink);
$bg = <FILE>;
chop ($bg);
$image = <FILE>;
chop ($image);
$return = <FILE>;
chop ($return);
$heading = <FILE>;
chop ($heading);
flock (FILE, 8);
close(FILE);

if ($INPUT{'a'} eq "view") { &view }
elsif ($INPUT{'a'} eq "sign") { &sign }
elsif ($INPUT{'a'} eq "com_sign") { &com_sign }

sub view {
&gbheader;
open (DATA, "$data_path/$INPUT{'user'}.gbd");
@data = <DATA>;
close DATA;
foreach $line (@data) {
chomp ($line);
($name, $email, $url, $title, $comment) = split(/::/, $line);
print "<CENTER><TABLE BORDER CELLPADDING=\"2\" ALIGN=\"Center\" width=\"25%\">\n";
print "<TR><TD WIDTH=\"20%\"><P ALIGN=right>Name:</TD><TD>$name</TD></TR>\n";
if ($email ne "na") {
print "<TR><TD><P ALIGN=right>E-Mail:</TD><TD><A HREF=\"mailto:$email\">$email</A></TD></TR>\n";
}
if ($url ne "na") {
if ($title ne "na") {
print "<TR><TD><P ALIGN=right>Webpage:</TD><TD><A HREF=\"$url\">$title</A></TD></TR>\n";
}
}
print "<TR><TD><P ALIGN=right>Comments:</TD><TD>$comment</TD></TR>\n";
print "</TABLE></CENTER><BR>\n";
}
&gbfooter;
}
sub sign {
&gbheader;
print <<"HTML";
<FORM ACTION="guestbook.cgi" METHOD="POST">
<CENTER><TABLE BORDER CELLPADDING="2" ALIGN="Center">
<TR><TD COLSPAN=2><P ALIGN=Center>
<BIG>Sign GuestBook</BIG></TD></TR>
<TR><TD><P ALIGN=Right>Name:</TD><TD><INPUT TYPE="text" NAME="name"></TD></TR>
<TR><TD><P ALIGN=Right>E-Mail:</TD><TD><INPUT TYPE="text" NAME="email"></TD>
</TR><TR><TD><P ALIGN=Right>Site URL:</TD><TD><INPUT TYPE="text" NAME="url" VALUE="http://"></TD></TR>
<TR><TD><P ALIGN=Right>Site Title:</TD><TD><INPUT TYPE="text" NAME="title"></TD></TR>
<TR><TD><P ALIGN=Right>Comments:</TD><TD><INPUT TYPE="text" NAME="comments"></TD>
</TR><TR><TD COLSPAN=2><P ALIGN=Center>
<INPUT TYPE="hidden" NAME="user" VALUE="$INPUT{'user'}">
<INPUT TYPE="hidden" NAME="a" VALUE="com_sign">
<INPUT TYPE=submit VALUE="Sign Book"></TD>
</TR></TABLE></CENTER></FORM>
HTML
&gbfooter;
}

sub com_sign {
if ($INPUT{'email'} eq "") { $INPUT{'email'} = "na"; }
if ($INPUT{'url'} eq "") { $INPUT{'url'} = "na"; }
if ($INPUT{'url'} eq "http://") { $INPUT{'url'} = "na"; }
if ($INPUT{'title'} eq "") { $INPUT{'title'} = "na"; }
if ($INPUT{'name'} eq "") { 
print "<CENTER><B>You must enter your name</B></CENTER>";
}
elsif ($INPUT{'comments'} eq "") { 
print "<CENTER><B>You must enter your comments</B></CENTER>";
}
else {
open (DATA, "$data_path/$INPUT{'user'}.gbd");
@data = <DATA>;
close DATA;
open(DATA, ">$data_path/$INPUT{'user'}.gbd");
print DATA "$INPUT{'name'}::$INPUT{'email'}::$INPUT{'url'}::$INPUT{'title'}::$INPUT{'comments'}\n";
foreach $line (@data) {
print DATA "$line";
}
close DATA;
&gbheader;
print "<CENTER><B>Thank you for signing my GuestBook</B></CENTER>";
&gbfooter;
}
}




}
}
else {
print "<CENTER><B>Username Error!! No username was enterd!</B></CENTER>";
}