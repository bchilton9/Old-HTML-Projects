###############################################################################
###############################################################################
# WebAPP - Automated Perl Portal                                              #
#-----------------------------------------------------------------------------#
# showcal.pl 						  		                  #
# v0.9.9 - Requin                                                             #
#                                                                             #
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
# File: Last modified: 01/25/02 - 17:31:07                                    #
###############################################################################
###############################################################################

sub displayCal {

require "$scriptdir/mods/calendar/sidebar.cgi";
cal_displaySidebarCal();

}

1;

