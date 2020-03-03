from subprocess import PIPE, Popen
import subprocess
import sys

def cmdline(command):
    proc = subprocess.Popen(str(command), stdout=subprocess.PIPE, stderr=subprocess.PIPE, shell = True)
    (out, err) = proc.communicate()
    return err

def main():
    words = [line.strip() for line in open('/usr/share/wordlists/rockyou_utf8.txt')]
    print("\n")
    count=0

    for w in words:
        strcmd = "openssl rsautl -decrypt -inkey private.key -in note2_encrypted.txt -out plaintext.txt -passin pass:"+w
        res=cmdline(strcmd)
        if not res.startswith(b"unable"):
                print("\nThe key is: "+w)
                sys.exit()
        print(str(count)+"/"+str(w))
        count=count+1
    print("\n")

if __name__ == '__main__':
    main()
