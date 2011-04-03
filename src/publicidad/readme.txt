// ----------------------------------------------------------------------
// Copyright (c) 2005- 2008 by Nile Flores
// PHPads Version 2.0 based on Pixelledads 1.0 by Nile Flores
// http://blondish.net/
// ----------------------------------------------------------------------
// LICENSE
//
// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License (GPL)
// as published by the Free Software Foundation; either version 2
// of the License, or (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// To read the license please visit http://www.gnu.org/copyleft/gpl.html
// ----------------------------------------------------------------------

Files:

admin.php
ads.inc.php
ads.php
click.php
stats.php
js.php
install.php
ads.dat
readme.txt


Requirements:

at least PHP4


Installation:


1. Open each of the following: admin.php, ads.php, click.php, js.php, and stats.php in a Notepad.
Edit the lines that read:
     $bannerAdsPath = '/home/yourdomain/Public_html/ads/ads.dat';
     require '/home/yourdomain/Public_html/ads/ads.inc.php';

You should change the absolute paths to coordinate your directory structure.

2. Upload all files, into a subfolder named "ads" or another name you have specified above.
All files should be uploaded in ASCII mode.

3. CHMOD ads.dat 777.

4. Visit install.php in your web browser (example: http://www.yourdomain.com/ads/install.php)
and follow the instructions given.

5. If you have done everything correctly, you should get no errors, so delete install.php from
your server.


Use:

Log in:

Username= admin
password= ads

------

Extra notations: 

1. When using the code generator to plug into site, for optimum use, use the full url to your rotation.

For example - If you path is

$bannerAdsPath = '/home/yourdomain/Public_html/ads/ads.dat';
     require '/home/yourdomain/Public_html/ads/ads.inc.php';
then after you get your code that was generated, add yourdomain/ads/ before your generated url.
OR as a further example with the total javascript code:
<script language="javascript" type="text/javascript" src="http://yourdomain/ads/js.php"></script>

2. You can also make sure you 
can generate a code with the full URL by going into the setup and adding the full URL to the two spots, the javascript URL and the Click URL.

3. For optimal use, the Javascript invocation.
