import os
import exiftool

files = os.listdir("/root/Downloads/16. final-final-compressed")

with exiftool.ExifTool() as et:
    metadata = et.get_metadata_batch(files)

for d in metadata:
    if "XMP:Version" in d.keys():
     print("File Name: {}".format(d["SourceFile"]))

