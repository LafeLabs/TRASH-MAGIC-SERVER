[Return to Trash Magic Book](read-markdown-file.php?filename=book.md)

[Edit this page](edit-markdown-file.php?filename=private-server.md)

# Building Trash Magic On a Private Server

The fastest way to get Trash Magic running locally is usually to install a web server on some existing computer either at home or at work. You can install a web server with PHP on Mac, Windows, and Linux using the free software [XAMPP](https://www.apachefriends.org/).

To replicate this whole system on your computer, go download and install from this link:

[https://www.apachefriends.org/](https://www.apachefriends.org/)

Then delete the files from the web folder at "c:\xampp\htdocs"(this is the Windows location, I'm not sure where it is in Mac or Linux) and copy the following file into your local web folder:

[github.com link](https://github.com/LafeLabs/TRASH-MAGIC-SERVER/blob/main/replicator.php)

using the download link on that page and copying the file replicator.php from your download folder into the web folder. Then open XAMPP, make sure the web server is running, and run the replicator with the following link:

[http://localhost/replicator.php](http://localhost/replicator.php)

Now you have a local instance with the full trash magic system.  To see that over a local network, use the local IP address on your local wifi. You can look at wifi settings to find the IP address and it will be 4 numbers separated by periods. Then you can put that into a browser of a machine on the same wifi network as something like this:

[http://10.0.0.26](http://10.0.0.26)

where you put in your IP address instead of the one there. You can put that IP address link(with the "http://") into the QR code generator at [qrcode.html](qrcode.html).
