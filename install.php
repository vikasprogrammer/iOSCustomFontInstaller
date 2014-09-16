<?php

$file = $_GET['font'];
$fontname = str_replace('.ttf', '', $file);
$fontname = str_replace('ttfs/', '', $fontname);
$fontname = str_replace(' ', '-', $fontname);
$data = file_get_contents($file);
$data = base64_encode($data);
header('Content-disposition: attachment; filename="'.$fontname.'.mobileconfig"');
header('Content-type: "text/xml"; charset="utf8"');
echo "<?xml version='1.0' encoding='UTF-8'?>
<!DOCTYPE plist PUBLIC '-//Apple//DTD PLIST 1.0//EN' 'http://www.apple.com/DTDs/PropertyList-1.0.dtd'>
<plist version='1.0'>
<dict>
<key>PayloadContent</key>
<array>
<dict>
	<key>Font</key>
	<data>
$data
	</data>
	<key>PayloadIdentifier</key>
	<string>com.tb3.fonts.$fontname</string>
	<key>PayloadType</key>
	<string>com.apple.font</string>
	<key>PayloadUUID</key>
	<string>59145A6E-63C4-4B68-B0B3-1E4568CE121B_$fontname</string>
	<key>PayloadVersion</key>
	<integer>1</integer>
</dict>
</array>
<key>PayloadDisplayName</key>
<string>$fontname</string>
<key>PayloadIdentifier</key>
<string>com.tb3.fonts</string>
<key>PayloadOrganization</key>
<string>tb3.co.in</string>
<key>PayloadType</key>
<string>Configuration</string>
<key>PayloadUUID</key>
<string>DC75965B-4600-4226-BA4A-F87EA7782A1F_$fontname</string>
<key>PayloadVersion</key>
<integer>1</integer>
<key>DurationUntilRemoval</key>
<integer>2</integer>
</dict>
</plist>";