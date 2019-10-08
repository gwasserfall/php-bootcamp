import os
import sys
import shutil
from subprocess import Popen, PIPE

# copy work from bootcamp to vogshere folder

if len(sys.argv) < 3:
    print """\
    Usage: python ./push_work.py 01 'commit message'
    """.strip()
    quit()

day = sys.argv[1]
mes = " ".join(sys.argv[2:])


url = "vogsphere@vogsphere.wethinkcode.co.za:intra/2019/activities/42_piscine_c_formation_piscine_php_day_{}/gwasserf".format(day)

daylong = "day{}".format(day)
source = os.path.join("Bootcamp", daylong + "/")
destination = os.path.join("vogsphere", daylong + "/")

if not os.path.isdir(source):
    print "No directory", source
    quit()

Popen(["rsync", "-rvc", source, destination, "--exclude", ".git", "--delete"], stdout=PIPE)

os.chdir(destination)

set_upstream = False

if not os.path.isdir(".git"):
    Popen(["git", "init"], stdout=PIPE)
    Popen(["git", "remote", "add", url], stdout=PIPE)
    set_upstream = True

Popen(["git", "add", "."], stdout=PIPE)
Popen(["git", "commit", "-m", mes], stdout=PIPE)
if set_upstream:
    Popen(["git", "push"], stdout=PIPE)
else:
    Popen(["git", "push"], stdout=PIPE)

