import os
import commands
import subprocess
import re

# This is a mini-script to
# set writing file permissions 
# for the server in /var/www/html

##### GET SERVER NAME #####
output =  str(commands.getstatusoutput("ps aux | grep -E '[a]pache|[h]ttpd|[_]www|[w]ww-data|[n]ginx' | grep -v root | head -1 | cut -d\  -f1"))
server_name = re.findall(r"\'(.*?)\'", output)
server_name = str(server_name).strip()
server_name = server_name.replace("[","")
server_name = server_name.replace("]","")
server_name = server_name.replace("'","")
print("Server name = "+server_name)

##### SET PERMISSIONS #####
command = str("chown -R root:"+server_name+" /var/www/html")
os.system(command)
print("Permissions set")

