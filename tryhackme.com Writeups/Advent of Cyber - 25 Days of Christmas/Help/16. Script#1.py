import os
import zipfile
import exiftool

with zipfile.ZipFile("16. final-final-compressed.zip","r") as zip_ref:
	zip_ref.extractall("16. final-final-compressed")
	listOfFiles = os.listdir("16. final-final-compressed")
	for l in listOfFiles:
		if l.endswith(".zip"):
			with zipfile.ZipFile("16. final-final-compressed/"+l,"r") as zip_2:
				zip_2.extractall("16. final-final-compressed")
				os.remove("16. final-final-compressed/"+l)

files = ["16. final-final-compressed"]
with exiftool.ExifTool() as et:
        metadata = et.get_metadata_batch(files)

for d in metadata:
        print(d)

