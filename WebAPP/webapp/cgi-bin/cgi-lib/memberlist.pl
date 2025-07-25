###############################################################################
###############################################################################
# WebAPP - Automated Perl Portal                                              #
#-----------------------------------------------------------------------------#
# memberlist.pl                     						      #
# v0.9.9 - Requin                                                             #
# Copyright (C) 2002 by Carter (carter@mcarterbrown.com)                      #
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
#                                                                             #
# File: Last modified: 08/01/02                                               #
###############################################################################
###############################################################################


###########
sub mlist {
###########
	if ($username eq "$anonuser") { error("$err{'011'}"); }
	undef @allmembers;

	open(FILE, "$memberdir/memberlist.dat");
	lock(FILE);
	chomp(@memberlist = <FILE>);
	unlock(FILE);
	close(FILE);

	$thelatestmember = $memberlist[$#memberlist];

	open(FILE, "$memberdir/$thelatestmember.dat");
	lock(FILE);
	chomp(@lmsettings = <FILE>);
	unlock(FILE);
	close(FILE);

	$tlmname = @lmsettings[1];

	$count = @memberlist;
	$users = "";

	open(FILE, "$datadir/log.dat");
	lock(FILE);
	@entries = <FILE>;
	unlock(FILE);
	close(FILE);

	foreach $curentry (@entries) {
		$curentry =~ s/[\n\r]//g;
		($name, $value) = split(/\|/, $curentry);
		if ($name =~ /\./) {  }
		else {
			open(FILE, "$memberdir/$name.dat");
			lock(FILE);
			chomp(@msettings = <FILE>);
			unlock(FILE);
			close(FILE);

			$users = qq~$users <a href="$cgi?action=viewprofile&amp;username=$name">$msettings[1]</a>\n~;
		}
	}

	open(FILE, "$memberdir/membergroups.dat");
	lock(FILE);
	@membergroups = <FILE>;
	unlock(FILE);
	close(FILE);

	foreach $member (@memberlist) {
		open(FILE, "$memberdir/$member.dat");
		lock(FILE);
		chomp(@members = <FILE>);
		unlock(FILE);
		close(FILE);

		$id++;
		$searchname = lc $members[1];
		$posts = $members[6]+$members[11]+$members[12];

		$memberinfo = "$membergroups[2]";
		if ($posts > 25) { $memberinfo = "$membergroups[3]"; $rank = 6; }
		if ($posts > 50) { $memberinfo = "$membergroups[4]"; $rank = 5; }
		if ($posts > 75) { $memberinfo = "$membergroups[5]"; $rank = 4; }
		if ($posts > 100) { $memberinfo = "$membergroups[6]"; $rank = 3; }
		if ($posts > 250) { $memberinfo = "$membergroups[7]"; $rank = 2; }
		if ($posts > 500) { $memberinfo = "$membergroups[8]"; $rank = 1; }

		push (@allmembers, join ("\|", "$searchname|$members[1]|$members[2]|$members[10]|$members[8]|$memberinfo|$rank|$posts|$members[7]|$member|$id\n"));
	}

	for (0..$#allmembers) {
		@fields = split(/\|/, $allmembers[$_]);
		for $i (0..$#fields) {
			$data[$_][$i] = $fields[$i];
		}
	}

	if ($info{'sort'} == 0) {
		@sorted = sort { $a->[0] cmp $b->[0] } @data;
	}
	if ($info{'sort'} == 1) {
		@sorted = sort { $a->[2] cmp $b->[2] } @data;
	}
	if (($info{'sort'} == 2) || ($info{'sort'} eq "")) {
		@sorted = sort { $a->[10] <=> $b->[10] } @data;
	}
	if ($info{'sort'} == 3) {
		@sorted = sort { $a->[4] <=> $b->[4] } @data;
	}
	if ($info{'sort'} == 4) {
		@sorted = reverse sort { $a->[7] <=> $b->[7] } @data;
	}
	if ($info{'sort'} == 5) {
		@sorted = reverse sort { $a->[7] <=> $b->[7] } @data;
	}
	if ($info{'sort'} == 6) {
		@sorted = sort { $a->[8] cmp $b->[8] } @data;
	}

	for (@sorted) { 
		$sortedrow = join ("|", @$_);
		push (@sortedmembers, $sortedrow);
	}

	$navbar = "$btn{'014'} $nav{'019'}";
	print_top();
	print qq~<table border="0" width="100%" cellspacing="1">
<tr>
<td valign="top">$msg{'028'} <a href="$cgi?action=viewprofile&amp;username=$thelatestmember">$tlmname</a><br>
$msg{'029'} $count<br>
$msg{'030'} $users</td>
</tr>
</table>
<br>
<form method="POST" action="$pageurl/$cgi?action=searchuser">
$msg{'006'}<INPUT TYPE=RADIO NAME="searchtype" VALUE="searchuserid" CHECKED>
$msg{'013'}<INPUT TYPE=RADIO NAME="searchtype" VALUE="searchusername">~;
if ($hidemail eq "1" || $hidemail eq "") { } else { print qq~
$msg{'007'}<INPUT TYPE=RADIO NAME="searchtype" VALUE="searchemail">~;
} print qq~
<input type="text" name="membersearch" size="16" class="text">
<input type="submit" value="$btn{'001'}">
</form>
<br>
<table width="100%" bgcolor="$titlebg" border="0" cellspacing="0" cellpadding="0">
<tr>
<td>
<table width="100%" border="0" cellspacing="1" cellpadding="2">
<tr>
<td bgcolor="$windowbg"><a href="$cgi?action=memberlist&amp;sort=0"><b>$msg{'013'}</b></a></td>
<td bgcolor="$windowbg"><a href="$cgi?action=memberlist&amp;sort=1"><b>$msg{'007'}</b></a></td>
<td bgcolor="$windowbg"><a href="$cgi?action=memberlist&amp;sort=2"><b>$msg{'027'}</b></a></td>
<td bgcolor="$windowbg"><a href="$cgi?action=memberlist&amp;sort=3"><b>$msg{'016'}</b></a></td>
<td bgcolor="$windowbg"><a href="$cgi?action=memberlist&amp;sort=4"><b>$msg{'024'}</b></a></td>
<td bgcolor="$windowbg"><a href="$cgi?action=memberlist&amp;sort=5"><b>$msg{'031'}</b></a></td>
<td bgcolor="$windowbg"><a href="$cgi?action=memberlist&amp;sort=6"><b>$msg{'033'}</b></a></td>
</tr>
~;
	if (@allmembers == 0) { }

	if ($info{'start'} eq "") { $start = 0; }
	else { $start = "$info{'start'}"; }

	$count = 0;
	$second = "$windowbg3";
	for ($i = $start; $i < @sortedmembers; $i++) {
		if ($second eq "$windowbg2") { $second="$windowbg3"; }
		else { $second="$windowbg2"; }
		($dummy, $mname, $memail, $msince, $micq, $mrank, $dummy, $mposts, $mfunct, $musername, $dummy) = split(/\|/, $sortedmembers[$i]);
		$count++;
		$icq = "";
		if ($micq ne "") {
			$icq = qq~<a href="http://www.icq.com/$micq" target="_blank"><img src="http://wwp.icq.com/scripts/online.dll?icq=$micq&amp;img=5" alt="$micq" border="0"></a>~;
		}

		if ($musername eq "") { next; }

		print qq~<tr>
<td bgcolor="$second"><a href="$cgi?action=viewprofile&amp;username=$musername">$mname</a></td>~; 
if ($hidemail eq "1" || $hidemail eq "") { print qq~<td bgcolor="$second"><a href="$cgi?action=anonemail&sendto=$musername">$msg{'007'} $mname</a></td>~; }
if ($hidemail eq "0") { print qq~<td bgcolor="$second"><a href="mailto:$memail">$memail</a></td>~; } 
print qq~
<td bgcolor="$second">$msince</td>
<td bgcolor="$second">$icq</td>
<td bgcolor="$second">$mrank</td>
<td bgcolor="$second">$mposts</td>
<td bgcolor="$second">$mfunct</td>
</tr>
~;
		if ($count >= $maxmessagedisplay) { $i = @allmembers; }
	}
	print qq~</table>
</td>
</tr>
</table>
<br>
~;

	print "<b>$msg{'039'}</b>";
	$nummembers = @allmembers;
	$count = 0;
	while (($count*$maxmessagedisplay) < $nummembers) {
		$view = $count+1;
		$offset = ($count*$maxmessagedisplay);
		if ($start == $offset) { print qq~[$view] ~; }
		elsif ($offset == 0) { print qq~<a href="$cgi?action=memberlist&amp;sort=$info{'sort'}">$view</a> ~; }
		else { print qq~<a href="$cgi?action=memberlist&amp;sort=$info{'sort'}&amp;start=$offset">$view</a> ~; }
		$count++;
	}
	print "\n";
	print_bottom();
	exit;
}


###########
sub searchuser {
###########
#
# Thank you Klaus
#
	if ($username eq "$anonuser") { error("$err{'011'}"); }
	undef @allmembers;

	open(FILE, "$memberdir/memberlist.dat");
	lock(FILE);
	chomp(@memberlist = <FILE>);
	unlock(FILE);
	close(FILE);

	$thelatestmember = $memberlist[$#memberlist];

	open(FILE, "$memberdir/$thelatestmember.dat");
	lock(FILE);
	chomp(@lmsettings = <FILE>);
	unlock(FILE);
	close(FILE);

	$tlmname = @lmsettings[1];

	$count = @memberlist;
	$users = "";

	open(FILE, "$datadir/log.dat");
	lock(FILE);
	@entries = <FILE>;
	unlock(FILE);
	close(FILE);
	foreach $curentry (@entries) {
		$curentry =~ s/[\n\r]//g;
		($name, $value) = split(/\|/, $curentry);
		if ($name =~ /\./) {  }
		else {
			open(FILE, "$memberdir/$name.dat");
			lock(FILE);
			chomp(@msettings = <FILE>);
			unlock(FILE);
			close(FILE);

			$users = qq~$users <a href="$cgi?action=viewprofile&amp;username=$name">$msettings[1]</a>\n~;
		}
	}

	open(FILE, "$memberdir/membergroups.dat");
	lock(FILE);
	@membergroups = <FILE>;
	unlock(FILE);
	close(FILE);

	foreach $member (@memberlist) {
		open(FILE, "$memberdir/$member.dat");
		lock(FILE);
		chomp(@members = <FILE>);
		unlock(FILE);
		close(FILE);
		$id++;
		if (($input{'searchtype'} eq "searchuserid") && (grep(/$input{'membersearch'}/i, lc($member)))){
			$searchname = lc $members[1];
			$posts = $members[6]+$members[11]+$members[12];
			$memberinfo = "$membergroups[2]";
			if ($posts > 25) { $memberinfo = "$membergroups[3]"; $rank = 6; }
			if ($posts > 50) { $memberinfo = "$membergroups[4]"; $rank = 5; }
			if ($posts > 75) { $memberinfo = "$membergroups[5]"; $rank = 4; }
			if ($posts > 100) { $memberinfo = "$membergroups[6]"; $rank = 3; }
			if ($posts > 250) { $memberinfo = "$membergroups[7]"; $rank = 2; }
			if ($posts > 500) { $memberinfo = "$membergroups[8]"; $rank = 1; }
			push (@allmembers, join ("\|", "$searchname|$members[1]|$members[2]|$members[10]|$members[8]|$memberinfo|$rank|$posts|$members[7]|$member|$id\n"));
		}
		if (($input{'searchtype'} eq "searchusername") && (grep(/$input{'membersearch'}/i, lc($members[1])))){
			$searchname = lc $members[1];
			$posts = $members[6]+$members[11]+$members[12];
			$memberinfo = "$membergroups[2]";
			if ($posts > 25) { $memberinfo = "$membergroups[3]"; $rank = 6; }
			if ($posts > 50) { $memberinfo = "$membergroups[4]"; $rank = 5; }
			if ($posts > 75) { $memberinfo = "$membergroups[5]"; $rank = 4; }
			if ($posts > 100) { $memberinfo = "$membergroups[6]"; $rank = 3; }
			if ($posts > 250) { $memberinfo = "$membergroups[7]"; $rank = 2; }
			if ($posts > 500) { $memberinfo = "$membergroups[8]"; $rank = 1; }
			push (@allmembers, join ("\|", "$searchname|$members[1]|$members[2]|$members[10]|$members[8]|$memberinfo|$rank|$posts|$members[7]|$member|$id\n"));
		}
		if (($input{'searchtype'} eq "searchemail") && (grep(/$input{'membersearch'}/i, lc($members[2])))){
			$searchname = lc $members[1];
			$posts = $members[6]+$members[11]+$members[12];
			$memberinfo = "$membergroups[2]";
			if ($posts > 25) { $memberinfo = "$membergroups[3]"; $rank = 6; }
			if ($posts > 50) { $memberinfo = "$membergroups[4]"; $rank = 5; }
			if ($posts > 75) { $memberinfo = "$membergroups[5]"; $rank = 4; }
			if ($posts > 100) { $memberinfo = "$membergroups[6]"; $rank = 3; }
			if ($posts > 250) { $memberinfo = "$membergroups[7]"; $rank = 2; }
			if ($posts > 500) { $memberinfo = "$membergroups[8]"; $rank = 1; }
			push (@allmembers, join ("\|", "$searchname|$members[1]|$members[2]|$members[10]|$members[8]|$memberinfo|$rank|$posts|$members[7]|$member|$id\n"));
		}
	}

	for (0..$#allmembers) {
		@fields = split(/\|/, $allmembers[$_]);
		for $i (0..$#fields) {
			$data[$_][$i] = $fields[$i];
		}
	}

	if ($info{'sort'} == 0) {
		@sorted = sort { $a->[0] cmp $b->[0] } @data;
	}
	if ($info{'sort'} == 1) {
		@sorted = sort { $a->[2] cmp $b->[2] } @data;
	}
	if (($info{'sort'} == 2) || ($info{'sort'} eq "")) {
		@sorted = sort { $a->[10] <=> $b->[10] } @data;
	}
	if ($info{'sort'} == 3) {
		@sorted = sort { $a->[4] <=> $b->[4] } @data;
	}
	if ($info{'sort'} == 4) {
		@sorted = reverse sort { $a->[7] <=> $b->[7] } @data;
	}
	if ($info{'sort'} == 5) {
		@sorted = reverse sort { $a->[7] <=> $b->[7] } @data;
	}
	if ($info{'sort'} == 6) {
		@sorted = sort { $a->[8] cmp $b->[8] } @data;
	}

	for (@sorted) { 
		$sortedrow = join ("|", @$_);
		push (@sortedmembers, $sortedrow);
	}

	$navbar = "$btn{'014'} $nav{'019'}";
	print_top();
	print qq~<table border="0" width="100%" cellspacing="1">
<tr>
<td valign="top">$msg{'028'} <a href="$cgi?action=viewprofile&amp;username=$thelatestmember">$tlmname</a><br>
$msg{'029'} $count<br>
$msg{'030'} $users</td>
</tr>
</table>
<br>
<form method="POST" action="$pageurl/$cgi?action=searchuser">
$msg{'006'}<INPUT TYPE=RADIO NAME="searchtype" VALUE="searchuserid" CHECKED>
$msg{'013'}<INPUT TYPE=RADIO NAME="searchtype" VALUE="searchusername">~;
if ($hidemail eq "1" || $hidemail eq "") { } else { print qq~
$msg{'007'}<INPUT TYPE=RADIO NAME="searchtype" VALUE="searchemail">~; 
	}
print qq~
<input type="text" name="membersearch" size="16" class="text">
<input type="submit" value="Search">
</form>
<br>
<table width="100%" bgcolor="$titlebg" border="0" cellspacing="0" cellpadding="0">
<tr>
<td>
<table width="100%" border="0" cellspacing="1" cellpadding="2">
<tr>
<td bgcolor="$windowbg"><a href="$cgi?action=memberlist&amp;sort=0"><b>$msg{'013'}</b></a></td>
<td bgcolor="$windowbg"><a href="$cgi?action=memberlist&amp;sort=1"><b>$msg{'007'}</b></a></td>
<td bgcolor="$windowbg"><a href="$cgi?action=memberlist&amp;sort=2"><b>$msg{'027'}</b></a></td>
<td bgcolor="$windowbg"><a href="$cgi?action=memberlist&amp;sort=3"><b>$msg{'016'}</b></a></td>
<td bgcolor="$windowbg"><a href="$cgi?action=memberlist&amp;sort=4"><b>$msg{'024'}</b></a></td>
<td bgcolor="$windowbg"><a href="$cgi?action=memberlist&amp;sort=5"><b>$msg{'031'}</b></a></td>
<td bgcolor="$windowbg"><a href="$cgi?action=memberlist&amp;sort=6"><b>$msg{'033'}</b></a></td>
</tr>
~;
	if (@allmembers == 0) { }

	if ($info{'start'} eq "") { $start = 0; }
	else { $start = "$info{'start'}"; }

	$count = 0;
	$second = "$windowbg3";
	for ($i = $start; $i < @sortedmembers; $i++) {
		if ($second eq "$windowbg2") { $second="$windowbg3"; }
		else { $second="$windowbg2"; }
		($dummy, $mname, $memail, $msince, $micq, $mrank, $dummy, $mposts, $mfunct, $musername, $dummy) = split(/\|/, $sortedmembers[$i]);
		$count++;
		$icq = "";
		if ($micq ne "") {
			$icq = qq~<a href="http://www.icq.com/$micq" target="_blank"><img src="http://wwp.icq.com/scripts/online.dll?icq=$micq&amp;img=5" alt="$micq" border="0"></a>~;
		}

		print qq~<tr>
<td bgcolor="$second"><a href="$cgi?action=viewprofile&amp;username=$musername">$mname</a></td>
~; if ($hidemail eq "1" || $hidemail eq "") { print qq~<td bgcolor="$second"><a href="$cgi?action=anonemail&sendto=$musername">$msg{'007'} $mname</a></td>~; }
else { print qq~<td bgcolor="$second"><a href="mailto:$memail">$memail</a></td>~; } print qq~
<td bgcolor="$second">$msince</td>
<td bgcolor="$second">$icq</td>
<td bgcolor="$second">$mrank</td>
<td bgcolor="$second">$mposts</td>
<td bgcolor="$second">$mfunct</td>
</tr>
~;
		if ($count >= $maxmessagedisplay) { $i = @allmembers; }
	}
	print qq~</table>
</td>
</tr>
</table>
<br>
~;

	print "<b>$msg{'039'}</b>";
	$nummembers = @allmembers;
	$count = 0;
	while (($count*$maxmessagedisplay) < $nummembers) {
		$view = $count+1;
		$offset = ($count*$maxmessagedisplay);
		if ($start == $offset) { print qq~[$view] ~; }
		elsif ($offset == 0) { print qq~<a href="$cgi?action=memberlist&amp;sort=$info{'sort'}">$view</a> ~; }
		else { print qq~<a href="$cgi?action=memberlist&amp;sort=$info{'sort'}&amp;start=$offset">$view</a> ~; }
		$count++;
	}
	print "\n";
	print_bottom();
	exit;
}

if (-e "$scriptdir/user-lib/memberlist.pl") {require "$scriptdir/user-lib/memberlist.pl"} 

1; # return true

