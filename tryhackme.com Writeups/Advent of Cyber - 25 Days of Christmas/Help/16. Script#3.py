import os

files = os.listdir("/root/Downloads/16. final-final-compressed")

for f in files:
    print("File: ",f)
    with open(f,"r",encoding="utf-8",errors="ignore") as reader:
        lines = reader.readlines()
        for line in lines:
            if "password" in line:
                print(line)
